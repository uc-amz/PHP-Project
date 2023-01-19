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
    <title>Test Result</title>
    <style>
        p{
            margin-bottom: 0;
        }
    </style>
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
    <div class="container my-5 justify-content-center">
        <div class="card m-auto w-50">
            <div class="card-header bg-info text-white text-center">
                <h5>Result</h5>
            </div>
            
            <div class="card-body text-center">
                <div class="alert alert-warning">Total Question: {$total}</div>
                <div>Attempted Question: {$attempted}</div>
                <div>Remaining Question: {$total-$attempted}</div>
                <div>Correct Answer: {$correct}</div>
                <div>Incorrect Answer: {$attempted-$correct}</div>
                <div class="alert alert-info mt-2">Result: {$correct}/{$total}</div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-secondary" id="dashboardBtn">Go To Dashboard</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header text-center"><h5>All Questions</h5></div>
        <table class="table table-hover w-auto">
            <thead>
                <tr class="text-center">
                    <th>Index</th>
                    <th>Question</th>
                    <th>Options</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                    {foreach $data as $row}
                        {assign var="question" value=selected_question($row['content_id'], "file")}
                        <tr>
                            <td>{$question.number}</td>
                            <td><a href="review.php?content_id={$question.content_id}" class="question_link" id="{$question.content_id}">{$question.question}</a></td>
                            <td>
                                {assign var="result" value = "Not Attempted"}
                                {foreach $question.options as $option}
                                    {assign var="color" value = "secondary"}
                                    {assign var="flag" value = false}
                                    {if $session[$question.content_id] eq $option.id}
                                        {assign var="flag" value = true}
                                        {if $option.is_correct eq 1}
                                            {assign var="result" value = "Correct"}
                                            <div class="d-inline-block alert alert-success">{$option.option_number}</div>
                                        {else}
                                            {assign var="result" value = "Incorrect"}
                                            <div class="d-inline-block alert alert-danger">{$option.option_number}</div>
                                        {/if}
                                    {/if}
                                    {if $option.is_correct eq 1 && (not $flag)}
                                        <div class="d-inline-block alert alert-success">{$option.option_number}</div>
                                    {elseif (not $flag)}
                                        <div class="d-inline-block alert alert-secondary">{$option.option_number}</div>
                                    {/if}
                                {/foreach}
                            </td>
                            <td>
                                {if $result eq "Correct"}
                                    <div class="alert alert-success">{$result}</div>
                                {elseif $result eq "Incorrect"}
                                    <div class="alert alert-danger">{$result}</div>
                                {else}
                                    <div class="alert alert-secondary">{$result}</div>
                                {/if}
                            </td>
                        </tr>
                    {/foreach}
            </tbody>
        </table>
    </div>
</body>
</html>