<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
	$root = dirname(__FILE__);
	require('./inc/db.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONTACT LEXINGTON INTERNATIONAL</title>
<?php $page = 'contact'; ?>
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
  <div class="title">CONTACT LEXINGTON REALTY INTERNATIONAL</div>
  <div class="textleft" style="margin-bottom:52px; width:300px;">
  <span class="blue">Lexington Realty International LLC</span><br/>
  911 East County Line Road/ Lakewood, NJ 08701<br/>
  Phone: (888) LRI-8882 (888.574.8882)<br/>
  Fax: 732.363.8006<br/><br/><br/>
  <span class="blue">Contact Via Email</span><br/><br/>
  <span class="bold">Alan Retkinski</span><br/>
  alan@lexingtonco.com<br/><br/>
  <span class="bold">Eric Frankel</span><br/>
  eric@lexingtonco.com<br/><br/>
  <span class="bold">Segal Schonfeld</span><br/>
  segal@lexingtonco.com<br/><br/>
  <span class="bold">Rivky Grossman</span><br/>
  rivky@lexingtonco.com<br/><br/>
  <span class="bold">Esty Dickstein</span><br/>
  esty@lexingtonco.com<br/><br/>
  <span class="bold">Sol Reichenberg</span><br/>
  sol@lexingtonco.com<br/><br/>
  <span class="bold">Ira Einhorn</span><br/>
  ira@lexingtonco.com<br/><br/>
  <span class="bold">Steve Weinberg</span><br/>
  steve@lexingtonco.com<br/><br/>
  <span class="bold">For additional information</span> info@lexingtonco.com
  </div>
  <div class="textright" style=" background-color:#FFF;line-height:1em; float:right; width:250px; margin-top:60px; margin-bottom:60px;"><br/>
  Thank you for your interest in <span class="bold">Lexington<br/>Realty International.</span> To send feedback,<br/>or for questions and other info, please fill<br/> out the form below:<br/><br/>
  <div id="form">
        <form method="post" action="mailer.php" enctype="multipart/form-data">
          <div class="formline">
            <span class="label" style="float:left;">FIRST NAME</span><br/>
            <input type="text" name="FirstName" class="textfield" style="float:left;"/>
          </div>
           <div class="formline">
            <span class="label" style="float:left;">LAST NAME *</span><br/>
            <input type="text" name="FirstName" class="textfield" style="float:left;"/>
          </div>
          <div class="formline">
            <span class="label" style="float:left;">COMPANY NAME</span><br/>
            <input type="text" name="FirstName" class="textfield" style="float:left;"/>
          </div>
          <div class="formline">
            <span class="label" style="float:left;">PHONE NUMBER</span><br/>
            <input type="text" name="FirstName" class="textfield" style="float:left;"/>
          </div>
          <div class="formline">
            <span class="label" style="float:left;">EMAIL ADDRESS *</span><br/>
            <input type="text" name="FirstName" class="textfield" style="float:left;"/>
          </div>
          <div class="formline">
            <div class="label" style="float:left;">YOUR INQUIRY</div>
            <textarea name="Comments" class="textarea"></textarea>
          </div>
          <div class="submit"> 
            <input type="image" name="submit" src="images/send.gif" width="81" height="20" />
          </div>
        </form>
  </div>
  </div>
  </div>
  <div class="aboutpic"><img src="http://<?php echo $file?>/images/Contact_pic.jpg" width="264" height="526" />
  </div>
  <div class="para2" style="margin-top:15px;">
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