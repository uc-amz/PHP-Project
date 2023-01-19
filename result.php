<?php
    session_start();
    if(!isset($_SESSION['attempted']))
        header("location: index.php");

    require_once "./process.php";

    include_once "./smarty/Smarty.class.php";
    $smarty = new Smarty();

    $file_data = file_get_contents("question.json");
    $file_data = json_decode($file_data, true);

    $smarty->assign("data", $file_data);
    $smarty->assign("total", total_question());
    $smarty->assign("correct", total_correct());
    $smarty->assign("attempted", end_test("file")['attempted']);
    $smarty->assign('session', $_SESSION['attempted']);

    $smarty->display("result.tpl");
?>

<script>
    $(document).ready(function(){
        $('#dashboardBtn').click(function(){
            window.location.replace("logout.php");
        })
    })
</script>