<?php

class ImageListView {
    private $images;

    public function __construct($images){
        $this->images = $images;
    }

    public function render(){
        $images = $this->images;
        require '../layouts/imagelist.php';
    }
}