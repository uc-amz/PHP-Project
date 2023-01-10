<?php
/* Smarty version 4.3.0, created on 2023-01-10 10:02:00
  from 'C:\xampp\htdocs\ucertify\PHP-Project\review.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63bd2988d49760_53452325',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41cce6b87c1bc451f657f803f345ffa81f538062' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ucertify\\PHP-Project\\review.tpl',
      1 => 1673341317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63bd2988d49760_53452325 (Smarty_Internal_Template $_smarty_tpl) {
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

    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"><?php echo '</script'; ?>
>

    <title>Review Question | uCertify</title>
</head>
<body >
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
    
    <div class="container">
        <div id="question_content" class="card mt-5">
            <div class="card-header bg-info text-white">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['content_id'] == $_smarty_tpl->tpl_vars['content_id']->value) {?>
                        <p class="d-block" id="<?php echo $_smarty_tpl->tpl_vars['content_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['snippet'];?>
</p>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="d-block card-body ml-5">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['content_id'] == $_smarty_tpl->tpl_vars['content_id']->value) {?>
                        <?php $_smarty_tpl->_assignInScope('content', json_decode($_smarty_tpl->tpl_vars['row']->value['content_text'],true));?>
                        <?php $_smarty_tpl->_assignInScope('content', $_smarty_tpl->tpl_vars['content']->value['answers']);?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['content']->value, 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                            <?php if ($_SESSION['attempted'][$_smarty_tpl->tpl_vars['row']->value['content_id']] != "Not Attempted" && $_smarty_tpl->tpl_vars['smart']->value['session']['attempted'][$_smarty_tpl->tpl_vars['row']->value['content_id']] == $_smarty_tpl->tpl_vars['option']->value['id']) {?>
                                <input type="radio" class="ml-3 mr-2" checked="checked" disabled id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                                <label for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                            <?php } else { ?>
                                <input type="radio" class="ml-3 mr-2" disabled id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                                <label for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php break 1;?>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
        <div class="alert alert-info mt-5 mb-5">
            <strong>Explaination: </strong>
            <p id="explain"></p>
        </div>
        <div class="d-flex bg-light card-footer bg-dark text-white justify-content-center fixed-bottom mb-1">
            <button class="btn btn-secondary mx-2" id="dashboardBtn">Dashboard</button>
            <button class="btn btn-secondary mx-2" id="prevBtn">Previous</button>
            <p><span id="current_num">1</span> of <span id="total_num"></span></p>
            <button class="btn btn-secondary mx-2" id="nextBtn">Next</button>
            <button class="btn btn-secondary mx-2" id="resultBtn">Result</button>
        </div>
    </div>
</body>
</html><?php }
}
