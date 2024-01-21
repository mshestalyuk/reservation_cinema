<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Film.php';

class FilmRepository extends Repository
{
    private $messages = [];

    public function getFilm(int $id): ?Film
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.movie WHERE id = :movie_id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $film = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($film == false) {
            return null;
        }

        return new Film(
            $film['filmName'],
            $film['releaseDate'],
            $film['filmGenre'],
            $film['cast'],
            $film['director'],
            $film['ageRestrictions'],
            $film['image']
        );

    }

    public function addFilm(Film $film): void
    {
        try {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO public.movie (name, genre, release, cast, director, certificate, image)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

            $stmt->execute([
                $film->getFilmName(),
                $film->getFilmGenre(),
                $film->getReleaseDate(),
                $film->getCast(),
                $film->getDirector(),
                $film->getCertificate(),
                $film->getImage(),
            ]);
        } catch (PDOException $e) {
            // This will print the exception details to the PHP error log.
            error_log('PDO Exception: ' . $e->getMessage());
            // You can also store the error in a class variable or display it to the user if necessary.
            $this->messages[] = 'Error adding film: ' . $e->getMessage();
        }
    }
    public function getFilms(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.movie;
        ');
        $stmt->execute();
        $films = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($films as $film) {
            $result[] = new Film(
                $film['name'],
                $film['genre'],
                $film['release'],
                $film['cast'],
                $film['director'],
                $film['certificate'],
                $film['image']
            );
        }

        return $result;
    }


    public function getFilmByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.movie WHERE LOWER(name) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}