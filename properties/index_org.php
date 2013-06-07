<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/..';
	$root = dirname(__FILE__).'/..';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROPERTIES OF LEXINGTON INTERNATIONAL</title>
<?php $page = 'lease'; ?>
<link href="<?php echo 'http://'.$file?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo 'http://'.$file?>style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo 'http://'.$file?>lexington.js"></script>
</head>

<body>
<div class="sitewrap">
  <div id="top"><img src="images/facebook.gif" style="float:right;" width="17" height="16" alt="facebook" /><img src="images/twitter.gif" style="float:right" width="17" height="16" alt="twitter" /></div>
  <div id="nav">
    <?php include_once($root.'/navigation.php')?>
  </div>
  <div id="center">
  <div class="text">
  <div class="title">PROPERTIES FOR LEASE IN ALABAMA</div>
  <div class="Prlist">
  	<div class="img"><img src="../images/Properties/countryclub/countryclub_list_img.gif" width="120" height="97" alt="Country Club" />
    </div>
    <span class="blue">Country Club Centre</span><br/>
    1700 Carter Hill Road, Montgomery, AL<br/><br/>
    Anchor Stores: Winn Dixie<br/>
    Property Type: Neighborhood<br/><br/>
  </div>
  </div>
  <div class="aboutpic"><img src="images/AboutUs_pic.jpg" width="264" height="526" />
  </div>
  <div class="para2" style="margin-top:60px;">
        <div class="title2">LEASE SPACE</div><br/><img src="<?php echo 'http://'.$file?>images/leasing_map.gif" width="106" height="113" />
      <div class="view">View Our<br/>Leasing<br/>Portfolio<br/><br/>
      <a href="properties.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Portfolio_Click','','images/Homepage_click_hover.gif',1)"><img src="<?php echo 'http://'.$file?>images/Homepage_click.gif" name="Portfolio_Click" width="80" height="20" border="0" id="Portfolio_Click" /></a>

        </div>
      </div>
  </div>
  </div>
  <div id="footer"><div class="wrapper"><img src="images/footer_top.gif" width="960" height="27" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/footer.php')?></div>
</div>
</body>
</html>