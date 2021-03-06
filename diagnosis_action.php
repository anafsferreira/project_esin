<?php require_once('config/init.php');
 require_once('database/appointment.php');
 require_once('database/disease.php');

$disease=$_POST["disease_name"];
$disease = strtolower($disease); 

$id_appointment=$_SESSION["appointment"];


if(strlen($disease)==0){
    $_SESSION["msg_disease"]=" Please insert the diagnosed disease !";
    header('Location: appointment_info.php');
    die();
}
 try{
    if(check_disease($disease)){
        $disease_result=check_disease($disease);
        $id_disease= $disease_result["id"];

   
        InsertAppointmentDiagnosis($id_appointment,$id_disease);
        $_SESSION["msg_disease"]="Insert of diagnosis successful !";
        header('Location: appointment_info.php');   
    }else{
        $_SESSION["msg_disease"]="There is no such disease !";
        header('Location: appointment_info.php');}
    }catch(PDOException $e){
        
        if(strpos($e->getMessage(), "UNIQUE")){
            $_SESSION["msg_disease"]="This disease was already diagnosed";
         }
         else{
            $_SESSION["msg_disease"]="Diagnosis fail!";
        }
        header('Location: appointment_info.php');
    }
?>