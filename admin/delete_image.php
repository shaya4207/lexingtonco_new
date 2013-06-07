<?php
  require('../inc/db.inc');
  if(!isset($_GET['property_id']) || !isset($_GET['image'])) {
    header("Location: ./index.php");
  } else {
    $property_id = $_GET['property_id'];
    $image = $_GET['image'];
    switch ($image) {
      case "property_image":
        delete_property_image($property_id);
        break;
      case "property_area_map":
        delete_property_area_map($property_id);
        break;
      case "property_demog":
        delete_property_demog($property_id);
        break;
    }
  }
  
  function delete_property_image($property_id) {
    $q1 = mysql_query("SELECT property_image_ext FROM properties WHERE property_id = $property_id");
    while($r1 = mysql_fetch_assoc($q1)) {
      $image_ext = $r1['property_image_ext'];
    }
    $q = mysql_query("UPDATE properties SET property_image = NULL, property_image_ext = NULL WHERE property_id = $property_id");
    if($q) {
      unlink("../prop_images/" . $property_id . $image_ext);
      header("Location: ./edit_property.php?property_id=$property_id");
    } else {
      echo mysql_error();
    }
  }
  
  function delete_property_area_map($property_id) {
    $q = mysql_query("SELECT property_area_map FROM properties WHERE property_id = $property_id");
    while($r = mysql_fetch_assoc($q)) {
      $area_map = $r['property_area_map'];
    }
    $q1 = mysql_query("UPDATE properties SET property_area_map = NULL WHERE property_id = $property_id");
    if($q) {
      unlink("../prop_downloads/" . $property_id . "_" . $area_map);
      header("Location: ./edit_property.php?property_id=$property_id");
    } else {
      echo mysql_error();
    }
  }
  
  function delete_property_demog($property_id) {
    $q = mysql_query("SELECT property_demog FROM properties WHERE property_id = $property_id");
    while($r = mysql_fetch_assoc($q)) {
      $demog = $r['property_demog'];
    }
    $q1 = mysql_query("UPDATE properties SET property_demog = NULL WHERE property_id = $property_id");
    if($q) {
      unlink("../prop_downloads/" . $property_id . "_" . $demog);
      header("Location: ./edit_property.php?property_id=$property_id");
    } else {
      echo mysql_error();
    }
  }
?>