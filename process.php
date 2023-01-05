<?php
if(isset($_POST['key']) && isset($_POST['content_id']) && isset($_POST['answer_id']) && $_POST['key'] == "answer_changed"){
    extract($_POST);
    session_start();
    $_SESSION['attempted'][$content_id] = $answer_id;
}

if(isset($_POST['key']) && isset($_POST['content_id']) && $_POST['key'] == "explain"){
    extract($_POST);

    $data = file_get_contents("question.json");
    $data = json_decode($data, true);
    $response = '';
    foreach($data as $row){
        if($content_id == $row['content_id']){
            $content = $row['content_text'];
            $content = json_decode($content, true);
            $response = $content['explanation'];
        }
    }
    echo $response;
}
if(isset($_POST['key']) && isset($_POST['content_id']) && $_POST['key'] == "prev_explain"){
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

    $response = '';
    foreach($data as $row){
        if($prev_id == $row['content_id']){
            $content = $row['content_text'];
            $content = json_decode($content, true);
            $response = $content['explanation'];
        }
    }
    echo $response;
}
if(isset($_POST['key']) && isset($_POST['content_id']) && $_POST['key'] == "next_explain"){
    extract($_POST);

    $data = file_get_contents("question.json");
    $data = json_decode($data, true);

    $found = false;
    $response = '';
    foreach($data as $row){
        if($row['content_id'] == $content_id){
            $found = true;
            continue;
        }
        if($found){
            $content = $row['content_text'];
            $content = json_decode($content, true);
            $response = $content['explanation'];
            break;
        }
    }
    echo $response;
}

if(isset($_POST['key']) && $_POST['key'] == "end_test"){
    $data = file_get_contents("question.json");
    $data = json_decode($data, true);

    $total = 0;

    foreach($data as $row)
        $total++;

    $response = '<p>Total Question: '. $total .'</p>';

    $attempted = 0;
    session_start();
    foreach($_SESSION['attempted'] as $data){
        if($data != "Not Attempted")
            $attempted++;
    }
    $response .= '<p>Attempted Question: '. $attempted .'</p>';
    $response .= '<p>Remaining Question: '. ($total-$attempted) .'</p>';
    echo $response;
}

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
            $response = '<div class="card-header bg-info text-white">';
            $response .= '<p class="d-block" id="'.$row['content_id'].'">' . $question . '</p>';
            $response .= '</div><div class="d-block card-body ml-5">';
            $answers = json_decode($row['content_text'], true)['answers'];
            session_start();
            foreach($answers as $answer){
                if($_SESSION['attempted'][$row['content_id']] == $answer['id']){
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '" checked="checked">
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
                else{
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '">
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
            }
            $response .= '</div>';
            break;
        }
    }
    
    echo $response;

}
if(isset($_POST['key']) && isset($_POST['content_id']) && $_POST['key'] == "next_question"){
    extract($_POST);

    $data = file_get_contents("question.json");
    $data = json_decode($data, true);

    $response = "";
    $found = false;
    
    foreach($data as $row){
        if($row['content_id'] == $content_id){
            $found = true;
            continue;
        }
        if($found){
            $question = json_decode($row['content_text'], true)['question'];
            $response = '<div class="card-header bg-info text-white">';
            $response .= '<p class="d-block" id="'.$row['content_id'].'">' . $question . '</p>';
            $response .= '</div><div class="d-block card-body ml-5">';
            $answers = json_decode($row['content_text'], true)['answers'];
            session_start();
            foreach($answers as $answer){
                if($_SESSION['attempted'][$row['content_id']] == $answer['id']){
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '" checked="checked">
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
                else{
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '">
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
            }
            $response .= '</div>';
            break;
        }
    }
    
    echo $response;

}
if(isset($_POST['key']) && isset($_POST['content_id']) && $_POST['key'] == "review_prev_question"){
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
            $response = '<div class="card-header bg-info text-white">';
            $response .= '<p class="d-block" id="'.$row['content_id'].'">' . $question . '</p>';
            $response .= '</div><div class="d-block card-body ml-5">';
            $answers = json_decode($row['content_text'], true)['answers'];
            session_start();
            foreach($answers as $answer){
                if($_SESSION['attempted'][$row['content_id']] == $answer['id']){
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '" checked="checked" disabled>
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
                else{
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '" disabled>
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
            }
            $response .= '</div>';
            break;
        }
    }
    
    echo $response;

}
if(isset($_POST['key']) && isset($_POST['content_id']) && $_POST['key'] == "review_next_question"){
    extract($_POST);

    $data = file_get_contents("question.json");
    $data = json_decode($data, true);

    $response = "";
    $found = false;
    
    foreach($data as $row){
        if($row['content_id'] == $content_id){
            $found = true;
            continue;
        }
        if($found){
            $question = json_decode($row['content_text'], true)['question'];
            $response = '<div class="card-header bg-info text-white">';
            $response .= '<p class="d-block" id="'.$row['content_id'].'">' . $question . '</p>';
            $response .= '</div><div class="d-block card-body ml-5">';
            $answers = json_decode($row['content_text'], true)['answers'];
            session_start();
            foreach($answers as $answer){
                if($_SESSION['attempted'][$row['content_id']] == $answer['id']){
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '" checked="checked" disabled>
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
                else{
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '" disabled>
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
            }
            $response .= '</div>';
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
            $response = '<div class="card-header bg-info text-white">';
            $response .= '<p class="d-block" id="'.$row['content_id'].'">' . $question . '</p>';
            $response .= '</div><div class="d-block card-body ml-5">';
            $answers = json_decode($row['content_text'], true)['answers'];
            session_start();
            foreach($answers as $answer){
                if($_SESSION['attempted'][$row['content_id']] == $answer['id']){
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '" checked="checked">
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
                else{
                    $response .= '<input type="radio" name="userChecked" class="selected_option mx-2" value="' . $answer['id'] . '" id="' . $answer['id'] . '">
                    <label for="' . $answer['id'] . '">' . $answer['answer'] . '</label><br>';
                }
            }
            $response .= '</div>';
            break;
        }
    }
    
    echo $response;
}