<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Film.php';

class ProjectRepository extends Repository
{

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
            $film['runningTime'],
            $film['originalTitle'],
            $film['filmGenre'],
            $film['cast'],
            $film['director'],
            $film['ageRestrictions'],
            $film['image']
        );

    }

    public function addFilm(Film $film): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO movie (name, genre, release, cast, director, certificate, image)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');


        $stmt->execute([
            $film->getFilmName(),
            $film->getFilmGenre(),
            $film->getReleaseDate(),
            $film->getCast(),
            $film->getDirector(),
            $film->getRunningTime(),
            $film->getImage(),



        ]);
    }
}