<?php
    require_once "./process.php";
    include_once "./smarty/Smarty.class.php";
    $smarty = new Smarty();

    session_start();
    $_SESSION['attempted'] = array();
    $data = file_get_contents("question.json");
    $data = json_decode($data, true);
    foreach($data as $row){
        $_SESSION['attempted'][$row['content_id']] = "Not Attempted";
    }

    // Getting first question.
    $question_array = first_question();

    $smarty->assign("content_id", $question_array['content_id']);
    $smarty->assign("question", $question_array['question']);
    $smarty->assign("options", $question_array['options']);
    $smarty->assign("all_question", all_question());
    $smarty->assign("total_question", total_question());
    $smarty->display("test.tpl");
?>

<script>
    var content_id;
    var current_num = 1;
    var timeLeft;

    $(document).ready(function(){
        // This is for timer.
        timeLeft = Number($('#total_num').text()*60);
        content_id = $('.question').attr('id');

        $('.questionLink').click(function(){
            id = $(this).attr('id');
            callerObj = $(this);
            content_id = id;
            $.ajax({
                url:"api-question.php",
                type:"POST",
                data:JSON.stringify({
                    key:"selected_question",
                    content_id:content_id
                }),
                success:function(data){
                    current_num = data.number;
                    load_question(data);
                }
            })
        })

        $('#prevBtn').click(function(){
            if(current_num > 1){
                $.ajax({
                    url:"api-question.php",
                    type:"POST",
                    data:JSON.stringify({
                        key:"prev_question",
                        current_id : content_id
                    }),
                    success:function(data){
                        current_num--;
                        content_id = data.content_id;
                        load_question(data);
                    }
                })
            }
        })
        $('#nextBtn').click(function(){
            if(current_num < $('#total_num').text()){
                $.ajax({
                    url:"api-question.php",
                    type:"POST",
                    data:JSON.stringify({
                        key:"next_question",
                        current_id : content_id
                    }),
                    success:function(data){
                        current_num++;
                        content_id = data.content_id;
                        load_question(data);
                    }
                })
            }
        })
        $('#endBtn').click(function(){
            $.ajax({
                url:"api-question.php",
                type:"POST",
                data:JSON.stringify({
                    key : "end_test"
                }),
                success:function(data){
                    temp = '<p>Total Question: ' + data.total + '</p>';
                    temp += '<p>Attempted Question: ' + data.attempted + '</p>';
                    temp += '<p>Remaining Question: ' + data.remaining + '</p>';
                    $('#end_test_body').html(temp);
                }
            })
        })
        $('#yesBtn').click(function(){
            window.location.replace("result.php");
        })
    })
    $(document).on("change", ".selected_option", function(){
        answer_id = $(this).attr('id');
        $.ajax({
            url:"api-question.php",
            type:"POST",
            data:JSON.stringify({
                key : "answer_changed",
                content_id : content_id,
                answer_id : answer_id
            }),
            success:function(data){
                $('a#'+content_id).children('li').attr('class', data.message);
            }
        })
    })

    function load_question(data){
        $('.question').text(data.question);
        $('#current_num').text(data.number);
        let temp = ""
        $.each(data.options, function(key, value){
            if(data.attempted == value.id){
                temp += '<div class="d-flex">'+
                            '<div class="btn-group">'+
                            '<label class="btn btn-light font-weight-bold" for="'+ value.id +'">'+ value.option_number +'</label>' +
                            '<input type="radio" checked="checked" accesskey="'+ value.option_number +'" class="selected_option ml-3 mr-2" name="userChecked" id="'+ value.id +'">' +
                            '</div>'+
                            '<label class="mt-2 mb-0" for="'+ value.id +'">'+ value.answer +'</label><br>'+
                        '</div>';
            }
            else{
                temp += '<div class="d-flex">'+
                            '<div class="btn-group">'+
                            '<label class="btn btn-light font-weight-bold" for="'+ value.id +'">'+ value.option_number +'</label>' +
                            '<input type="radio" accesskey="'+ value.option_number +'" class="selected_option ml-3 mr-2" name="userChecked" id="'+ value.id +'">' +
                            '</div>'+
                            '<label class="mt-2 mb-0" for="'+ value.id +'">'+ value.answer +'</label><br>'+
                            '</div>';
            }
        })
        $('#options').html(temp);
    }

    function timeOut(){
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
</script>