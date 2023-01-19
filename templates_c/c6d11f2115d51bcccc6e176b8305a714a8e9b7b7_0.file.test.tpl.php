<?php
/* Smarty version 4.3.0, created on 2023-01-19 10:31:42
  from 'E:\uCertify\website\PHP-Project2\test.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63c90dfe8fe226_69217506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6d11f2115d51bcccc6e176b8305a714a8e9b7b7' => 
    array (
      0 => 'E:\\uCertify\\website\\PHP-Project2\\test.tpl',
      1 => 1674120686,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63c90dfe8fe226_69217506 (Smarty_Internal_Template $_smarty_tpl) {
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

    <title>PHP Project | Test</title>
    <style>
        p{
            margin-bottom: 0;
        }
    </style>
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
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_question']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                                <div class="card">
                                    <a type="button" data-dismiss="modal" id="<?php echo $_smarty_tpl->tpl_vars['row']->value['content_id'];?>
" class="questionLink"> <li class="list-group-item bg-danger text-white"><span>Q <?php echo $_smarty_tpl->tpl_vars['row']->value['number'];?>
 </span><?php echo $_smarty_tpl->tpl_vars['row']->value['question'];?>
</li></a>
                                </div>
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
                        <strong>Are you sure want to end test?</strong>
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
                <p class="d-block question" id="<?php echo $_smarty_tpl->tpl_vars['content_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['question']->value;?>
</p>
            </div>
            <div class="d-block card-body ml-5 text-justify" id="options">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['options']->value, 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                    <div class="d-flex">
                        <div class="btn-group">
                            <label class="btn btn-light font-weight-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                            <input type="radio" accesskey="<?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
" class="selected_option ml-3 mr-2" name="userChecked" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                        </div>
                        <label class="mt-2 mb-0" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>

        <div class="d-flex bg-dark card-footer align-items-center justify-content-center text-white fixed-bottom mb-1">
            <p id="timer" class="mb-0"></p>
            <button class="btn btn-secondary mx-2" type="button" data-target="#list" data-toggle="modal">List</button>
            <button class="btn btn-secondary mx-2" id="prevBtn">Previous</button>
            <p class="mb-0"><span id="current_num">1</span> of <span id="total_num"><?php echo $_smarty_tpl->tpl_vars['total_question']->value;?>
</span></p>
            <button class="btn btn-secondary mx-2" id="nextBtn">Next</button>
            <button class="btn btn-secondary mx-2" id="endBtn" data-toggle="modal" data-target="#endTest">End Test</button>
        </div>
    </div>
</body>
</html><?php }
}
