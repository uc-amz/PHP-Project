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
    <div class="container row my-5 justify-content-center">
        <div class="card ml-5 w-50">
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
                    {$index = 1}
                    
                    {foreach $data as $row}
                        <tr>
                            <td>{$index}</td>
                            <td><a href="review.php?content_id={$row.content_id}&current_num={$index}" class="question_link" id="{$row.content_id}">{$row.snippet}</a></td>
                            <td>
                                {$result = "Not Attempted"}
                                {assign var='content' value=json_decode($row.content_text, true)}
                                {$opt_num = 1}
                                {$opt_value = "A"}
                                {foreach $content.answers as $option}
                                    {if $opt_num eq 1}
                                        {$opt_value = "A"}
                                    {elseif $opt_num eq 2}
                                        {$opt_value = "B"}
                                    {elseif $opt_num eq 3}
                                        {$opt_value = "C"}
                                    {elseif $opt_num eq 4}
                                        {$opt_value = "D"}
                                    {/if}
                                    {$color = "secondary"}
                                    {$flag = false}
                                    {if $session[$row['content_id']] eq $option['id']}
                                        {if $option['is_correct'] eq 1}
                                            {$result = "Correct"}
                                            {$flag = true}
                                            <div class="d-inline-block alert alert-success">{$opt_value}</div>
                                        {else}
                                            {$result = "Incorrect"}
                                            {$flag = true}
                                            <div class="d-inline-block alert alert-danger">{$opt_value}</div>
                                        {/if}
                                    {/if}
                                    {if $option['is_correct'] eq 1 && (not $flag)}
                                        <div class="d-inline-block alert alert-success">{$opt_value}</div>
                                    {elseif (not $flag)}
                                        <div class="d-inline-block alert alert-secondary">{$opt_value}</div>
                                    {/if}
                                    {$opt_num = $opt_num + 1}
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
                        {$index = $index+1}
                    {/foreach}
            </tbody>
        </table>
    </div>
</body>
</html>