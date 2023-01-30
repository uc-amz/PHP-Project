<?php
/* Smarty version 4.3.0, created on 2023-01-30 06:32:26
  from 'E:\uCertify\website\PHP-Project\result.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63d7566a058521_17262299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de5257fb2b91c8c1236e4e166aab1cbd2ac2bc01' => 
    array (
      0 => 'E:\\uCertify\\website\\PHP-Project\\result.tpl',
      1 => 1675056742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d7566a058521_17262299 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>Test Result</title>
    <style>
        p{
            margin-bottom: 0;
        }
    </style>
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
    <div class="container my-5 justify-content-center">
        <div class="card m-auto w-50">
            <div class="card-header bg-info text-white text-center">
                <h5>Result</h5>
            </div>
            
            <div class="card-body text-center">
                <div class="alert alert-warning">Total Question: <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</div>
                <div>Attempted Question: <?php echo $_smarty_tpl->tpl_vars['attempted']->value;?>
</div>
                <div>Remaining Question: <?php echo $_smarty_tpl->tpl_vars['total']->value-$_smarty_tpl->tpl_vars['attempted']->value;?>
</div>
                <div>Correct Answer: <?php echo $_smarty_tpl->tpl_vars['correct']->value;?>
</div>
                <div>Incorrect Answer: <?php echo $_smarty_tpl->tpl_vars['attempted']->value-$_smarty_tpl->tpl_vars['correct']->value;?>
</div>
                <div class="alert alert-info mt-2">Result: <?php echo $_smarty_tpl->tpl_vars['correct']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-secondary" id="dashboardBtn">Go To Dashboard</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center"><h5>All Questions</h5></div>
        <table class="table table-hover w-auto">
            <thead>
                <tr class="text-center">
                    <th>Index</th>
                    <th>Question</th>
                    <th>Options</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                        <?php $_smarty_tpl->_assignInScope('question', selected_question($_smarty_tpl->tpl_vars['row']->value['content_id'],"file"));?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['question']->value['number'];?>
</td>
                            <td><a href="review.php?content_id=<?php echo $_smarty_tpl->tpl_vars['question']->value['content_id'];?>
" class="question_link" id="<?php echo $_smarty_tpl->tpl_vars['question']->value['content_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['question']->value['question'];?>
</a></td>
                            <td>
                                <?php $_smarty_tpl->_assignInScope('result', "Not Attempted");?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['question']->value['options'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                                    <?php $_smarty_tpl->_assignInScope('color', "secondary");?>
                                    <?php $_smarty_tpl->_assignInScope('flag', false);?>
                                    <?php if ($_smarty_tpl->tpl_vars['session']->value[$_smarty_tpl->tpl_vars['question']->value['content_id']] == $_smarty_tpl->tpl_vars['option']->value['id']) {?>
                                        <?php $_smarty_tpl->_assignInScope('flag', true);?>
                                        <?php if ($_smarty_tpl->tpl_vars['option']->value['is_correct'] == 1) {?>
                                            <?php $_smarty_tpl->_assignInScope('result', "Correct");?>
                                            <div class="d-inline-block alert alert-success"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</div>
                                        <?php } else { ?>
                                            <?php $_smarty_tpl->_assignInScope('result', "Incorrect");?>
                                            <div class="d-inline-block alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</div>
                                        <?php }?>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['option']->value['is_correct'] == 1 && (!$_smarty_tpl->tpl_vars['flag']->value)) {?>
                                        <div class="d-inline-block alert alert-success"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</div>
                                    <?php } elseif ((!$_smarty_tpl->tpl_vars['flag']->value)) {?>
                                        <div class="d-inline-block alert alert-secondary"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_number'];?>
</div>
                                    <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['result']->value == "Correct") {?>
                                    <div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
</div>
                                <?php } elseif ($_smarty_tpl->tpl_vars['result']->value == "Incorrect") {?>
                                    <div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
</div>
                                <?php } else { ?>
                                    <div class="alert alert-secondary"><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
</div>
                                <?php }?>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</body>
</html><?php }
}
