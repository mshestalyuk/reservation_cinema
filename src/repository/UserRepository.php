<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM customer u LEFT JOIN customer_details ud 
            ON u.detail_id = ud.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.customer_details (name, surname)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.customer (detail_id, email, password)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $this->getUserDetailsId($user),
            $user->getEmail(),
            $user->getPassword()
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.customer_details WHERE name = :name AND surname = :surname
        ');
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data === false) {
            throw new Exception('User details not found.');
        }
        return $data['id'];
    }

}