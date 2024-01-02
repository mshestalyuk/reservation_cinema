<?php
require_once __DIR__ .'/../models/Film.php';
require_once 'AppController.php';
class FilmController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/app/public/uploads/';

    private $message = [];

    public function addFilm()
    {   
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            $targetPath = self::UPLOAD_DIRECTORY . $_FILES['file']['name'];
        
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
                // File moved successfully, proceed with creating Film object
                $film = new Film(
                    $_POST['filmName'], 
                    $_POST['releaseDate'], 
                    $_POST['runningTime'], 
                    $_POST['originalTitle'], 
                    $_POST['filmGenre'], 
                    $_POST['cast'], 
                    $_POST['director'], 
                    $_POST['ageRestrictions'], 
                    $_FILES['file']['name']
                );
        
                // TO DO
                // save film to database
                } 
                else 
                {
                // Handle the error, file couldn't be moved
                $this->message[] = "Error: Could not move the file.";
            }
        } else {
            // Handle other errors, like file not uploaded or validation failed
            $this->message[] = "Error: Invalid file upload or validation failed.";
        }
        
        return $this->render('add_film', ['messages' => $this->message]);
     }

     private function validate(array $file): bool
     {
         if ($file['size'] > self::MAX_FILE_SIZE) {
             $this->message[] = 'File is too large for destination file system.';
             return false;
         }
 
         if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
             $this->message[] = 'File type is not supported.';
             return false;
         }
         return true;
     }
}