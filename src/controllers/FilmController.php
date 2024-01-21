<?php
require_once __DIR__ .'/../models/Film.php';
require_once 'AppController.php';
require_once __DIR__.'/../repository/FilmRepository.php';
class FilmController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $filmRepository;


    public function __construct()
    {
        parent::__construct();
        $this->filmRepository = new FilmRepository();
    }

    public function films(){

        $films = $this->filmRepository->getFilms();
        $this->render(  'films', ['films' => $films]);

    }

    public function addFilm()
    {

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file']))
        {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
            $film = new Film(
                $_POST['name'],
                $_POST['genre'],
                $_POST['release'],
                $_POST['cast'],
                $_POST['director'],
                $_POST['certificate'],
                $_FILES['file']['name']
            );
            $this->filmRepository->addFilm($film);
            return $this->render('films', ['messages' => $this->messages]);
        }
        return $this->render('add_films', ['messages' => $this->messages]);
}

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->filmRepository->getFilmByTitle($decoded['search']));
        }
    }

     private function validate(array $file): bool
     {
         if ($file['size'] > self::MAX_FILE_SIZE) {
             $this->messages[] = 'File is too large for destination file system.';
             return false;
         }

         if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
             $this->messages[] = 'File type is not supported.';
             return false;
         }
         return true;
     }
}