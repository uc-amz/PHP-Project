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
                {foreach $data as $row}
                    {if $row.content_id eq $content_id}
                        <p class="d-block" id="{$content_id}">{$row.snippet}</p>
                    {/if}
                {/foreach}
            </div>
            <div class="d-block card-body ml-5">
                {foreach $data as $row}
                    {if $row.content_id eq $content_id}
                        {$content = json_decode($row.content_text, true)}
                        {$content = $content.answers}
                        {foreach $content as $option}
                            {if $session[$row['content_id']] neq "Not Attempted" and $session[$row['content_id']] eq $option['id']}
                                <input type="radio" class="ml-3 mr-2" checked="checked" disabled id="{$option['id']}">
                                <label for="{$option['id']}">{$option['answer']}</label><br>
                            {else}
                                <input type="radio" class="ml-3 mr-2" disabled id="{$option['id']}">
                                <label for="{$option['id']}">{$option['answer']}</label><br>
                            {/if}
                        {/foreach}
                        {break}
                    {/if}
                {/foreach}
            </div>
        </div>
        <div class="alert alert-info mt-5 mb-5">
            <strong>Explaination: </strong>
            <p id="explain"></p>
        </div>
        <div class="d-flex bg-light card-footer bg-dark text-white justify-content-center fixed-bottom mb-1">
            <button class="btn btn-secondary mx-2" id="dashboardBtn">Dashboard</button>
            <button class="btn btn-secondary mx-2" id="prevBtn">Previous</button>
            <p><span id="current_num">1</span> of <span id="total_num"></span></p>
            <button class="btn btn-secondary mx-2" id="nextBtn">Next</button>
            <button class="btn btn-secondary mx-2" id="resultBtn">Result</button>
        </div>
    </div>
</body>
</html>