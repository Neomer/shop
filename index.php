<?php
    $output = '';
    $error = '';
    $debug = '';
    $settings = '';
    
    $debug .= 'cookie: '.json_encode($_COOKIE, JSON_PRETTY_PRINT)."\n";
    $debug .= 'env: '.json_encode($_ENV, JSON_PRETTY_PRINT)."\n";
    $debug .= 'files: '.json_encode($_FILES, JSON_PRETTY_PRINT)."\n";
    $debug .= 'get: '.json_encode($_GET, JSON_PRETTY_PRINT)."\n";
    $debug .= 'post: '.json_encode($_POST, JSON_PRETTY_PRINT)."\n";
    $debug .= 'request: '.json_encode($_REQUEST, JSON_PRETTY_PRINT)."\n";
    $debug .= 'server: '.json_encode($_SERVER, JSON_PRETTY_PRINT)."\n";

    require_once 'config/config.php';
    include_once 'core/smarty/libs/Smarty.class.php';
    
    $smarty = new Smarty();
    $smarty->setCacheDir('core/smarty/cache');
    $smarty->setTemplateDir('core/smarty/templates');
    $smarty->setCompileDir('core/smarty/templates_c');
    
    require_once 'core/Database.class.php';
    require_once 'core/Settings.class.php';
    $settings = new Settings();
    $smarty->assign('settings', $settings);
    
    require_once 'core/model/Engine.model.php';
    require_once 'core/model/User.model.php';
    $engine = new Engine();
    $smarty->assign('engine', $engine);
    $smarty->assign('menu', array(
        array(
            "path" => $engine->createUrlById(1),
            "title" => "Главная"
        ),
        array(
            "path" => $engine->createUrlById(2),
            "title" => "Оплата"
        ),
        array(
            "path" => $engine->createUrlById(3),
            "title" => "Доставка"
        ),
        array(
            "path" => $engine->createUrlById(4),
            "title" => "Магазин"
        ),
        array(
            "path" => $engine->createUrlById(5),
            "title" => "Вход"
        ),
   ));
    
    $sm_data = $smarty->createData();
    $usr = $engine->getUser();
    $resource = $engine->getResource();
    $template = $resource->getTemplate();
    
    if (defined('__DEBUG__'))
        $smarty->assign('debug', $debug);

    $smarty->assign('site_name', 'test site');
    $smarty->assign('content', $output);
    $smarty->display($template);
?>
