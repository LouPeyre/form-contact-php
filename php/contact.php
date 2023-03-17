<?php
    $array = array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "", "firstnameError" => "", "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "isSucces" => false);
    $emailTo = "louis.peyredieu@gmail.com";

    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $array["firstname"] = verifyInput($_POST["firstname"]);
        $array["name"] = verifyInput($_POST["name"]);
        $array["email"] = verifyInput($_POST["email"]);
        $array["phone"] = verifyInput($_POST["phone"]);
        $array["message"] = verifyInput($_POST["message"]);
        $array["isSucces"] = true;
        $emailText = "";

        if(empty($array["firstname"])){
            $array["firstnameError"] = "Je veux connaitre ton prénom";
            $array["isSucces"] = false;
        }
        else{
            $emailText .= "Firstname : {$array["firstname"]}\n";
        }
        if(empty($array["name"])){
            $array["nameError"] = "Je veux connaitre ton nom";
            $array["isSucces"] = false;
        }
        else{
            $emailText .= "Name : {$array["name"]}\n";
        }
        if(!isEmail($array["email"])){
            $array["emailError"] = "J'aimerais votre Email";
            $array["isSucces"] = false;
        }
        else{
            $emailText .= "Email : {$array["email"]}l\n";
        }
        if(!isPhone($array["phone"])){
            $array["phoneError"] = "Que des chiffres et espaces svp";
            $array["isSucces"] = false;
        }
        else{
            $emailText .= "Phone : {$array["phone"]}\n";
        }
        if(empty($array["message"])){
            $array["massageError"] = "Que veux-tu me dire ?";
            $array["isSucces"] = false;
        }
        else{
            $emailText .= "Message : {$array["message"]}\n";
        }
        if($array["isSucces"]){
            $headers = "From : {$array["firstname"]} {$array["name"]} <{$array["email"]}> \r\n Reply-To: {$array["email"]}";
            mail($emailTo, "un message de votre site", $emailText, $headers);
        }

        echo json_encode($array);
    }

    function isPhone($var){
        return preg_match("/^[0-9 ]*$/", $var);
    }

    function isEmail($var){
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var){
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);

        return $var;
    }

?>