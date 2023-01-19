<?php
header("Content-Type: application/json");

require_once "./process.php";

$data = json_decode(file_get_contents("php://input"), true);

// This is for getting first question.
if(isset($data['key']) && $data['key'] == "first_question"){
    $question = json_encode(first_question());
    echo $question;
}

// This is for getting next question from current question.
if(isset($data['key']) && $data['key'] == "next_question"){
    $response = json_encode(next_question($data['current_id']));
    echo $response;
}

// This is for getting previous question from current question.
if(isset($data['key']) && $data['key'] == "prev_question"){
    $response = json_encode(prev_question($data['current_id']));
    echo $response;
}

// This is for getting selected question.
if(isset($data['key']) && $data['key'] == "selected_question"){
    $response = json_encode(selected_question($data['content_id'], "api"));
    echo $response;
}

// This is for answer change.
if(isset($data['key']) && $data['key'] == "answer_changed"){
    session_start();
    $_SESSION['attempted'][$data['content_id']] = $data['answer_id'];
    $response = array(
        "message" => "list-group-item bg-success text-white",
        "status" => "success"
    );
    $response = json_encode($response);
    echo $response;
}

// This is for end test
if(isset($data['key']) && $data['key'] == "end_test"){
    $response = json_encode(end_test("api"));
    echo $response;
}