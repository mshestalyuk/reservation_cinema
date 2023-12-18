<?php
class Film {
    private $filmName;
    private $releaseDate;
    private $runningTime;
    private $originalTitle;
    private $filmGenre;
    private $cast;
    private $director;
    private $ageRestrictions;
    private $image;

    public function __construct($filmName, $releaseDate, $runningTime, $originalTitle, $filmGenre, $cast, $director, $ageRestrictions, $image)
    {
        $this->filmName = $filmName;
        $this->releaseDate = $releaseDate;
        $this->runningTime = $runningTime;
        $this->originalTitle = $originalTitle;
        $this->filmGenre = $filmGenre;
        $this->cast = $cast;
        $this->director = $director;
        $this->ageRestrictions = $ageRestrictions;
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

    public function getRunningTime() {
        return $this->runningTime;
    }

    public function setRunningTime($runningTime) {
        $this->runningTime = $runningTime;
    }

    public function getOriginalTitle() {
        return $this->originalTitle;
    }

    public function setOriginalTitle($originalTitle) {
        $this->originalTitle = $originalTitle;
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

    public function getAgeRestrictions() {
        return $this->ageRestrictions;
    }

    public function setAgeRestrictions($ageRestrictions) {
        $this->ageRestrictions = $ageRestrictions;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}
