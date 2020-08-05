<?php 

// load configure file
require_once 'Configure.php';

// load Url
require_once '../App/Helpers/Url.php';

// Auto Loader core file
spl_autoload_register(function($className) {
    require_once '../App/Core/' . $className . '.php';
});