<?php
  require_once('config/init.php');
  require_once('database/department.php');
  try{

    $result = getListDepartments(); // array of arrays
  } catch(PDOException $e){
    $err = $e-> getMessage();
    exit(0);
  }
?>

<?php

  include('templates/header.php');
  include('templates/list_departments.php');
  include('templates/footer.php');
?>


