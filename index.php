<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    
    // lOAD CLASSES
    include_once 'autoload.php';
    
    // load pages from url req.'
    $URL =  $_SERVER['REQUEST_URI'];
    
    // explode and remove learnphp
    $parentDir = explode('/', __DIR__);
    $split =  explode($parentDir[count($parentDir) -1] . '/', $URL);
    
    $cur_route = $split[1];
    
     # Render ROute
    Route::render($cur_route)
?>