<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
	$root = dirname(__FILE__);
  require('./inc/db.inc');
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
  <div class="logo"><img src="images/logo.jpg" width="379" height="94" /></div></a><img src="http://<?php echo $file?>/images/facebook.gif" style="float:right;" width="17" height="16" alt="facebook" /><img src="http://<?php echo $file?>/images/twitter.gif" style="float:right" width="17" height="16" alt="twitter" /></div>
  <div id="nav">
    <?php include_once($root.'/includes/navigation.php')?>
  </div>
  <div id="center">
    <div class="Prtext">
      <div class="title">PROPERTIES FOR LEASE BY LEXINGTON REALTY INTERNATIONAL </div>
      <a href="#inst"><div class="scroll"><img src="images/Properties_SitePlan_scroll2.gif" width="112" height="54" /></div></a>
      <div class="inst" id="inst">Use the map below to view properties in each state,<br/>
        or select a state from the list below the map.</div>
      <?php include_once($root.'/usamap.php')?>
      <div class="blue" style="margin-top:-40px;">Lexington Realty International<br/> has properties in the following states:<br/></div><br/><br/>
      <div class="states">
        <?php 
          $q = mysql_query("SELECT DISTINCT(s.states_id),s.states_name FROM properties p LEFT JOIN us_states s ON s.states_id = p.property_state ORDER BY s.states_name ASC");
          while($r = mysql_fetch_assoc($q)) {
        ?>
          <a href="./properties/?s=<?php echo $r['states_id'];?>"><?php echo $r['states_name'];?></a>
        <?php
          }
        
        /*
      <a href="properties/Alabama/">Alabama</a><br/>
      <a href="">Iowa</a><br/>
      <a href="">Missouri</a><br/>
      <a href="">Ohio</a><br/>
      <a href="">Wisconsin</a><br/>
      </div><div class="states"><a href="">Connecticut</a><br/>
      <a href="">Michigan</a><br/>
      <a href="">New Jersey</a><br/>
      <a href="">Pennsylvania</a><br/>
      <a href="">Virginia</a><br/>
      </div><div class="states"><a href="">Georgia</a><br/>
      <a href="">Minnesota</a><br/>
      <a href="">New York</a><br/>
      <a href="">South Dakota</a><br/>
      </div><div class="states"><a href="">Indiana</a><br/>
      <a href="">Mississippi</a><br/>
      <a href="">North Carolina</a><br/>
      <a href="">Tennessee</a><br/>
         * 
         */
        ?>
      </div>
       <div class="para2 prop_para2">
        <div class="title2">LEASE SPACE</div><br/><img src="http://<?php echo $file?>/images/leasing_map.gif" width="106" height="113" />
      <div class="view">View Our<br/>Leasing<br/>Portfolio<br/><br/>
      <a href="http://<?php echo $file?>/properties/leasing.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Portfolio_Click','','http://<?php echo $file?>/images/Homepage_click_hover.gif',1)"><img src="http://<?php echo $file?>/images/Homepage_click.gif" name="Portfolio_Click" width="80" height="20" border="0" id="Portfolio_Click" /></a>
        </div>
      </div> 
    </div>
  </div>
</div>
<div id="footer"><div class="wrapper"><img src="http://<?php echo $file?>/images/Properties_footer.gif" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/includes/footer.php')?></div>
</div>
</body>
</html>