<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link href="https://staging.appcropolis.com/functions/preview/appcropolis/amk-source/main.css" rel="stylesheet">

    <title>PHP Project | Dashboard</title>
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
    
    <div class="container">
        <!-- Modal for side panel -->
        <div class="amk modal fade left from-left delay-200 modal-example-sidebar-left" id="list" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">All Questions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <?php
                                $data = file_get_contents("question.json");
                                $data = json_decode($data, true);
                                $count = 0;
                                foreach($data as $row){
                                    $count++;
                                    echo '<a type="button" data-dismiss="modal" id="'.$row['content_id'].'" class="questionLink"> <li class="list-group-item"><span>Q '. $count .'. </span>'.$row['snippet'].'</li></a>';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- Modal Side Panel End -->

        <div class="row mt-5">
            <div class="col">
                <div class="row" id="question_content">
                    <div class="row">
                        <p class="d-block" id="selectedQuestion"><?php echo $data[0]['snippet'] ?></p>
                    </div>
                    <div class="row">
                        <?php
                        $row = json_decode($data[0]['content_text'], true)['answers'];

                        foreach($row as $line): ?>
                                <input type="radio" class="selected_option ml-3 mr-2" name="userChecked" value="<?php echo $line['id'] ?>" id="<?php echo $line['id'] ?>">
                                <label for="<?php echo $line['id'] ?>"><?php echo $line['answer'] ?></label><br>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="row bg-light">
                    <p>1:20</p>
                    <button class="btn btn-secondary mx-2" type="button" data-target="#list" data-toggle="modal">List</button>
                    <button class="btn btn-secondary mx-2" id="prevBtn">Previous</button>
                    <p><span id="current_num">1</span> of <span id="total_num">10</span></p>
                    <button class="btn btn-secondary mx-2" id="nextBtn">Next</button>
                    <button class="btn btn-secondary mx-2">End Test</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var currentQuestion = [];
        var content_id = "<?php echo $data[0]['content_id'] ?>";
        var current_num = 1;

        $(document).ready(function(){
            getTotalQuestion();
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

            $('#prevBtn').click(function(){
                if(current_num > 1){
                    console.log("entered");
                    $.ajax({
                        url:"process.php",
                        type:"POST",
                        data:{
                            key:"prev_question",
                            content_id:content_id
                        },
                        success:function(data, status){
                            console.log(data)
                            $('#question_content').html(data.content);
                            current_num = callerObj.find('span').text().match(/\d+/)[0];
                            $('#current_num').text(current_num);
                            content_id = data.content_id;
                        }
                    })
                }
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
                        $('#total_num').text(data);
                    }
                }
            })
        }
    </script>
</body>
</html>