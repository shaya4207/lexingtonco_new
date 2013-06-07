<?php
  require_once '../inc/db.inc';
  $tenants_property_id = $_POST['tenants_property_id'];
  $tenant = array_values($_POST['tenant']);
  
  mysql_query("DELETE FROM tenants WHERE tenants_property_id = $tenants_property_id");
  $sql = 'INSERT INTO tenants';
  for($i=0;$i<1;$i++) {
    $sql .= '(tenants_property_id';
    foreach($tenant[$i] as $k => $v) {
      $sql .= ',';
      $sql .=  $k;
    }
    $sql .=  ')';
  }
  $sql .= 'VALUES';
  for($i=0;$i<count($tenant);$i++) {
    if($i>0) {
      $sql .= ',';
    }
    $sql .= "('$tenants_property_id'";
    foreach($tenant[$i] as $k => $v) {
      $sql .= ',';
      $sql .= "'" . addslashes($v) . "'";
    }
    $sql .=  ')';
  }
  if(mysql_query($sql)) {
    header('Location: index.php');
  } else {
    echo mysql_error() . "<br/><br/>" . $sql;
  }
?>