<?php
/* Smarty version 3.1.30, created on 2017-04-07 11:46:57
  from "/var/www/html/core/smarty/templates/index.template.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e743f14180d7_97252725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bbc673f609a923ee52f8e31d46404f0163ae370' => 
    array (
      0 => '/var/www/html/core/smarty/templates/index.template.html',
      1 => 1491551214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58e743f14180d7_97252725 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section id="info">
    <div class="container">
        <div class="row">
            <h3 class="text-center">Arduino</h3>
            <div class="row">
                <img src="img/arduino.jpg" alt="" class="img-responsive arduino">
                <p><?php echo $_smarty_tpl->tpl_vars['about']->value;?>
<p>
            </div>
        </div>
    </div>
</section>
<?php }
}
