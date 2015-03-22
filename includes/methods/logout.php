<?php
session_start();
$result = session_destroy();
unset($_SESSION['userinfo']);
if($result){
    $output = ['success'=>true, 
               'message'=>'Successfully logged out',
               'avatar' => 'images/538474-user_512x512.png',
                'greeting' => 'Greetings, Anonymous user'
    ];
}
else{
    $output = ['success'=>false, 
               'message'=>'Logout failed, please try again'
    ];        
}
echo json_encode($output);
?>