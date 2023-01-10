<?php
/* Smarty version 4.3.0, created on 2023-01-10 10:13:07
  from 'C:\xampp\htdocs\ucertify\PHP-Project\test.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63bd2c23a54a59_61213513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89afe528c0bb2cda084a94370dcbaa0af21a7b8a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ucertify\\PHP-Project\\test.tpl',
      1 => 1673341980,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63bd2c23a54a59_61213513 (Smarty_Internal_Template $_smarty_tpl) {
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

    <link href="https://staging.appcropolis.com/functions/preview/appcropolis/amk-source/main.css" rel="stylesheet">

    <title>PHP Project | Dashboard</title>
</head>
<body onload="timeOut()">
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
        <!-- Modal for side panel -->
        <div class="amk modal fade left from-left delay-200 modal-example-sidebar-left" id="list" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document" style="width: 500px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">All Questions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body" id="sidePanel">
                        <ul class="list-group">
                            <?php $_smarty_tpl->_assignInScope('count', 0);?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                                <?php $_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);?>
                                <?php if ($_SESSION['attempted'][$_smarty_tpl->tpl_vars['row']->value['content_id']] == "Not Attempted") {?>
                                    <a type="button" data-dismiss="modal" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
" class="questionLink"> <li class="list-group-item bg-danger text-white"><span>Q <?php echo $_smarty_tpl->tpl_vars['count']->value;?>
 </span><?php echo $_smarty_tpl->tpl_vars['row']->value['snippet'];?>
</li></a>
                                <?php } else { ?>
                                    <a type="button" data-dismiss="modal" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
" class="questionLink"> <li class="list-group-item bg-success text-white"><span>Q <?php echo $_smarty_tpl->tpl_vars['count']->value;?>
 </span><?php echo $_smarty_tpl->tpl_vars['row']->value['snippet'];?>
</li></a>
                                <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Side Panel End -->

        <!-- Modal for End Test -->
        <div class="modal fade" id="endTest">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <strong>Are you sure want to end test</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body" id="end_test_body">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">No</button>
                        <button class="btn btn-danger" id="yesBtn" type="button" class="close" data-dismiss="modal">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="question_content" class="card mt-5">
            <div class="card-header bg-info text-white">
                <p class="d-block" id="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['content_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value[0]['snippet'];?>
</p>
            </div>
            <div class="d-block card-body ml-5">
                <?php $_smarty_tpl->_assignInScope('row', json_decode($_smarty_tpl->tpl_vars['data']->value[0]['content_text'],true));?>
                <?php $_smarty_tpl->_assignInScope('row', $_smarty_tpl->tpl_vars['row']->value['answers']);?>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'line');
$_smarty_tpl->tpl_vars['line']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->do_else = false;
?>
                        <input type="radio" class="selected_option ml-3 mr-2" name="userChecked" value="<?php echo $_smarty_tpl->tpl_vars['line']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['line']->value['id'];?>
">
                        <label for="<?php echo $_smarty_tpl->tpl_vars['line']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['line']->value['answer'];?>
</label><br>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>

        <div class="d-flex bg-dark card-footer justify-content-center text-white fixed-bottom mb-1">
            <p id="timer"></p>
            <button class="btn btn-secondary mx-2" type="button" data-target="#list" data-toggle="modal">List</button>
            <button class="btn btn-secondary mx-2" id="prevBtn">Previous</button>
            <p><span id="current_num">1</span> of <span id="total_num"></span></p>
            <button class="btn btn-secondary mx-2" id="nextBtn">Next</button>
            <button class="btn btn-secondary mx-2" id="endBtn" data-toggle="modal" data-target="#endTest">End Test</button>
        </div>
    </div>
</body>
</html><?php }
}
