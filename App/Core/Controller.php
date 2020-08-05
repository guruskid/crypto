<?php
/* 
    * Base Controller
    * Loads the models and views
*/

class Controller {
    // Load Model
    public function model($model) {
        // Require model file
        require_once '../App/Models/' . $model . '.php';
        
        // Instantiate Model
        return new $model();
    }

    // Load View
    public function view($view, $data = []){
        // check for View files
        if (file_exists('../App/Views/' . $view . '.php')) {
            require_once '../App/Views/' . $view . '.php';
        } else {
            // Views doest not exists
            die('Views doesn\'t exists');
        }
    }
}