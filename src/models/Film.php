<?php
class Film {
    private $filmName;
    private $releaseDate;
    private $filmGenre;
    private $cast;
    private $director;
    private $certificate;
    private $image;

    public function __construct($filmName, $releaseDate, $filmGenre, $cast, $director, $certificate, $image)
    {
        $this->filmName = $filmName;
        $this->releaseDate = $releaseDate;
        $this->filmGenre = $filmGenre;
        $this->cast = $cast;
        $this->director = $director;
        $this->certificate = $certificate;
        $this->image = $image;
    }

    // Getters and Setters
    public function getFilmName() {
        return $this->filmName;
    }

    public function setFilmName($filmName) {
        $this->filmName = $filmName;
    }

    public function getReleaseDate() {
        return $this->releaseDate;
    }

    public function setReleaseDate($releaseDate) {
        $this->releaseDate = $releaseDate;
    }

    public function getFilmGenre() {
        return $this->filmGenre;
    }

    public function setFilmGenre($filmGenre) {
        $this->filmGenre = $filmGenre;
    }

    public function getCast() {
        return $this->cast;
    }

    public function setCast($cast) {
        $this->cast = $cast;
    }

    public function getDirector() {
        return $this->director;
    }

    public function setDirector($director) {
        $this->director = $director;
    }

    public function getCertificate() {
        return $this->certificate;
    }

    public function setCertificate($certificate) {
        $this->certificate = $certificate;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}
