<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
	$root = dirname(__FILE__);
	require('./inc/db.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lexington Realty International</title>
<?php $page = 'home'; ?>
<link href="<?php echo 'http://'.$file?>/includes/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo 'http://'.$file?>/includes/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo 'http://'.$file?>/includes/lexington.js"></script>
<link href="<?php echo 'http://'.$file?>/includes/responsiveslides.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php echo 'http://'.$file?>/includes/responsiveslides.min.js"></script>
<script>
  $(function() {
	  
    $(".rslides").responsiveSlides({
	pager: true,
	});
  });
</script>
</head>
<body onload="MM_preloadImages('http://<?php echo $file?>images/Homepage_click_hover.gif')">
<div class="sitewrap">
<div id="top"><a href="http://<?php echo $file?>/index.php">
  <div class="logo"><img src="images/logo.jpg" width="379" height="94" /></div></a><img src="http://<?php echo $file?>/images/facebook.gif" style="float:right;" width="17" height="16" alt="facebook" /><img src="http://<?php echo $file?>/images/twitter.gif" style="float:right" width="17" height="16" alt="twitter" /></div>
  <div id="nav">
  <?php include_once($root.'/includes/navigation.php')?>
  </div>
  <div id="home">
    <div class="center">
      <div class="img">
      <ul class="rslides">
  <li><img src="images/Slideshow_1.jpg" width="960" height="236" /></li>
  <li><img src="images/Slideshow_2.jpg" width="960" height="236" /></li>
  <li><img src="images/Slideshow_3.jpg" width="960" height="236" /></li>
  <li><img src="images/Slideshow_4.jpg" width="960" height="236" /></li>
  <li><img src="images/Slideshow_5.jpg" width="960" height="236" /></li>
      </ul>
      </div>
      <div class="para1"><div class="blue" style="text-align:center; font-size:15px;">Acquisitions · Consulting · Leasing · Management · Sales</div>
      <span class="bold">Lexington Realty International</span> is a national, multi-faceted real estate brokerage firm specializing in investment sales, retail leasing, lease preparation/negotiating and management. Our offices are<br/>located in Central New Jersey.<br/><br/>Whether you're buying or selling, let <span class="bold">Lexington Realty International</span> put its unparalleled expertise to<br/>work for you. No matter how big your goals are, Lexington's professionals can help you accomplish<br/>them in a timely manner.
      </div>
      <div class="para2">
        <div class="title">LEASE SPACE</div><br/><img src="http://<?php echo $file?>/images/leasing_map.gif" width="106" height="113" />
      <div class="text">View Our<br/>Leasing<br/>Portfolio<br/><br/>
      <a href="http://<?php echo $file?>/properties/leasing.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Portfolio_Click','','http://<?php echo $file?>/images/Homepage_click_hover.gif',1)"><img src="http://<?php echo $file?>/images/Homepage_click.gif" name="Portfolio_Click" width="80" height="20" border="0" id="Portfolio_Click" /></a>
        </div>
      </div>
    </div>
  </div>
  </div>
<div id="footer"><div class="wrapper"><img src="http://<?php echo $file?>/images/footer_top.gif" width="960" height="27" style="background-repeat:no-repeat;" />
	<?php include_once($root.'/includes/footer.php')?>
   </div>
</div>
</body>
</html>