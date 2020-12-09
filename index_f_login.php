<?php
   session_start();
   $msg=$_SESSION["msg"] ;
   unset($_SESSION["msg"] );

   $patient_cc=$_GET['cc'];
  require_once('config/init.php');
  require_once('database/patient.php');

  try{
    $result = getPatientById($patient_cc); // array of arrays
    $result2 =  getPatientAppointment($patient_cc); // date, diagnosis, doctor, speciality
    
    $result3 =  getPrescriptionsOfPatient($patient_cc);
  } catch(PDOException $e){
    $err = $e-> getMessage();
    exit(0);
  }

?>
<?php
    include('templates/header_profile.php');
    include('templates/patient_menu.php');
    include('templates/footer.php');

?>

