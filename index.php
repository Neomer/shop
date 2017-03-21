<?php
    $output = '';
    $error = '';
    $debug = '';

    require_once 'config/config.php';
    
    require_once 'core/Database.class.php';
    require_once 'core/model/Engine.model.php';
    require_once 'core/model/User.model.php';
    
    $engine = new Engine();
    
    $usr = new User();
    $usr->get(array("username" => "admin",
                    "password" => "admin"));
    
    if ($usr->isValid()) {
        $usr->getUsername();
    } else {
        $output .= 'User is not found!';
    }
    
    if (defined('__DEBUG__'))
        echo '<pre>DEBUG: '.$debug.'</pre>';
    
    echo $output;
?>
