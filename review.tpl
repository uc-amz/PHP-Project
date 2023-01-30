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

    <title>Review Question | uCertify</title>
    <style>
        p{
            margin-bottom: 0;
        }
    </style>
</head>
<body >
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
        <div id="question_content" class="card mt-5">
            <div class="card-header bg-info text-white">
                <p class="d-block question" id="{$question.content_id}">{$question.question}</p>
            </div>
            <div class="d-block card-body text-justify" id="options">
                {foreach $question.options as $option}
                    {if $question.attempted == "Not Attempted" and $option.is_correct}
                        {assign var="correct_option" value=$option.option_number}
                        <div class="alert alert-success pt-1 pb-0 d-flex">
                            <div class="btn-group">
                                <label class="btn btn-light font-weight-bold" for="{$option.id}">{$option.option_number}</label>
                                <input type="radio" disabled accesskey="{$option.option_number}" class="selected_option ml-3 mr-2" name="userChecked" id="{$option.id}">
                            </div>
                            <label class="mt-2 mb-0" for="{$option.id}">{$option.answer}</label><br>
                        </div>
                    {else}
                        {if $question.attempted eq $option.id}
                            {if $option.is_correct}
                                {assign var="correct_option" value=$option.option_number}
                                <div class="alert alert-success pt-1 pb-0 d-flex">
                                    <div class="btn-group">
                                        <label class="btn btn-light font-weight-bold" for="{$option.id}">{$option.option_number}</label>
                                        <input type="radio" checked="checked" disabled accesskey="{$option.option_number}" class="selected_option ml-3 mr-2" name="userChecked" id="{$option.id}">
                                    </div>
                                    <label class="mt-2 mb-0" for="{$option.id}">{$option.answer}</label><br>
                                </div>
                            {else}
                                <div class="alert alert-danger pt-1 pb-0 d-flex">
                                    <div class="btn-group">
                                        <label class="btn btn-light font-weight-bold" for="{$option.id}">{$option.option_number}</label>
                                        <input type="radio" checked="checked" disabled accesskey="{$option.option_number}" class="selected_option ml-3 mr-2" name="userChecked" id="{$option.id}">
                                    </div>
                                    <label class="mt-2 mb-0" for="{$option.id}">{$option.answer}</label><br>
                                </div>
                            {/if}
                        {else}
                            {if $option.is_correct}
                                {assign var="correct_option" value=$option.option_number}
                                <div class="alert alert-success pt-1 pb-0 d-flex">
                                    <div class="btn-group">
                                        <label class="btn btn-light font-weight-bold" for="{$option.id}">{$option.option_number}</label>
                                        <input type="radio" disabled accesskey="{$option.option_number}" class="selected_option ml-3 mr-2" name="userChecked" id="{$option.id}">
                                    </div>
                                    <label class="mt-2 mb-0" for="{$option.id}">{$option.answer}</label><br>
                                </div>
                            {else}
                                <div class="alert pt-1 pb-0 d-flex">
                                    <div class="btn-group">
                                        <label class="btn btn-light font-weight-bold" for="{$option.id}">{$option.option_number}</label>
                                        <input type="radio" disabled accesskey="{$option.option_number}" class="selected_option ml-3 mr-2" name="userChecked" id="{$option.id}">
                                    </div>
                                    <label class="mt-2 mb-0" for="{$option.id}">{$option.answer}</label><br>
                                </div>
                            {/if}
                        {/if}
                    {/if}
                {/foreach}
            </div>
        </div>

        <div class="alert text-white font-weight-bold w-25 text-center mt-3 bg-info" id="correct_option">
            Correct Option : {$correct_option}
        </div>

        <div class="alert alert-info mt-2" style="margin-bottom: 80px;">
            <strong>Explaination: </strong>
            <p id="explain">{$question.explanation}</p>
        </div>
        <div class="d-flex bg-light card-footer bg-dark text-white align-items-center justify-content-center fixed-bottom mb-1">
            <button class="btn btn-secondary mx-2" id="dashboardBtn">Dashboard</button>
            <button class="btn btn-secondary mx-2" id="prevBtn">Previous</button>
            <p><span id="current_num">{$question.number}</span> of <span id="total_num">{$total}</span></p>
            <button class="btn btn-secondary mx-2" id="nextBtn">Next</button>
            <button class="btn btn-secondary mx-2" id="resultBtn">Result</button>
        </div>
    </div>
</body>
</html>