<?php
  require_once('config/init.php');
  require_once('database/doctor.php');
  $msg=$_SESSION["msg"] ;
  unset($_SESSION["msg"] );

  $doctor_id=$_GET['id'];

  try{
    $result = getDoctorById($doctor_id); 
    $result2 = getDepartmentOfEachDoctor($doctor_id);
    $schedule= getDoctorSchedule($doctor_id);
    $numRowsSchedule = countNumbersOfRowsSchedule($doctor_id);

  } catch(PDOException $e){
    $err = $e-> getMessage();
    exit(0);
  }

  
?>

<?php
  include('templates/header.php');
  include('templates/doctor_info.php');
  include('templates/footer.php');

?>