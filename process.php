<?php

function first_question(){
    $file_data = file_get_contents("question.json");
    $file_data = json_decode($file_data, true);

    $response['content_id'] = $file_data[0]['content_id'];
    $response['number'] = 1;
    $temp = $file_data[0]['content_text'];
    $temp = json_decode($temp);
    $response['question'] = json_decode(json_encode($temp), true)['question'];
    $temp = $file_data[0]['content_text'];
    $temp = json_decode($temp);
    $option_temp = json_decode(json_encode($temp), true)['answers'];
    $num = 'A';
    $options = [];
    foreach ($option_temp as $option) {
        $option["option_number"] =  $num;
        $options[] = $option;
        $num++;
    }
    $explaination = json_decode(json_encode($temp), true)['explanation'];
    $response['options'] = $options;
    $response['explanation'] = $explaination;

    return $response;
}

function next_question($current_id){
    $file_data = file_get_contents("question.json");
    $file_data = json_decode($file_data, true);

    $flag = false;
    $count = 0;
    foreach($file_data as $row){
        $count++;
        if($flag){
            $response['content_id'] = $row['content_id'];
            $response['number'] = $count;
            session_start();
            $response['attempted'] = $_SESSION['attempted'][$row['content_id']];
            $temp = $row['content_text'];
            $temp = json_decode($temp);
            $response['question'] = json_decode(json_encode($temp), true)['question'];
            $temp = $row['content_text'];
            $temp = json_decode($temp);
            $option_temp = json_decode(json_encode($temp), true)['answers'];
            $num = 'A';
            $options = [];
            foreach($option_temp as $option){
                $option["option_number"] =  $num;
                $options[] = $option;
                $num++;
            }
            $explaination = json_decode(json_encode($temp), true)['explanation'];
            $response['options'] = $options;
            $response['explanation'] = $explaination;

            return $response;
        }
        if($row['content_id'] == $current_id){
            $flag = true;
            continue;
        }
    }
}

function prev_question($current_id){
    $file_data = file_get_contents("question.json");
    $file_data = json_decode($file_data, true);

    foreach($file_data as $row){
        if($row['content_id'] == $current_id){
            break;
        }
        $prev_id = $row['content_id'];
    }
    $count = 0;
    foreach($file_data as $row){
        $count++;
        if($row['content_id'] == $prev_id){
            $response['content_id'] = $row['content_id'];
            $response['number'] = $count;
            session_start();
            $response['attempted'] = $_SESSION['attempted'][$row['content_id']];
            $temp = $row['content_text'];
            $temp = json_decode($temp);
            $response['question'] = json_decode(json_encode($temp), true)['question'];
            $temp = $row['content_text'];
            $temp = json_decode($temp);
            $option_temp = json_decode(json_encode($temp), true)['answers'];
            $num = 'A';
            $options = [];
            foreach($option_temp as $option){
                $option["option_number"] =  $num;
                $options[] = $option;
                $num++;
            }
            $explaination = json_decode(json_encode($temp), true)['explanation'];
            $response['options'] = $options;
            $response['explanation'] = $explaination;

            return $response;
        }
    }
}

function selected_question($content_id, $from){
    $file_data = file_get_contents("question.json");
    $file_data = json_decode($file_data, true);
    $count = 0;
    foreach($file_data as $row){
        $count++;
        if($row['content_id'] == $content_id){
            $response['content_id'] = $row['content_id'];
            $response['number'] = $count;
            if($from == "api"){
                session_start();
                $temp = $row['content_text'];
                $temp = json_decode($temp);
                $response['question'] = json_decode(json_encode($temp), true)['question'];
            }
            else if($from == "review"){
                $temp = $row['content_text'];
                $temp = json_decode($temp);
                $response['question'] = json_decode(json_encode($temp), true)['question'];
            }
            else
                $response['question'] = $row['snippet'];
            $response['attempted'] = $_SESSION['attempted'][$row['content_id']];
            $temp = $row['content_text'];
            $temp = json_decode($temp);
            $option_temp = json_decode(json_encode($temp), true)['answers'];
            $num = 'A';
            $options = [];
            foreach($option_temp as $option){
                $option["option_number"] =  $num;
                $option['id'] = $option['id'];
                $option['is_correct'] = $option['is_correct'];
                $options[] = $option;
                $num++;
            }
            $explaination = json_decode(json_encode($temp), true)['explanation'];
            $response['options'] = $options;
            $response['explanation'] = $explaination;

            return $response;
        }
    }
}

function total_question(){
    $file_data = file_get_contents("question.json");
    $file_data = json_decode($file_data, true);
    $count = 0;
    foreach($file_data as $row){
        $count++;
    }
    return $count;
}

function all_question(){
    $file_data = file_get_contents("question.json");
    $file_data = json_decode($file_data, true);
    $count = 1;
    $question = array();
    foreach($file_data as $row){
        $question[] = array("number" => $count, "content_id" => $row['content_id'], "question" => $row['snippet']);
        $count++;
    }
    return $question;
}

function end_test($from){
    $attempted = 0;
    if($from == "api")
        session_start();
    foreach($_SESSION['attempted'] as $row){
        if($row != "Not Attempted")
            $attempted++;
    }

    $response = array(
        "total" => total_question(),
        "attempted" => $attempted,
        "remaining" => total_question()-$attempted
    );
    
    return $response;
}

function total_correct(){
    $file_data = file_get_contents("question.json");
    $file_data = json_decode($file_data, true);

    $correct = 0;
    foreach($file_data as $row){
        $content = json_decode($row['content_text'], true);
        foreach($content['answers'] as $option){
            if($_SESSION['attempted'][$row['content_id']] == $option['id'] && $option['is_correct'] == 1)
                $correct++;
        }
    }
    return $correct;
}