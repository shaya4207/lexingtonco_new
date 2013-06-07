<?php
  	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/../';
	$root = dirname(__FILE__).'/../';
  require('../inc/db.inc');
  if(isset($_GET['s'])) {
    $s = $_GET['s'];
  } else {
    $s = 0;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROPERTIES OF LEXINGTON INTERNATIONAL</title>
<?php $page = 'lease'; ?>
<link href="<?php echo 'http://'.$file?>/includes/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo 'http://'.$file?>/includes/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo 'http://'.$file?>/includes/lexington.js"></script>
</head>

<body>
<div class="sitewrap">
  <div id="top"><a href="http://<?php echo $file?>/index.php">
  <div class="logo"><img src="../images/logo.jpg" width="379" height="94" /></div></a><img src="../images/facebook.gif" style="float:right;" width="17" height="16" alt="facebook" /><img src="../images/twitter.gif" style="float:right" width="17" height="16" alt="twitter" /></div>
  <div id="nav">
    <?php include_once($root.'/includes/navigation.php')?>
  </div>
  <div id="center">
    <div class="text" style="min-height:600px; width:905px; padding-left:0px;">
      <?php
        $i = 0;
        $q = mysql_query("SELECT p.*,s.* FROM properties p LEFT JOIN us_states s ON s.states_id = p.property_state ORDER BY property_name ASC");
        while($r = mysql_fetch_assoc($q)) {
          if($i == 0) {
      ?>
            <div class="titlelong">
              <div id="breadcrumbs">
<a href="http://<?php echo $file;?>">HOME</a> / <a href="http://<?php echo $file;?>properties.php">PROPERTIES FOR LEASE</a> / LEASING PORTFOLIO 
</div>
            </div>
      <?php
          }
      ?>
          <div class="Prlist">
            <?php
              if($r['property_image'] == 1) {
            ?>
                <div class="img" style="margin-top:0px;">
                  <img src="../prop_images/<?php echo $r['property_id'] . $r['property_image_ext'];?>" width="98" height="98" alt="<?php echo $r['property_name'];?>" />
                </div>
            <?php
              }
            ?>
            <span class="blue" style="color:#1b8ccb;">
              <a href="./single/?prop=<?php echo $r['property_id'];?>"><?php echo $r['property_name'];?></a>
            </span><br/>
            <?php echo $r['property_address'] . "<br/>" . $r['property_city'] . ", " . $r['states_abbr'];?><br/>
            <?php
              $lease_contact = unserialize($r['property_lease_contact']);
              if(count($lease_contact) == 1) {
            ?>
                <span class="bold" style="font-size:11px;"><br/>Leasing Contact:</span><br/>
            <?php
              } else if(count($lease_contact) > 1) {
            ?>
                <span class="bold" style="font-size:11px;"><br/>Leasing Contacts:</span><br/>
            <?php
              }
              foreach($lease_contact as $v) {
            ?>
                <span style="font-size:11px"><?php echo $v['name'];?><br/> <a href="mailto:<?php echo strtolower($v['email']);?>"><?php echo strtolower($v['email']);?></a></span><br/>
            <?php
              }
            ?>
          </div>
      <?php
          $i++;
        }
      ?>
  </div>
</div>
</div>
<div id="footer">
  <div class="wrapper"><img src="http://<?php echo $file?>/images/Properties_footer.gif" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/includes/footer.php')?>
  </div>
</div>
</body>
</html>