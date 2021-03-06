<?php
    require_once('config/init.php');
    require_once('database/user.php');
    require_once('database/doctor.php');
    require_once('database/nurse.php');
    require_once('database/patient.php');
    $mail_address=$_POST["email"];
    $mail_address=strval($mail_address);
    $password=$_POST["password"];

    if(strlen(strval($password))<2){
        $_SESSION["msg_log"]="Please Insert your Password!";
        header('Location: index.php#logins');
        die();
    }
    if(strlen($mail_address)==0){
        $_SESSION["msg_log"]="Please Insert your Mail Address!";
        header('Location: index.php#logins');
        die();
    }

    #verify usermail_address and after correspondent password
    function loginValid($mail_address,$password){
        if(IsthatDoctor($mail_address)){
            $table="Doctor";
            if(Validating($mail_address,$password,$table)){
                $result=IsthatDoctor($mail_address);
                $id=$result["id"];
                $_SESSION["user"]=$id;
                $_SESSION["funtion"]="Doctor";
                $_SESSION["username"]=$result["name"];
                header("Location: Doctor.php?id=$id");
            }else{
                $_SESSION["msg_log"]="Login failed! Wrong Password.";
                header('Location: index.php#logins');
                die();
            }
        }
        elseif(IsthatPatient($mail_address)){
            $table="Patient";
            if(Validating($mail_address,$password,$table)){
                $result=IsthatPatient($mail_address);
                $cc=$result["cc"];
                $_SESSION["user"]=$cc;
                $_SESSION["funtion"]="Patient";
                $_SESSION["username"]=$result["name"];

                header("Location: index_f_login.php?cc=$cc");
            }else{
                $_SESSION["msg_log"]="Login failed! Wrong Password.";
                header('Location: index.php#logins');
                die();
            }
        }
        elseif(IsthatNurse($mail_address)){
            $table="Nurse";
            if(Validating($mail_address,$password, $table)){
                $result=IsthatNurse($mail_address);
                $id=$result["id"];
                $_SESSION["user"]=$id;
                $_SESSION["funtion"]="Nurse";
                $_SESSION["username"]=$result["name"];
                
                header("Location: nurse.php?id=$id");
            }else{
                $_SESSION["msg_log"]="Login failed! Wrong Password.";
                header('Location: index.php#logins');
                die();
            }
        }
        else{
            $_SESSION["msg_log"]="Login failed! There is no such user";
            header('Location: index.php#logins');
            die();
        }
    }

    if(isset($_SESSION['user'])){
        $_SESSION["msg_log"]="Login failed!You must log out before trying to log in again";
        header('Location: index.php#logins');
        die();
    }else{
         loginValid($mail_address,$password);
    }
   
?>
  