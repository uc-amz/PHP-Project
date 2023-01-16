<?php
    include_once "./smarty/Smarty.class.php";
    $test_page = new Smarty();

    session_start();
    $_SESSION['attempted'] = array();

    $data = file_get_contents("question.json");
    $data = json_decode($data, true);
    foreach($data as $row){
        $_SESSION['attempted'][$row['content_id']] = "Not Attempted";
    }
    $test_page->assign('data', $data);

    $test_page->display("test.tpl");
?>

<script>
    var currentQuestion = [];
    var content_id = "<?php echo $data[0]['content_id'] ?>";
    var current_num = 1;
    var timeLeft;

    $.ajax({
        url:"process.php",
        type:"POST",
        data:{
            key:"total_question"
        },
        success:function(data, status){
            if(status == "success"){
                $('#total_num').text(data);
            }
        }
    })

    function timeOut(){
        option_change();
        minute = Math.floor(timeLeft/60);
        second = timeLeft%60;

        if(timeLeft == 0){
            clearTimeout(tm);
            window.location.replace("result.php");
        }
        else{
            if(minute < 10)
                minute = "0" + minute;
            if(second < 10)
                second = "0" + second;
            $('#timer').text(minute + ":" + second);
        }
        timeLeft--;
        var tm = setTimeout(function(){timeOut()}, 1000);
    }

    $(document).ready(function(){
        $('#prevBtn').click(function(){
            if(current_num > 1){
                $.ajax({
                    url:"process.php",
                    type:"POST",
                    data:{
                        key:"prev_question",
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
            if(current_num < $('#total_num').text()){
                $.ajax({
                    url:"process.php",
                    type:"POST",
                    data:{
                        key:"next_question",
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
        })
        $('#endBtn').click(function(){
            $.ajax({
                url:"process.php",
                type:"POST",
                data:{
                    key:"end_test"
                },
                success:function(data, status){
                    if(status == "success"){
                        $('#end_test_body').html(data);
                    }
                }
            })
        })
        $('#yesBtn').click(function(){
            window.location.replace("result.php");
        })

        // This is for timer.
        timeLeft = Number($('#total_num').text()*60);
    })

    function option_change(){
        $('.selected_option').change(function(){
            answer_id = $(this).attr('id');
            $.ajax({
                url:"process.php",
                type:"POST",
                data:{
                    key:"answer_changed",
                    content_id:content_id,
                    answer_id:answer_id
                },
                success:function(data, status){
                    $('#sidePanel').html(data);
                }
            })
        })
        $('.questionLink').click(function(){
            id = $(this).attr('id');
            callerObj = $(this);
            content_id = id;
            $.ajax({
                url:"process.php",
                type:"POST",
                data:{
                    id:id
                },
                success:function(data, status){
                    $('#question_content').html(data);
                    current_num = callerObj.find('span').text().match(/\d+/)[0];
                    $('#current_num').text(current_num);
                }
            })
        })
    }
</script>