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

    function withdraw($id,$amount,$user,$balance){
        global $conn;

        $id = clean_input($id);
        $amount = clean_input($amount);

        if($balance >= $amount){
            $sql = "INSERT INTO `transactions`( `user_id`, `trx_type`, `trx_id`, `amount`) VALUES ($user,'withdraw','$id','$amount')";
            $result = $conn->query($sql);
            message('success','Transaction Was Successful ✔', ' ');
        }else {
            message('warning','Insufficient Balance ‍♂️', ' ');
        }

    }

    function totalTrx($id,$type,$status = null){
        global $conn;
        $amt = 0;
        if($status == null){
            $sql = "SELECT `amount` FROM `transactions` WHERE `user_id` = $id AND `trx_type` = '$type'";
        }else{
            $sql = "SELECT `amount` FROM `transactions` WHERE `user_id` = $id AND `trx_type` = '$type' AND `status` = '$status'";
        }
        $result = $conn->query($sql);

        foreach($result as $key){
            extract($key);
            $amt += $amount;
        }
        return $amt;
    }