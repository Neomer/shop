<?php
/* Smarty version 3.1.30, created on 2017-04-07 12:10:07
  from "/var/www/html/core/smarty/templates/main.template.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e7495f9d0b37_61660447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7292bda112be44fe69b63bacb5305c94bcd91fcc' => 
    array (
      0 => '/var/www/html/core/smarty/templates/main.template.html',
      1 => 1491552598,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e7495f9d0b37_61660447 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?php echo $_smarty_tpl->tpl_vars['settings']->value->getValue('site','title');?>
</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">	
	<link href="assets/css/style.css?233235" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
	<![endif]-->
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-4 logo text-left"><img src="img/logo.png" alt="Логотип" class="img-perspective"></div>
				<div class="col-md-4 main_title text-center"><?php echo $_smarty_tpl->tpl_vars['settings']->value->getValue('site','title');?>
</div>
				<div class="col-md-4 main_slogan text-right"><?php echo $_smarty_tpl->tpl_vars['settings']->value->getValue('site','slogan');?>
</div>
			</div>
		</div>
	</header>
	<nav>
		<div class="container">
			<div class="row text-right">
				<ul class="list-inline">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></li>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</ul>
			</div>
		</div>
	</nav>
        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        <pre><?php echo $_smarty_tpl->tpl_vars['debug']->value;?>
</pre>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<?php echo '<script'; ?>
 src="assets/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
