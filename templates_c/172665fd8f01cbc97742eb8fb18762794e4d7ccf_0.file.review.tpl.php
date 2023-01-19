<?php
/* Smarty version 4.3.0, created on 2023-01-19 10:26:04
  from 'E:\uCertify\website\PHP-Project2\review.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63c90cac04dd29_38910084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '172665fd8f01cbc97742eb8fb18762794e4d7ccf' => 
    array (
      0 => 'E:\\uCertify\\website\\PHP-Project2\\review.tpl',
      1 => 1674120179,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63c90cac04dd29_38910084 (Smarty_Internal_Template $_smarty_tpl) {
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
    <style>
        p{
            margin-bottom: 0;
        }
    </style>
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
                <p class="d-block question" id="<?php echo $_smarty_tpl->tpl_vars['question']->value['content_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['question']->value['question'];?>
</p>
            </div>
            <div class="d-block card-body text-justify" id="options">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['question']->value['options'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['question']->value['attempted'] == "Not Attempted" && $_smarty_tpl->tpl_vars['option']->value['is_correct']) {?>
                        <?php $_smarty_tpl->_assignInScope('correct_option', $_smarty_tpl->tpl_vars['option']->value['option_number']);?>
                        <div class="alert alert-success pt-1 pb-0 d-flex">
                            <div class="btn-group">
                                <label class="btn btn-light font-weight-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                                <input type="radio" disabled accesskey="<?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
" class="selected_option ml-3 mr-2" name="userChecked" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                            </div>
                            <label class="mt-2 mb-0" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                        </div>
                    <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['question']->value['attempted'] == $_smarty_tpl->tpl_vars['option']->value['id']) {?>
                            <?php if ($_smarty_tpl->tpl_vars['option']->value['is_correct']) {?>
                                <?php $_smarty_tpl->_assignInScope('correct_option', $_smarty_tpl->tpl_vars['option']->value['option_number']);?>
                                <div class="alert alert-success pt-1 pb-0 d-flex">
                                    <div class="btn-group">
                                        <label class="btn btn-light font-weight-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                                        <input type="radio" checked="checked" disabled accesskey="<?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
" class="selected_option ml-3 mr-2" name="userChecked" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                                    </div>
                                    <label class="mt-2 mb-0" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger pt-1 pb-0 d-flex">
                                    <div class="btn-group">
                                        <label class="btn btn-light font-weight-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                                        <input type="radio" checked="checked" disabled accesskey="<?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
" class="selected_option ml-3 mr-2" name="userChecked" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                                    </div>
                                    <label class="mt-2 mb-0" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                                </div>
                            <?php }?>
                        <?php } else { ?>
                            <?php if ($_smarty_tpl->tpl_vars['option']->value['is_correct']) {?>
                                <?php $_smarty_tpl->_assignInScope('correct_option', $_smarty_tpl->tpl_vars['option']->value['option_number']);?>
                                <div class="alert alert-success pt-1 pb-0 d-flex">
                                    <div class="btn-group">
                                        <label class="btn btn-light font-weight-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                                        <input type="radio" disabled accesskey="<?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
" class="selected_option ml-3 mr-2" name="userChecked" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                                    </div>
                                    <label class="mt-2 mb-0" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                                </div>
                            <?php } else { ?>
                                <div class="alert pt-1 pb-0 d-flex">
                                    <div class="btn-group">
                                        <label class="btn btn-light font-weight-bold" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</label>
                                        <input type="radio" disabled accesskey="<?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
" class="selected_option ml-3 mr-2" name="userChecked" id="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                                    </div>
                                    <label class="mt-2 mb-0" for="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['answer'];?>
</label><br>
                                </div>
                            <?php }?>
                        <?php }?>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>

        <div class="alert text-white font-weight-bold w-25 text-center mt-3 bg-info" id="correct_option">
            Correct Option : <?php echo $_smarty_tpl->tpl_vars['correct_option']->value;?>

        </div>

        <div class="alert alert-info mt-2" style="margin-bottom: 80px;">
            <strong>Explaination: </strong>
            <p id="explain"><?php echo $_smarty_tpl->tpl_vars['question']->value['explanation'];?>
</p>
        </div>
        <div class="d-flex bg-light card-footer bg-dark text-white justify-content-center fixed-bottom mb-1">
            <button class="btn btn-secondary mx-2" id="dashboardBtn">Dashboard</button>
            <button class="btn btn-secondary mx-2" id="prevBtn">Previous</button>
            <p><span id="current_num"><?php echo $_smarty_tpl->tpl_vars['question']->value['number'];?>
</span> of <span id="total_num"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span></p>
            <button class="btn btn-secondary mx-2" id="nextBtn">Next</button>
            <button class="btn btn-secondary mx-2" id="resultBtn">Result</button>
        </div>
    </div>
</body>
</html><?php }
}
