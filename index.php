<?php
    include_once "./smarty/Smarty.class.php";
    $index = new Smarty();

    $index->display("index.tpl");
?>

<script>
    $(document).ready(function(){
        $('#startBtn').click(function(){
            window.location.replace("test.php");
        })
    })
</script>
