<?php
require_once '../Model.php';

class Image extends Model{
    public $title;
    public $author;
    public $name;
    protected $id;

    public function __construct($title, $author, $name){
        $this->title = $title;
        $this->author = $author;
        $this->name = $name;
    }

    public function save()  {
        //DB::get()->images->drop();
        $response = DB::get()->images->insertOne([
            'title' => $this->title,
            'author' => $this->author,
            'name' => $this->name,
        ]);
        $this->_id = $response->getInsertedId();

    }

    public static function getAll() {
        $response = DB::get()->images->find();
        $images = [];
        foreach ($response as $image){
            array_push($images, new Image($image['title'], $image['author'], $image['name']));
        }
        return $images;
    }

    public static function get_images_count(){
        return DB::get()->images->count();
    }

    public function id() {
        return $this->id;
    }
}