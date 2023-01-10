<?php
    session_start();
    if(!isset($_SESSION['attempted']) || !isset($_GET['content_id']))
        header("location: index.php");

    include_once "./smarty/Smarty.class.php";
    $review = new Smarty();

    $data = file_get_contents("question.json");
    $data = json_decode($data, true);
    $review->assign("data", $data);
    $content_id = $_GET['content_id'];
    $review->assign("content_id", $content_id);
    $review->assign('session', $_SESSION['attempted']);
    $review->display("review.tpl");
?> 

<script>
    var content_id = "<?php echo $_GET['content_id'] ?>";
    var current_num = "<?php echo $_GET['current_num'] ?>";
    var total_num = 0;

    $.ajax({
        url:"process.php",
        type:"POST",
        data:{
            key:"explain",
            content_id:content_id
        },
        success:function(data, status){
            if(status == "success"){
                $('#explain').html(data);
            }
        }
    })

    getTotalQuestion();
    $(document).ready(function(){
        $('#current_num').text(current_num);
        $('#dashboardBtn').click(function(){
            window.location.replace("logout.php");
        })
        $('#resultBtn').click(function(){
            window.location.replace("result.php");
        })

        $('#prevBtn').click(function(){
            if(current_num > 1){
                $.ajax({
                    url:"process.php",
                    type:"POST",
                    data:{
                        key:"prev_explain",
                        content_id:content_id
                    },
                    success:function(data, status){
                        if(status == "success"){
                            $('#explain').html(data);
                        }
                    }
                })
                $.ajax({
                    url:"process.php",
                    type:"POST",
                    data:{
                        key:"review_prev_question",
                        content_id:content_id
                    },
                    success:function(data, status){
                        $('#question_content').html(data);
                        current_num--;
                        $('#current_num').text(current_num);
                        content_id = $('#question_content').find('p').attr('id');
                    }
                })
            }
        })
        $('#nextBtn').click(function(){
            if(current_num < Number(total_num)){
                $.ajax({
                    url:"process.php",
                    type:"POST",
                    data:{
                        key:"next_explain",
                        content_id:content_id
                    },
                    success:function(data, status){
                        if(status == "success"){
                            $('#explain').html(data);
                        }
                    }
                })
                $.ajax({
                    url:"process.php",
                    type:"POST",
                    data:{
                        key:"review_next_question",
                        content_id:content_id
                    },
                    success:function(data, status){
                        $('#question_content').html(data);
                        current_num++;
                        $('#current_num').text(current_num);
                        content_id = $('#question_content').find('p').attr('id');
                    }
                })
            }
            else
                alert("false");
        })
    })

    function getTotalQuestion(){
        $.ajax({
            url:"process.php",
            type:"POST",
            data:{
                key:"total_question"
            },
            success:function(data, status){
                if(status == "success"){
                    total_num = data;
                    $('#total_num').text(total_num);
                }
            }
        })
    }
</script>