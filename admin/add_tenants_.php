<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/../';
	$root = dirname(__FILE__).'/../';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lexington Realty International</title>
<link href="<?php echo 'http://'.$file?>/includes/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo 'http://'.$file?>/includes/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo 'http://'.$file?>/includes/lexington.js"></script>
</head>
<body onload="MM_preloadImages('../images/Homepage_click_hover.gif')">
<div class="sitewrap">
  <div id="top"><img src="../images/facebook.gif" style="float:right;" width="17" height="16" alt="facebook" /><img src="../images/twitter.gif" style="float:right" width="17" height="16" alt="twitter" /></div>
  <div id="nav">
    <?php include_once($root.'/includes/navigation.php')?>
  </div>
  <div id="home">
    <div id="center2">
      <div class="Prtext">
        <div class="title">
          LEXINGTON REALTY ADMIN BACKEND
        </div>


          <?php
            require('../inc/db.inc');


            $tenants_property_id = mysql_real_escape_string($_POST['tenants_property_id']);

            $tenant = array_values($_POST["tenant"]);
            $values = "";
            for($i=0;$i<count($tenant);$i++) {
              $values .= "('" . $tenants_property_id . "'";
              foreach($tenant[$i] as $key => $value) {
                $values .= ",'" . mysql_real_escape_string($value) . "'";
              }
              if($i === (count($tenant) - 1)) {
                $values .= ")";
              } else {
                $values .= "),";
              }

            }
            
            $q = mysql_query("INSERT INTO `tenants`(`tenants_property_id`,`tenants_name`,`tenants_sq_feet`,`tenants_number`,`tenants_vacant`,`tenants_anchor`) VALUES $values;");
            if(!$q) {
              die("INSERT: " . mysql_error());
            } else {
          ?>
        
                <span class="blue">Tenants were successfully added!</span><br/>
                <span style="display:block;width:100%;text-align:center;float:none;">What would you like to do now?</span>
                <a class="adminLinks" href="./add_property.php">Add Another Property</a>
                <a class="adminLinks" href="./add_tenants.php">Add Tenants For Another Property</a>

          <?php
            }
          ?>
      </div>
    </div>
  </div>
</div>
<div id="footer"><div class="wrapper"><img src="../images/Properties_footer.gif" width="960" height="27" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/includes/footer.php')?></div>
</div>
</body>
</html>