<?php 
/*
    * App Core Class
    * Creates URL & Load core controllers
    * URL FORMAT - /controller/method/params
*/


class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        $this -> getUrl();

        $url = $this -> getUrl();

        // Look in Controllers for first value
        if (file_exists('../App/Controllers/' . ucwords($url[0]). '.php')) {
            // If exist, set as controller 
            $this -> currentController = ucwords($url[0]);
            unset($url[0]);
        }

        // Require the controller
        require_once '../App/Controllers/' . $this -> currentController . '.php';

        //Instantiated  controller class
        $this -> currentController = new $this -> currentController;

        // check for second part of the url
        if (isset($url[1])) {
            // check to see if method exist in controller
            if (method_exists($this -> currentController, $url[1])) {
                $this-> currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get Params
        $this -> params = $url ? array_values($url) : [];

        // Call a Callback Function
        call_user_func_array([$this -> currentController, $this -> currentMethod], $this -> params);
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = explode('/' ,filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            return $url;
        }
    }
}
