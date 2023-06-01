<?php
include_once 'db.script.php';
include_once 'trx.script.php';


function filter_mail($input){
    return filter_var( $input, FILTER_SANITIZE_EMAIL );
}



function register($name,$email,$pwd,$cpwd){

    global $conn;
    $name = clean_input($name);
    $pwd = clean_input($pwd);
    $cpwd = clean_input($cpwd);
    $email = filter_mail($email);
    $pswd = enc_decrypt($pwd);

    if($pwd == $cpwd){
        $sql = "INSERT INTO `user`(`username`, `user_email`, `user_password`) 
    VALUES ('$name','$email','$pswd')";
    $execute = $conn->query($sql);
    if ($execute) {        
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $sql = "SELECT * FROM `user` WHERE `username` = '$name'";
        $result = $conn->query($sql);
        foreach ($result as $key) 
        $id = $key['id'];
        $_SESSION['id'] = $id;
        header('Location:dashboard');
    }else{
        $mesage ="Registeration failed";
    }
    }else {
        message('warning','Passswords do no match, confirm password','reg');
    }
    
}

function login($userid,$pwd){
    global $conn;
    $pwd = clean_input($pwd);
    $userid = filter_mail($userid);

    $sql = "SELECT * FROM `user` WHERE `user_email` = '$userid'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0){
        foreach ($result as $key) {   
            // $pswd = $key['user_password'];
            $pswd = enc_decrypt($key['user_password'],'decrypt');
            if ($pswd == $pwd) {
                $_SESSION['name'] = $key['username'];
                $_SESSION['email'] = $key['user_email'];
                $_SESSION['pwd'] = $pwd;
                $id = $key['id'];
                $_SESSION['id'] = $id;
        
                message('success',"Welcome " . $key['username'],'dashboard');
            }else {
                message('warning','Invalid password','auth');
            }
        }
    }else {
        message("warning","user not found Please confirm your password and name","auth");
    }
   
  }
  function updateProfile($username,$image,$firstname,$lastname){
    global $conn;
    $id = $_SESSION['id'];
    $username = clean_input($username);
    $firstname = clean_input($firstname);
    $lastname = clean_input($lastname);

    // Get the current user information from the database
    $sql = "SELECT `user_image` FROM `user` WHERE `id`='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $old_userimage = $row['user_image'];

    if (empty($image['name'])) {
        $sql = "UPDATE `user` SET `username`='$username', `firstname` = '$firstname', `lastname` = '$lastname' WHERE `id` = '$id'";
        $result = $conn->query($sql);
    } else {
        $image_type = array('image/jpg', 'image/jpeg','image/png');
        $ext = explode("/",$image['type']);
        $userimage =  $id . "_" . time() . "." . $ext[1];

        if (in_array($image['type'],$image_type)) {
            $user_image_temp = $image['tmp_name'];

            // Delete the old image if it exists
            if (!empty($old_userimage) && $old_userimage != "iimg (90).jpg") {
                $old_image_path = "./img/$old_userimage";
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }

            move_uploaded_file($user_image_temp, "./img/$userimage");
            $sql = "UPDATE `user` SET `username`='$username',`user_image`='$userimage',`firstname` = '$firstname', `lastname` = '$lastname' WHERE `id` = '$id'";
            $result = $conn->query($sql);
        } else {
            message('warning','file must be of type (jpg/jpeg/png)','');
            return NULL;
        }
    }

    if ($result) {
        message('success','Profile updated Successfully','profile');
        return $result;
    } else {
        return NULL;
    }
}

function updatePassword($old,$new,$confirm){
    global $conn;
    $id = $_SESSION['id'];
    $old = clean_input($old);
    $new = clean_input($new);
    $confirm = clean_input($confirm);

    $sql = "SELECT `user_password` FROM `user` WHERE `id`='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $dbpass = enc_decrypt($row['user_password'],'decrypt');

    if ($old == $dbpass) {
        if ($new == $confirm) {
            $new = enc_decrypt($new);
            $sql = "UPDATE `user` SET `user_password`='$new' WHERE `id` = '$id'";
            $result = $conn->query($sql);

            if ($result) {
                message('success','Password Updated Sucessfully','profile');
            }else{
                message('danger','Failed','');
            }
        }else {
            message('warning','Please confirm new password','profile');
        }
    }else {
        message('danger','The old password does not match the password in the database','profile');
    }
}

function logout(){
  

    $_SESSION['userid'] = NULL;
    $_SESSION['name'] = NULL;
    $_SESSION['email'] = NULL;
    $_SESSION['pwd'] = NULL;
    session_destroy();
    header('Location: ./');
}
?>
<script>
    function alerter(name){
        let linked = name;
        document.querySelector('.alert').style.display="none";
        if (linked == 'dashboard') {
            window.location.href = 'http://localhost/TeamProject/dashboard';
            window.location.href = 'http://localhost/TeamProject/dashboard';
        }else if(linked == 'home'){
            window.location.href = 'http://localhost/TeamProject/';
        }else if (linked == ' '){
            window.location.href = '';
        }else if (linked == ' '){
            window.location.href = '';
        }else{
            window.location.href = `http://localhost/TeamProject/${linked}`;
        }
        
    }
    </script>
