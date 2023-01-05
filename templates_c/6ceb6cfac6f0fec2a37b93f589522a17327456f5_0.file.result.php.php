<?php
/* Smarty version 4.3.0, created on 2023-01-05 13:36:22
  from 'C:\xampp\htdocs\ucertify\PHP-Project\result.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63b6c446752864_44655453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ceb6cfac6f0fec2a37b93f589522a17327456f5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ucertify\\PHP-Project\\result.php',
      1 => 1672922176,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63b6c446752864_44655453 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>

    include_once "./smarty/Smarty.class.php";
    $result = new Smarty();

    session_start();
    $data = file_get_contents("question.json");
    $data = json_decode($data, true);

    $total = 0;
    $correct = 0;

    foreach($data as $row){
        $total++;
        $content = json_decode($row['content_text'], true);
        foreach($content['answers'] as $option){
            if($_SESSION['attempted'][$row['content_id']] == $option['id'] && $option['is_correct'] == 1)
                $correct++;
        }
    }

    $attempted = 0;
    foreach($_SESSION['attempted'] as $data){
        if($data != "Not Attempted")
            $attempted++;
    }

    $result->assign("data", $data);
    $result->assign("total", $total);
    $result->assign("correct", $correct);
    $result->assign("attempted", $attempted);

    $result->display("result.php");
<?php echo '?>';
}
}
