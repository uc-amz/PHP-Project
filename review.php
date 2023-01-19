<?php
    session_start();
    if(!isset($_SESSION['attempted']) || !isset($_GET['content_id']))
        header("location: index.php");

    require_once "./process.php";
    include_once "./smarty/Smarty.class.php";
    $smarty = new Smarty();

    $content_id = $_GET['content_id'];

    $smarty->assign("question", selected_question($content_id, "file"));
    $smarty->assign("total", total_question());
    $smarty->display("review.tpl");
?>

<script>
    current_num = $('#current_num').text();
    current_id = $('.question').attr('id');
    $(document).ready(function(){
        $('#dashboardBtn').click(function(){
            window.location.replace("logout.php");
        })
        $('#resultBtn').click(function(){
            window.location.replace("result.php");
        })
        $('#prevBtn').click(function(){
            if(current_num > 1){
                $.ajax({
                    url:"api-question.php",
                    type:"POST",
                    data:JSON.stringify({
                        key : "prev_question",
                        current_id : current_id
                    }),
                    success : function(data){
                        current_num--;
                        current_id = data.content_id;
                        var obj = {
                            Title: "Review Question | uCertify",
                            Url: window.location.href.split("?")[0]+"?content_id="+current_id
                        };
                        history.pushState(obj, obj.Title, obj.Url);
                        load_question(data);
                    }
                })
            }
        })
        $('#nextBtn').click(function(){
            if(current_num < Number($('#total_num').text())){
                $.ajax({
                    url:"api-question.php",
                    type:"POST",
                    data:JSON.stringify({
                        key : "next_question",
                        current_id : current_id
                    }),
                    success : function(data){
                        current_num++;
                        current_id = data.content_id;
                        var obj = {
                            Title: "Review Question | uCertify",
                            Url: window.location.href.split("?")[0]+"?content_id="+current_id
                        };
                        history.pushState(obj, obj.Title, obj.Url);
                        load_question(data);
                    }
                })
            }
        })

        function load_question(data){
            $('.question').text(data.question);
            $('#current_num').text(data.number);
            let temp = "";
            let correct_option = "";
            $.each(data.options, function(key, value){
                if(data.attempted == "Not Attempted" && value.is_correct == 1){
                    correct_option = value.option_number;
                    temp += '<div class="alert alert-success pt-1 pb-0 d-flex">'+
                            '<div class="btn-group">'+
                                '<label class="btn btn-light font-weight-bold" for="'+value.id+'">'+value.option_number+'</label>'+
                                '<input type="radio" disabled accesskey="'+value.option_number+'" class="selected_option ml-3 mr-2" name="userChecked" id="'+value.id+'">'+
                            '</div>'+
                            '<label class="mt-2 mb-0" for="'+value.id+'">'+value.answer+'</label><br>'+
                        '</div>';
                }
                else{
                    if(data.attempted == value.id){
                        if(value.is_correct == 1){
                            correct_option = value.option_number;
                            temp += '<div class="alert alert-success pt-1 pb-0 d-flex">'+
                                '<div class="btn-group">'+
                                    '<label class="btn btn-light font-weight-bold" for="'+value.id+'">'+value.option_number+'</label>'+
                                    '<input type="radio" checked="checked" disabled accesskey="'+value.option_number+'" class="selected_option ml-3 mr-2" name="userChecked" id="'+value.id+'">'+
                                '</div>'+
                                '<label class="mt-2 mb-0" for="'+value.id+'">'+value.answer+'</label><br>'+
                            '</div>';
                        }
                        else{
                            temp += '<div class="alert alert-danger pt-1 pb-0 d-flex">'+
                                '<div class="btn-group">'+
                                    '<label class="btn btn-light font-weight-bold" for="'+value.id+'">'+value.option_number+'</label>'+
                                    '<input type="radio" checked="checked" disabled accesskey="'+value.option_number+'" class="selected_option ml-3 mr-2" name="userChecked" id="'+value.id+'">'+
                                '</div>'+
                                '<label class="mt-2 mb-0" for="'+value.id+'">'+value.answer+'</label><br>'+
                            '</div>';
                        }
                    }
                    else{
                        if(value.is_correct == 1){
                            correct_option = value.option_number;
                            temp += '<div class="alert alert-success pt-1 pb-0 d-flex">'+
                                '<div class="btn-group">'+
                                    '<label class="btn btn-light font-weight-bold" for="'+value.id+'">'+value.option_number+'</label>'+
                                    '<input type="radio" disabled accesskey="'+value.option_number+'" class="selected_option ml-3 mr-2" name="userChecked" id="'+value.id+'">'+
                                '</div>'+
                                '<label class="mt-2 mb-0" for="'+value.id+'">'+value.answer+'</label><br>'+
                            '</div>';
                        }
                        else{
                            temp += '<div class="alert pt-1 pb-0 d-flex">'+
                                '<div class="btn-group">'+
                                    '<label class="btn btn-light font-weight-bold" for="'+value.id+'">'+value.option_number+'</label>'+
                                    '<input type="radio" disabled accesskey="'+value.option_number+'" class="selected_option ml-3 mr-2" name="userChecked" id="'+value.id+'">'+
                                '</div>'+
                                '<label class="mt-2 mb-0" for="'+value.id+'">'+value.answer+'</label><br>'+
                            '</div>';
                        }
                    }
                }
            });
            $('#options').html(temp);
            correct_option = "Correct Option : " + correct_option;
            $('#correct_option').html(correct_option);
            $('#explain').text(data.explanation);
        }
    })
</script>