<?php 
    class Document {
        public $content = "";
        public $path = "";
        public $author = "";
        
        public function __construct($content, $path, $author) {
            $this->content = $content;
            $this->path = $path;
            $this->author = $author;
        }
    }
?>