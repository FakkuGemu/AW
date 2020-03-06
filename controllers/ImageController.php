<?php
require_once '../vendor/autoload.php';
require_once  '../image_helpers.php';
require_once '../views/ImageAddView.php';
require_once '../views/ImageListView.php';
require_once '../views/SearchView.php';
require_once '../views/RedirectView.php';
require_once '../models/Image.php';
require_once '../helpers.php';


class ImageController {

    public function nowy(){
        return new ImageAddView();
    }

    public function add() {

        $image = $_FILES['image'];
        $valid = true;
        if  (isset($image) && $image['size']>0){
            $title = $_POST['title'];
            if(!isset($title) || $title == ""){
                $valid = false;
                Flash::error("Proszę podać tytuł.");
            }

            $watermark = $_POST['watermark'];
            if(!isset($watermark) || $watermark == ""){
                $valid = false;
                Flash::error("Proszę dodać watermark.");
            }

            $author = $_POST['author'];
            if(!isset($author) || $author == ""){
                $valid = false;
                Flash::error("Proszę podać autora.");
            }

            $filePath = $image['tmp_name'];
            $type = mime_content_type($filePath);
            $format = explode('/', $type)[1];

            if($format !== 'jpeg' && $format !== 'png') {
                $valid = false;
                Flash::error("Nieodpowiedni format pliku.");
            }

            $file_size = $image['size'];
            if ($file_size > 1024 * 1024){
                $valid = false;
                Flash::error("Zbyt duzy rozmiar pliku.");
            }

            if($valid) {

                $random_name = explode("/", $filePath);
                $name = "{$random_name[2]}.{$format}";

                $upload_dir = 'imgs/';

                $path = $upload_dir . 'raw/' . "$name";

                move_uploaded_file($filePath, $path);

                $image = new Image($title, $author, $name);
                $image->save();

                $thumbnailPath = $upload_dir . '/thumbnail/' . "{$random_name[2]}.{$format}";
                generateThumbnail($path, $thumbnailPath, $format);

                $watermarkPath = $upload_dir . '/watermark/' . "{$random_name[2]}.{$format}";
                generateWatermark($path, $watermarkPath, $format, $watermark);
            }

        }else Flash::error("Nie zapisano pliku.");

        return new RedirectView('/image/new', 303);
    }

    public function index(){
        $images = Image::getAll();

        return new ImageListView($images);
    }

    public function search(){

        return new SearchView();
    }
}