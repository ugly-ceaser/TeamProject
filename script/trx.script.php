<?php
include_once "db.script.php";

    function deposit($id,$amount,$user){
        global $conn;

        $id = clean_input($id);
        $amount = clean_input($amount);

        $sql = "INSERT INTO `transactions`( `user_id`, `trx_type`, `trx_id`, `amount`) VALUES ($user,'deposit','$id','$amount')";
        $result = $conn->query($sql);

        if ($result) {
            message('success','Transaction Was Successful ✔', ' ');
        }else {
            message('warning','Transaction Failed 🙇🏼‍♂️', ' ');
        }
    }

    function withdraw($id,$amount,$user){
        global $conn;

        $id = clean_input($id);
        $amount = clean_input($amount);

        $sql = "INSERT INTO `transactions`( `user_id`, `trx_type`, `trx_id`, `amount`) VALUES ($user,'withdraw','$id','$amount')";
        $result = $conn->query($sql);

        if ($result) {
            message('success','Transaction Was Successful ✔', ' ');
        }else {
            message('warning','Transaction Failed 🙇🏼‍♂️', ' ');
        }
    }