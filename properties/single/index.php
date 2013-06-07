<?php
  $file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/../..';
  $root = dirname(__FILE__).'/../..';
  require($root . '/inc/db.inc');
  if(isset($_GET['prop'])) {
    $prop = $_GET['prop'];
  } else {
    $prop = 0;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LEXINGTON INTERNATIONAL REALTY</title>
<?php $page = 'lease'; ?>
<?php $state= 'Albama'; ?>
<link href="<?php echo 'http://'.$file?>/includes/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo 'http://'.$file?>/includes/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo 'http://'.$file?>/includes/lexington.js"></script>
</head>

<body>
<div class="sitewrap">
  <div id="top"><a href="http://<?php echo $file?>/index.php">
  <div class="logo"><img src="../../images/logo.jpg" width="379" height="94" /></div></a><img src="../../images/facebook.gif" style="float:right;" width="17" height="16" alt="facebook" /><img src="../../images/twitter.gif" style="float:right" width="17" height="16" alt="twitter" /></div>
  <div id="nav">
    <?php include_once($root.'/includes/navigation.php')?>
  </div>
  <div id="center">
    <div class="text" style="height:auto!important; height:100%; min-height:600px; width:875px; padding-left:30px;">
      <?php
        $q = mysql_query("SELECT p.*,s.*,sp.siteplan_id FROM properties p LEFT JOIN us_states s ON s.states_id = p.property_state LEFT JOIN siteplan sp ON sp.siteplan_property_id = p.property_id WHERE p.property_id = $prop");
        while($r = mysql_fetch_assoc($q)) {
      ?>
          <div class="titlelong" style="margin-left:-30px;">
            <div id="breadcrumbs">
<a href="../../">HOME</a> / <a href="../../properties.php">PROPERTIES FOR LEASE</a> / <a href="../../properties/?s=<?php echo $r['states_id'];?>"><?php echo strtoupper($r['states_name']);?></a> / <?php echo strtoupper($r['property_name']);?>
</div> 
          </div>
          <div class="float1">
          <div class="propimg">
          <img src="../../prop_images/<?php echo $r['property_id'] . $r['property_image_ext'];?>" width="280" /><br/>
          </div>
          <br/>
          <div class="propdet">
          <span class="blue">
            <?php echo $r['property_name'];?>
          </span>
            <br/><br/>
            <span class="13" style="font-size:13px;"><?php echo $r['property_address'];?><br/><?php echo $r['property_city'];?>, <?php echo $r['property_s_abbr']. " " . $r['states_abbr'] . " " . $r['property_zip'];?></span><br/>
            <?php
            if(!empty($r["property_website"])) {
              if(substr(strtolower($r["property_website"]),0,4) != "http") {
                $r["property_website"] = "http://" . $r["property_website"];
              }
          ?>
            <br/>
            <a href="<?php echo $r["property_website"];?>" onclick="window.open(this.href); return false;" style="color:#F00;"> Visit Property's Website</a>
          <?php
            }
          ?>
          <br/><br/><br/>
          <?php
              $lease_contact = unserialize($r['property_lease_contact']);
              if(count($lease_contact) == 1) {
            ?>
                <span class="smallblue">Leasing Contact</span><br/>
            <?php
              } else if(count($lease_contact) > 1) {
            ?>
                <span class="smallblue">Leasing Contacts</span><br/>
            <?php
              }
              foreach($lease_contact as $v) {
                $phones = explode(';', $v['phone']);
              ?>
                <div style="float:left;margin-right:15px;">
                  <span class="13" style="font-size:13px;"><?php echo $v['name'];?></span><br/>
                  <a href="mailto:<?php echo strtolower($v['email']);?>"><?php echo strtolower($v['email']);?></a><br/>
              <?php
                    foreach($phones as $phone) {
              ?>
                      <span class="13" style="font-size:13px;"><?php echo $phone;?></span><br/>
              <?php
                    }
              ?>
                </div>
              <?php
              }
            ?>
            </div>
            <div class="propDesc">
            <?php echo nl2br($r['property_description']);?>
            </div>
            </div>
            <div class="propStores">
            <?php
              $q3 = mysql_query("SELECT tenants_name FROM tenants WHERE tenants_property_id = $prop AND tenants_anchor = 1 ORDER BY tenants_name ASC");
              if(mysql_num_rows($q3) >= 1) {
                echo '<span class="tinyblue">Anchor Stores</span><br/>';
                while ($r3 = mysql_fetch_assoc($q3)) {
                  echo $r3["tenants_name"] . "<br />";
                }
                echo "<br/>";
              }
            ?>
            <?php
              if(!empty($r['property_prop_type'])){
            ?>
              <span class="tinyblue">Property Type</span><br/>
              <?php echo $r['property_prop_type'];?><br/>
              <br/>
            <?php
              }
            ?>
            <?php
              if(!empty($r['property_built']) && $r['property_built'] != '0') {
            ?>
                <span class="tinyblue">Built</span><br/>
                <?php echo $r['property_built'];?><br/>
                <br/>
            <?php
              }
              if(!empty($r['property_renovated']) && $r['property_renovated'] != '0') {
            ?>
                <span class="tinyblue">Renovated</span><br/>
                <?php echo $r['property_renovated'];?><br/>
                <br/>
            <?php
              }
            ?>
            <?php
              if(!empty($r['property_total_sq_ft'])){
            ?>
              <span class="tinyblue">Total Square Feet</span><br/>
              <?php echo $r['property_total_sq_ft'];?><br/>
              <br/>
            <?php
              }
            ?>
            <?php
              $q2 = mysql_query("SELECT tenants_name FROM tenants WHERE tenants_property_id = $prop AND tenants_name NOT IN ('', LCASE('available')) AND tenants_vacant = 0 ORDER BY tenants_name ASC");
              if(mysql_num_rows($q2) >= 1) {
            ?>
                <span class="tinyblue">Tenants</span><br/>
                <?php
                  while($r2 = mysql_fetch_assoc($q2)) {
                    echo stripslashes($r2["tenants_name"]) . "<br/>";
                  }
                ?>
                <br/>
            <?php
              }
            ?>
            <?php
              $q4 = mysql_query("SELECT tenants_sq_feet FROM tenants WHERE tenants_property_id = $prop AND (tenants_name IN ('', LCASE('available')) OR tenants_vacant = 1) ORDER BY tenants_sq_feet ASC");
              if(mysql_num_rows($q4) >= 1) {
            ?>
                <span class="tinyblue">Space Available</span><br/>
                <?php
                  while($r4 = mysql_fetch_assoc($q4)) {
                    echo stripslashes($r4["tenants_sq_feet"]) . " sq ft" . "<br/>";
                  }
                ?>
                <br/><br/>
            <?php
              }
            ?>
         </div>
      <div class="propMid">
        <div class="textright" style="margin-bottom:15px">
          <?php
            $q11 = mysql_query("SELECT * FROM files WHERE file_property_id = $prop AND file_label IN ('Area Map','Demographics')");
            while($r11 = mysql_fetch_assoc($q11)) {
              if($r11['file_label'] == 'Area Map') {
          ?>
                  <img src="../../images/Properties_Detail_pdf.gif" width="18" height="17" />&nbsp;
                  <a href="../../images/files/<?php echo $prop . '/' . $r11['file_name'];?>">Area Map
                </a><br/><br/>
          <?php
              }
              if($r11['file_label'] == 'Demographics') {
          ?>
                <img src="../../images/Properties_Detail_pdf.gif" width="18" height="17" />&nbsp;
                <a href="../../images/files/<?php echo $prop . '/' . $r11['file_name'];?>">Demographics
                </a><br/><br/>
          <?php
              }
            }
          ?>
          <?php
            if(!empty($r['siteplan_id']) && !is_null($r['siteplan_id'])) {
          ?>
              <img src="../../images/Properties_Detail_03.gif" width="18" height="19" />&nbsp;<a href="./siteplan/?prop=<?php echo $prop;?>" >View Site Plan</a><br/><br/>
          <?php
            }
          ?>
        </div><br/><br/>
        <ul class="email">
          <li><a href="#" class="email_popup" id="email_agent">Email Agent</a></li>
          <!--<li><a href="#" class="email_popup" id="email_brochure">Email Brochure</a></li>-->
          <li><a href="#" class="email_popup" id="email_property_link">Email Property Link</a></li>
        </ul>
        <?php
          $q10 = mysql_query("SELECT * FROM files WHERE file_property_id = $prop AND file_label NOT IN ('Area Map','Demographics')");
          if(mysql_num_rows($q10) > 0) {
        ?>
            <span class="red" style="color:#cd2129; font-size:11px; font-weight:bold; line-height:11px;">ADDITIONAL<br/>DOWNLOADS:</span><br/><br/>
        <?php
            while($r10 = mysql_fetch_assoc($q10)) {
        ?>
              <img src="../../images/Properties_Detail_pdf2.gif" width="18" height="17" />&nbsp;
              <a href="../../images/files/<?php echo $prop . '/' . $r10['file_name'];?>">
               <?php echo $r10['file_label'];?>
              </a><br/><br/>
        <?php
            }
          }
        ?>
      </div>
         
          </div>
      <?php
        }
      ?>
       </div>
</div>
<div id="footer">
  <div class="wrapper"><img src="../../images/Properties_footer.gif" width="960" height="27" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/includes/footer.php')?>
  </div>
</div>
<div id="email_popup">
  hello
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
  $(".email_popup").each(function() {
    $(this).on('click',function() {
      var prop_id = <?php echo $prop;?>,
      popup_type = $(this).attr('id');
      
      var url = 'popup.php?popup_type=' + popup_type + '&prop_id=' + prop_id;
      
      $.ajax({
        url: url
      }).done(function(popup) {
        $("#email_popup").css("display","block");
        $("#email_popup").html(popup);
        email_close();
        email_send();
      })
      return false;
    })
  })
  
  function email_close() {
    $("#email_close").on('click',function() {
      $("#email_popup").hide();
      return false;
    })
  }
  
  function email_send() {
    $("#email_form").on('submit',function(event) {
      event.preventDefault();
      var data = $(this).serialize();
      var url = $(this).attr("action");
 
      $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(msg) {
          $("#email_popup").html(msg);
          setTimeout(hide_popup,2500);
        }
      })
    })
  }
  
  function hide_popup() {
    $("#email_popup").hide();
  }
</script>
</body>
</html>