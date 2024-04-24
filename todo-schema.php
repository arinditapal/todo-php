<?php 
    class Todo {
        
        public int $id;
        public string $title;
        public bool $completed;

        public function __construct(int $id, string $title, bool $completed) {
            $this->id = $id;
            $this->title = $title;
            $this->completed = $completed;
        }
    }
?>