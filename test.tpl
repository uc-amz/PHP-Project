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
<body onload="timeOut()">
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
                            {$count = 0}
                            {foreach $data as $row}
                                {$count = $count + 1}
                                {if $session[$row['content_id']] == "Not Attempted"}
                                    <a type="button" data-dismiss="modal" id="{$row['content_id']}" class="questionLink"> <li class="list-group-item"><span>Q {$count} </span>{$row['snippet']}</li></a>
                                {else}
                                    <a type="button" data-dismiss="modal" id="{$row['content_id']}" class="questionLink"> <li class="list-group-item"><span>Q {$count} </span>{$row['snippet']}</li></a>
                                {/if}
                            {/foreach}
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Side Panel End -->

        <!-- Modal for End Test -->
        <div class="modal fade" id="endTest">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <strong>Are you sure want to end test</strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body" id="end_test_body">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" class="close" data-dismiss="modal">No</button>
                        <button class="btn btn-danger" id="yesBtn" type="button" class="close" data-dismiss="modal">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="question_content" class="card mt-5">
            <div class="card-header bg-info text-white">
                <p class="d-block" id="{$data[0]['content_id']}">{$data[0]['snippet']}</p>
            </div>
            <div class="d-block card-body ml-5">
                {assign var="row" value=json_decode($data.0.content_text, true)}
                {assign var="row" value=$row.answers}

                {foreach $row as $line}
                        <input type="radio" class="selected_option ml-3 mr-2" name="userChecked" value="{$line['id']}" id="{$line['id']}">
                        <label for="{$line['id']}">{$line['answer']}</label><br>
                {/foreach}
            </div>
        </div>

        <div class="d-flex bg-dark card-footer justify-content-center text-white">
            <p id="timer"></p>
            <button class="btn btn-secondary mx-2" type="button" data-target="#list" data-toggle="modal">List</button>
            <button class="btn btn-secondary mx-2" id="prevBtn">Previous</button>
            <p><span id="current_num">1</span> of <span id="total_num"></span></p>
            <button class="btn btn-secondary mx-2" id="nextBtn">Next</button>
            <button class="btn btn-secondary mx-2" id="endBtn" data-toggle="modal" data-target="#endTest">End Test</button>
        </div>
    </div>
</body>
</html>