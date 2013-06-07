<?php
  require('../inc/db.inc');
  if(!isset($_GET['property_id'])) {
    header("Location: ./index.php");
  } else {
    $id = $_GET['property_id'];
    $q = mysql_query("DELETE FROM properties WHERE property_id = $id");
    if($q) {
      header("Location: ./index.php");
    } else {
      echo mysql_error();
    }
  }
?>