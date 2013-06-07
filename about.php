<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
	$root = dirname(__FILE__);
	require('./inc/db.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ABOUT LEXINGTON INTERNATIONAL</title>
<?php $page = 'about'; ?>
<link href="<?php echo 'http://'.$file?>/includes/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo 'http://'.$file?>/includes/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo 'http://'.$file?>/includes/lexington.js"></script>
</head>

<body>
<div class="sitewrap">
  <div id="top"><a href="http://<?php echo $file?>/index.php">
  <div class="logo"><img src="images/logo.jpg" width="379" height="94" /></div></a><img src="http://<?php echo $file?>/images/facebook.gif" style="float:right;" width="17" height="16" alt="facebook" /><img src="http://<?php echo $file?>/images/twitter.gif" style="float:right" width="17" height="16" alt="twitter" /></div>
  <div id="nav">
    <?php include_once($root.'/includes/navigation.php')?>
  </div>
  <div id="center">
  <div class="text">
  <div class="title">ABOUT LEXINGTON REALTY INTERNATIONAL</div>
  <span class="bold">Lexington Realty International LLC (LRI)</span> was founded in 2004 to service the retail real estate needs of retailers, property owners, developers and investors. LRI has established itself as a leading retail real estate firm throughout the United States. Today, we are recognized for our influence and expertise in transforming markets throughout the United States. LRI provides creative, innovative and strategic retail real estate solutions and is a dominant full-service retail real estate organization.<br/><br/>
<span class="blue">Putting Our Clients First</span><br/><br/>
Dedication to client needs requires placing the best interests of our clients above all else. It means being creative and objective. It means offering options and opportunities usually not available elsewhere.<br/><br/>
At LRI, we pride ourselves on the attention we provide for each clients unique needs. We tailor our management and marketing strategies to every individual client's situation.<br/><br/>
At LRI, our clients include "mom and pop" businesses, growing regional players and established national operators. We work to find you the perfect location within our portfolio. We are always interested in meeting with you at your store or headquarters to learn more about your business and fully understand your specific requirements. We have access to a broad range of centers across demographic and geographic trade areas, and can offer you opportunities throughout the country. We have the patience and resources to recognize winning opportunities that conventional leasing teams often miss.<br/><br/>
<span class="blue">Putting Our Experience to Work for You</span><br/><br/>
You will benefit from our years of management experience. We will help you to successfully operate your shopping centers through up and down cycles in real estate, credit market and retailing environments. Our expert in-house capabilities to support all critical real estate, financial, legal and reporting services will be available to you and you will benefit from our hands-on, proactive management style.<br/><br/>
LRI recognizes that the most important quality it can offer its clients is service, with a firm dedication to completing the task at hand, responsiveness to ownership and a commitment to excellence.<br/><br/>
Our reputation in the industry brings us attention, and we are able to get in front of the decision makers. We will provide state of the art marketing materials to highlight features of the site and market it for you.<br/><br/>
<img src="images/Properties_Detail_pdf2.gif" width="18" height="17" />&nbsp;<a href="LRI Company Profile 6-05-13.pdf" target="_blank"><span class="red" style="color:#F00;">Read about our History and Achievements</span></a><br/><br/><br/>
  </div>
  <div class="aboutpic"><img src="http://<?php echo $file?>/images/AboutUs_pic.jpg" width="264" height="526" />
  </div>
  <div class="para2" style="margin-top:20px;">
        <div class="title2">LEASE SPACE</div><br/><img src="http://<?php echo $file?>/images/leasing_map.gif" width="106" height="113" />
      <div class="view">View Our<br/>Leasing<br/>Portfolio<br/><br/>
      <a href="http://<?php echo $file?>/properties/leasing.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Portfolio_Click','','http://<?php echo $file?>/images/Homepage_click_hover.gif',1)"><img src="http://<?php echo $file?>/images/Homepage_click.gif" name="Portfolio_Click" width="80" height="20" border="0" id="Portfolio_Click" /></a>
        </div>
      </div>
  </div>
  </div>
  <div id="footer"><div class="wrapper"><img src="http://<?php echo $file?>/images/footer_top.gif" width="960" height="27" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/includes/footer.php')?></div>
</div>
</body>
</html>