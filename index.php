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
        
    require_once 'core/model/Resource.model.php';
    $menu = array();
    $res = new Resource();
    $res->select(
            array('menu_display' => 1), 
            array('menu_index')
    );
    
    if ($res->isValid())
    {
        do {
            array_push($menu, 
                    array(
                        "title" => $res->getMenuTitle(),
                        "path" => $engine->createUrlById($res->getId(), array('test'=> 'fdf'))
                    ));
        } while ($res->next());
    }
    
    
    $smarty->assign('menu', $menu);
    
    $sm_data = $smarty->createData();
    $usr = $engine->getUser();
    $resource = $engine->getResource();
    $template = $resource->getTemplate();
    
    if (defined('__DEBUG__'))
        $smarty->assign('debug', $debug);

    $output = '';
    if ($resource->getParentId() != 0) {
        $output = $smarty->fetch($template);
        $resource = $engine->getResource( $resource->getParentId() );
        $template = $resource->getTemplate();
    }
    $smarty->assign('content', $output);
    $smarty->display($template);
?>
