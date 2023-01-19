<?php
/* Smarty version 4.3.0, created on 2023-01-17 14:48:51
  from 'E:\uCertify\website\PHP-Project2\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63c6a743776c27_87200150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c23ea94a3431b40ecd288b7b949843ffaefc4be' => 
    array (
      0 => 'E:\\uCertify\\website\\PHP-Project2\\index.tpl',
      1 => 1673963314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63c6a743776c27_87200150 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"><?php echo '</script'; ?>
>

    <!-- Popper JS -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"><?php echo '</script'; ?>
>

    <!-- Latest compiled JavaScript -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

    <!-- jQuery CDN -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"><?php echo '</script'; ?>
>
    <title>uCertify Test</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row border border-dark d-flex">
            <div class="col-4">
                <img src="https://www.ucertify.com/layout/themes/bootstrap4/images/logo/ucertify_logo.png" alt="logo" class="mt-1">
            </div>
            <div class="col-8">
                <h1 class="ml-5">ucertify Test Prep</h1>
            </div>
        </div>
    </div>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <button class="btn btn-primary mb-5" id="startBtn">Start</button>
    </div>
</body>
</html><?php }
}
