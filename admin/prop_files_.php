<?php
  require_once '../inc/db.inc';
  
  $property_id = $_POST['file_property_id'];
  if(!is_dir('../images/files/' . $property_id)) {
    mkdir('../images/files/' . $property_id, 0777);
  }
  $dir = '../images/files/' . $property_id . '/';
  
  $area_map = '';
  $demographics = '';
  $errors = array();
  
  if(isset($_FILES['area_map'])) {
    $area_map = $_FILES['area_map'];
    unset($_FILES['area_map']);
  }
  if(isset($_FILES['demographics'])) {
    $demographics = $_FILES['demographics'];
    unset($_FILES['demographics']);
  }
  
  if($area_map['error'] == 0) {
    $name = $area_map['name'];
    if(is_file($dir . $name)) {
      $name = time() . '_' . $name;
    }
    $filetype = filetype_comb($area_map['type']);
    $file = move_uploaded_file($area_map['tmp_name'], $dir . $name);
    if($file) {
      $q = mysql_query("INSERT INTO files (file_property_id,file_name,file_type,file_label) VALUES ('$property_id','$name','$filetype','Area Map')");
      if(!$q) {
        $errors["Area Map Insert Issue: " . mysql_error()];
      }
    } else {
      $errors["Area Map Upload Issue: " . mysql_error()];
    }
  }
  
  if($demographics['error'] == 0) {
    $name = $demographics['name'];
    if(is_file($dir . $name)) {
      $name = time() . '_' . $name;
    }
    $filetype = filetype_comb($demographics['type']);
    $file = move_uploaded_file($demographics['tmp_name'], $dir . $name);
    if($file) {
      $q = mysql_query("INSERT INTO files (file_property_id,file_name,file_type,file_label) VALUES ('$property_id','$name','$filetype','Area Map')");
      if(!$q) {
        $errors["Demographics Insert Issue: " . mysql_error()];
      }
    } else {
      $errors["Demographics Upload Issue: " . mysql_error()];
    }
  }  
 
  $name = array_values($_FILES['file']['name']);
  $type = array_values($_FILES['file']['type']);
  $tmp_name = array_values($_FILES['file']['tmp_name']);
  $error = array_values($_FILES['file']['error']);
  $label = array_values($_POST['file']);

  for($i=0;$i<count($name);$i++) {
    $newfile[$i]['name'] = $name[$i]['file'];
    $newfile[$i]['type'] = $type[$i]['file'];
    $newfile[$i]['tmp_name'] = $tmp_name[$i]['file'];
    $newfile[$i]['error'] = $error[$i]['file'];
    $newfile[$i]['label'] = $label[$i]['label'];
  }
  
  foreach($newfile as $v) {
    $name = $v['name'];
    if(is_file($dir . $name)) {
      $name = time() . '_' . $name;
    }
    $label = $v['label'];
    $filetype = filetype_comb($v['type']);
    $file = move_uploaded_file($v['tmp_name'], $dir . $name);
    if($file) {
      $q = mysql_query("INSERT INTO files (file_property_id,file_name,file_type,file_label) VALUES ('$property_id','$name','$filetype','$label')");
      if(!$q) {
        $errors[$label . " Insert Issue: " . mysql_error()];
      }
    } else {
      $errors[$label . " Upload Issue: " . mysql_error()];
    }
  }
  
  if(empty($errors)) {
    header('Location: ./index.php');
  } else {
    foreach($errors as $v) {
      print_r($v) . '<br/>';
    }
  }
  
  
  
  function filetype_comb($filetype = null) {
    $type = array('image/gif', 'image/jpeg', 'image/png',
      'application/x-shockwave-flash', 'image/psd', 'image/bmp',
      'image/tiff', 'image/tiff', 'application/octet-stream',
      'image/jp2', 'application/octet-stream', 'application/octet-stream',
      'application/x-shockwave-flash', 'image/iff', 'image/vnd.wap.wbmp', 'image/xbm','application/pdf');

    $ext = array('gif', 'jpg', 'png', 'swf', 'psd', 'bmp',
      'tiff', 'tiff', 'jpc', 'jp2', 'jpf', 'jb2', 'swc',
      'aiff', 'wbmp', 'xbm','pdf');

    $comb = array_combine($type, $ext);
    
    return $comb[$filetype];
  }
?>