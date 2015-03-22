<?php
    function require_user($output_error_and_terminate= true)
    {
        $error = [];
        $error_message=null;
        if(!isset($_SESSION) || !isset($_SESSION['user']) || !isset($_SESSION['user']['ID']))
        {
            $error_message='Must be logged in';
            $output=['success'=>false, 'error'=>$error_message, 'must_login'=>true];
            $output=['success'=>false, 'error'=>$error_message, 'must_login'=>true];
            if($output_error_and_terminate){  
                echo json_encode($output);
                exit();
            }
            else{
                return $output;
            }
        }

    }
    function is_loggedin()
    {
        if(!isset($_SESSION) || !isset($_SESSION['userinfo']) || !isset($_SESSION['userinfo']['ID']))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
?>