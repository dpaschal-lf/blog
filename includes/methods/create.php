<?php
    session_start();
    require_user();
    print_r($_POST);
    $error = [];
    if(!isset($_POST)){
        $error['general']='No data submitted';
    }
    $validation = [
        'title'=>[
            'required'=>true, 
            'regex'=>/.(3,)/, 
            'error_message'=>'Title is required and must be at least 3 characters'
        ],
        'category'=>[
            'required'=>true, 
            'regex'=>/.(3,)/, 
            'error_message'=>'Title is required and must be at least 3 characters'
        ],
    ];
?>