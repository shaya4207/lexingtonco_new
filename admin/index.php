<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/../';
	$root = dirname(__FILE__).'/../';
  require_once '../inc/db.inc';
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
        <div class="adminLinksDiv">
          <ul>
            <li>
              <a href="" class="admin_links al_top" id="prop_link">Properties</a>
              <span class="admin_links_span hide" id="prop_link_span">
                <a href="add_property.php" class="admin_links" style="width:50px;font-size:14px;">New</a>
                <select id="prop_link_select">
                  <option value="0">Select One</option>
                  <?php
                    $q = mysql_query("SELECT property_id,property_name FROM properties ORDER BY property_name ASC");
                    while($r = mysql_fetch_assoc($q)) {
                  ?>
                      <option value="<?php echo $r['property_id'];?>"><?php echo $r['property_name'];?></option>
                  <?php
                    }
                  ?>
                </select>
                <a href="edit_property.php?property_id=" class="admin_links al_edit" id="prop_link_edit" style="display:inline-block;width:50px;font-size:14px;">Edit</a>
              </span>
            </li>
            <li>
              <a href="" class="admin_links al_top" id="tenants_link">Tenants</a>
              <span class="admin_links_span hide" id="tenants_link_span">
                <a href="add_tenants.php" class="admin_links" style="width:50px;font-size:14px;">New</a>
                <select id="tenants_link_select">
                  <option value="0">Select One</option>
                  <?php
                    $q = mysql_query("SELECT property_id,property_name FROM properties ORDER BY property_name ASC");
                    while($r = mysql_fetch_assoc($q)) {
                  ?>
                      <option value="<?php echo $r['property_id'];?>"><?php echo $r['property_name'];?></option>
                  <?php
                    }
                  ?>
                </select>
                <a href="edit_tenants.php?property_id=" class="admin_links al_edit" id="tenants_link_edit" style="display:inline-block;width:50px;font-size:14px;">Edit</a>
              </span>
            </li>
            <li>
              <a href="" class="admin_links al_top" id="prop_files_link">Property Files</a>
              <span class="admin_links_span hide" id="prop_files_link_span">
                <select id="prop_files_link_select">
                  <option value="0">Select One</option>
                  <?php
                    $q = mysql_query("SELECT property_id,property_name FROM properties ORDER BY property_name ASC");
                    while($r = mysql_fetch_assoc($q)) {
                  ?>
                      <option value="<?php echo $r['property_id'];?>"><?php echo $r['property_name'];?></option>
                  <?php
                    }
                  ?>
                </select>
                <a href="prop_files.php?property_id=" class="admin_links al_edit" id="prop_files_link_edit" style="display:inline-block;width:50px;font-size:14px;">Go</a>
              </span>
            </li>
            <li>
              <a href="" class="admin_links al_top" id="sp_link">Site Plan</a>
              <span class="admin_links_span hide" id="sp_link_span">
                <select id="siteplan_select">
                  <option value="0">Select One</option>
                  <?php
                    $q = mysql_query("SELECT property_id,property_name FROM properties ORDER BY property_name ASC");
                    while($r = mysql_fetch_assoc($q)) {
                  ?>
                      <option value="<?php echo $r['property_id'];?>"><?php echo $r['property_name'];?></option>
                  <?php
                    }
                  ?>
                </select>
                <a href="siteplanupload.php?property_id=" class="admin_links al_edit" id="siteplan_edit" style="display:inline-block;width:50px;font-size:14px;">Go</a>
              </span>
            </li>
          </ul>
        </div>
        <?php /*
        <span class="blue">
          What would you like to do?
        </span>
        <a class="adminLinks" href="./add_property.php">Add a Property</a>
        <a class="adminLinks" href="./add_tenants.php">Add Tenants</a>
        <a class="adminLinks" href="./siteplanupload.php">Upload a Site Plan</a>
        <a class="adminLinks" href="./edit_property.php">Edit a Property</a>
        <a class="adminLinks" href="./edit_tenants.php">Edit Tenants</a>
         * 
         */
        ?>
      </div>
      <div style="clear:both"></div>
    </div>
  </div>
  </div>
<div id="footer"><div class="wrapper"><img src="../images/Properties_footer.gif" width="960" height="27" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/includes/footer.php')?></div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
  $('.al_top').each(function() {
    $(this).on('click',function() {
      var span_id = $(this).attr('id');
      
      $('#' + span_id + '_span').toggleClass('hide');
      return false;
    })
  })
  $('.al_edit').each(function() {
    $(this).on('click',function(event) {
      event.preventDefault();
      var edit_id = $(this).attr('id');
      var edit_id_shrt = edit_id.replace('_edit','');
      var edit_select = $('#' + edit_id_shrt + '_select').val();
      
      if(edit_select == 0) {
        alert('Please choose a property to edit');
      } else {
        window.location = $(this).attr('href') + edit_select;
      }
//      return false;
    })
  })
</script>
</body>
</html>