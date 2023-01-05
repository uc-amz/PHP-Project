<?php
    session_start();
    if(!isset($_SESSION['attempted']))
        header("location: index.php");

    include_once "./smarty/Smarty.class.php";
    $result = new Smarty();

    $data = file_get_contents("question.json");
    $data = json_decode($data, true);
    $result->assign("data", $data);

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

    $result->assign("total", $total);
    $result->assign("correct", $correct);
    $result->assign("attempted", $attempted);
    $result->assign('session', $_SESSION['attempted']);

    $result->display("result.tpl");
?>

<script>
    $(document).ready(function(){
        $('#dashboardBtn').click(function(){
            <?php session_destroy() ?>
            window.location.replace("index.php");
        })
    })
</script>