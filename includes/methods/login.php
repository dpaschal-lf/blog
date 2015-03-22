<?php
    //start a session
    session_start();
    //connect to our mysql database
    //$conn = mysqli_connect('localhost','root','','lf_db');
    require_once('../mysql_connect.php');
    //get username and password values from our login form, and put them in easier-to-use variables
    //$username = ?
    //$password = ?
    if(isset($_POST['login_name']) && isset($_POST['login_pass'])){

        $email = addslashes($_POST['login_name']);
        $password = sha1($_POST['login_pass']);

        //convert our password into a hashed password, using the function "sha1": $password


        //construct an SQL statement, $query, that selects the record with both our username and hashed password, $username and $password. The table is "users" 
        $query = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
        //execute $query, and receive the results in $results
        $result = mysqli_query($CONN,$query);
        //if a row was returned, the user is validated. 
        if(mysqli_num_rows($result)>0)
        {
        //if the user was validated, fetch the user's data into $user_info variable
            $user_info = mysqli_fetch_assoc($result);
        //put the user's data into a key/value pair in the session superglobal.  Use key 'userinfo' in the session superglobal
            $user_info['avatar'] = ($user_info['avatar']=='' ? 'images/538474-user_512x512.png' : $_user_info['avatar']);
            $user_info['greeting'] = "Hello, $user_info[display_name]";
            $_SESSION['userinfo'] = $user_info;
            $output = ['success'=>true, 
                       'message'=>'Successfully logged in',
                       'avatar' => $_SESSION['userinfo']['avatar'],
                        'greeting' => $_SESSION['userinfo']['greeting']
            ];
            //echo "login was successful, welcome ". $_SESSION['userinfo']['display_name'];
            //print_r($_SESSION);
        }
        //else the user wasn't validated
        else
        {
            $output = ['success'=>false, 
                       'message'=>'Incorrect username or password',
            ];
        //inform the user that their username/password was incorrect
        //end of file.  output any results here.
        }
    }
    else{
        $output = ['success'=>false, 
           'message'=>'Please enter an email and password',
        ];
    }
    echo json_encode($output);
?>

















