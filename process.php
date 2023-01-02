<?php

if(isset($_POST['key']) && $_POST['key'] == "total_question"){
    $data = file_get_contents("question.json");
    $data = json_decode($data, true);

    $count = 0;

    foreach($data as $row)
        $count++;

    echo $count;
}

if(isset($_POST['key']) && isset($_POST['content_id']) && $_POST['key'] == "prev_question"){
    extract($_POST);

    $data = file_get_contents("question.json");
    $data = json_decode($data, true);

    $prev_id = "";
    foreach($data as $row){
        if($row['content_id'] != $content_id)
            $prev_id = $row['content_id'];
        else
            break;
    }

    $response = "";
    
    foreach($data as $row){
        if($row['content_id'] == $prev_id){
            $question = json_decode($row['content_text'], true)['question'];
            $response = '{"content_id":"'. $row['content_id'] .'","content":\'<div class="row">';
            $response .= '<p class="d-block" id="selectedQuestion">' . $question . '</p>';
            $response .= '</div><div class="row">';
            $answers = json_decode($row['content_text'], true)['answers'];
            foreach($answers as $answer){
                $response .= '<input type="radio" name="userChecked" class="answerRadio mx-2 d-block" value="' . $answer['id'] . '" id="' . $answer['id'] . '">
                <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label>';
            }
            $response .= '</div>\'}';
            break;
        }
    }
    
    echo $response;

}

if(isset($_POST['id'])){
    $id = $_POST['id'];
    
    $data = file_get_contents("question.json");
    $data = json_decode($data, true);
    
    $response = "";
    
    foreach($data as $row){
        if($row['content_id'] == $id){
            $question = json_decode($row['content_text'], true)['question'];
            $response = '<div class="row">';
            $response .= '<p class="d-block" id="selectedQuestion">' . $question . '</p>';
            $response .= '</div><div class="row">';
            $answers = json_decode($row['content_text'], true)['answers'];
            foreach($answers as $answer){
                $response .= '<input type="radio" name="userChecked" class="answerRadio mx-2 d-block" value="' . $answer['id'] . '" id="' . $answer['id'] . '">
                <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label>';
            }
            $response .= '</div>';
            break;
        }
    }
    
    echo $response;
}