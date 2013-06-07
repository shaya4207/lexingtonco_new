<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/../';
	$root = dirname(__FILE__).'/../';
  require('../inc/db.inc');
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
          EDIT A PROPERTY
        </div>
        <?php
          if(!isset($_GET['property_id'])) {
        ?>
            <form action="edit_property.php" method="get">
              <select name="property_id">
                <option selected="selected" disabled="disabled"></option>
                <?php
                  $q = mysql_query("SELECT `property_id`,`property_name` FROM properties ORDER BY `property_name`");
                  while($r = mysql_fetch_assoc($q)) {
                    $id = $r["property_id"];
                    $name = $r["property_name"];
                    echo "<option value='$id'>$name</option>";
                  }
                ?>
              </select>
              <input type="submit" class="adminSubmit" value="Choose Property" style="float:none;"/>
            </form>
        <?php
          } else {
            $property_id = $_GET['property_id'];
            $q = mysql_query("SELECT * FROM properties WHERE property_id = $property_id");
            while($r = mysql_fetch_assoc($q)) {
        ?>
              <form action="edit_property_.php" method="post" enctype="multipart/form-data" class="adminForm">
                <input type="hidden" name="property_id" value="<?php echo $property_id;?>" />
                <table cellpadding="0" cellspacing="0" class="adminTable">
                  <tr>
                    <td align="right">
                      <label for="property_name" class="adminLabels">Name</label>
                    </td>
                    <td align="left">
                      <input class="adminInput" id="property_name" value="<?php echo $r['property_name'];?>" type="text" name="property_name" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_address" class="adminLabels">Address</label>
                    </td>
                    <td align="left">
                      <input class="adminInput" id="property_address" value="<?php echo $r['property_address'];?>" type="text" name="property_address" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_city" class="adminLabels">City</label>
                    </td>
                    <td align="left">
                      <input class="adminInput" id="property_city" value="<?php echo $r['property_city'];?>" type="text" name="property_city" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_state" class="adminLabels">State</label>
                    </td>
                    <td align="left">
                      <select id="property_state" class="adminInput" name="property_state" style="width:265px;padding:0">
                        <option selected disabled value=""></option>
                        <?php
                          $q1 = mysql_query("SELECT states_id,states_name FROM us_states");
                          while($r1 = mysql_fetch_assoc($q1)) {
                        ?>
                            <option value="<?php echo $r1['states_id'];?>" <?php if($r['property_state'] == $r1['states_id']){echo "selected='selected'";}?>><?php echo $r1['states_name'];?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_zip" class="adminLabels">Zip</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" value="<?php echo $r['property_zip'];?>" id="property_zip" name="property_zip" />
                    </td>
                  </tr>
                  <?php
                    $lease_contact = unserialize($r['property_lease_contact']);
                  ?>
                  <tr>
                    <td align="right">
                      <label for="property_lease_contact[1][name]" class="adminLabels">Lease Contact 1</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" id="property_lease_contact[1][name]" value="<?php echo $lease_contact[1]['name'];?>" name="property_lease_contact[1][name]" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_lease_contact[1][email]" class="adminLabels">Lease Contact Email 1</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" id="property_lease_contact[1][email]"  value="<?php echo $lease_contact[1]['email'];?>" name="property_lease_contact[1][email]" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_lease_contact[1][phone]" class="adminLabels">Lease Contact Phone 1</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" id="property_lease_contact[1][phone]"  value="<?php echo $lease_contact[1]['phone'];?>" name="property_lease_contact[1][phone]" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_lease_contact[2][name]" class="adminLabels">Lease Contact 2</label>
                    </td>
                    <td align="right">
                      <input type="text" class="adminInput" id="property_lease_contact[2][name]" value="<?php echo $lease_contact[2]['name'];?>" name="property_lease_contact[2][name]" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_lease_contact[2][email]" class="adminLabels">Lease Contact Email 2</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" id="property_lease_contact[2][email]" value="<?php echo $lease_contact[2]['email'];?>" name="property_lease_contact[2][email]" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_lease_contact[2][phone]" class="adminLabels">Lease Contact Phone 2</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" id="property_lease_contact[2][phone]"  value="<?php echo $lease_contact[2]['phone'];?>" name="property_lease_contact[2][phone]" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_prop_type" class="adminLabels">Property Type</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" value="<?php echo $r['property_prop_type'];?>" id="property_prop_type" name="property_prop_type"/>
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_built" class="adminLabels">Year Built</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" value="<?php echo $r['property_built'];?>" id="property_built" name="property_built" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_renovated" class="adminLabels">Year Renovated</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" value="<?php echo $r['property_renovated'];?>" id="property_renovated" name="property_renovated" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_total_sq_ft" class="adminLabels">Total Sq. Ft</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" value="<?php echo $r['property_total_sq_ft'];?>" id="property_total_sq_ft" name="property_total_sq_ft" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_avail_space" class="adminLabels">Available space</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" value="<?php echo $r['property_avail_space'];?>" id="property_avail_space" name="property_avail_space" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_description" class="adminLabels">Description</label>
                    </td>
                    <td align="left">
                      <textarea class="adminInput" id="property_description" name="property_description"><?php echo $r['property_description'];?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_website" class="adminLabels">Website</label>
                    </td>
                    <td align="left">
                      <input type="text" class="adminInput" value="<?php echo $r['property_website'];?>" id="property_website" name="property_website" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <label for="property_image" class="adminLabels">Image</label>
                    </td>
                    <td align="left">
                      <?php
                        if($r['property_image'] == 1) {
                      ?>
                          <img src="../prop_images/<?php echo $r['property_id'] . $r['property_image_ext'];?>" width="150" /> <input type="button" value="Delete?" onclick="delete_image('property_image');" /><br/>
                      <?php
                        } else {
                      ?>
                         <input type="file" id="property_image" name="property_image" />
                      <?php
                        }
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left"><input type="button" class="adminSubmit" style="float:none;" value="Remove Property" onclick="delete_property('<?php echo $property_id;?>');" /></td>
                    <td align="right"><input type="submit" class="adminSubmit" style="float:none;" /></td>
                  </tr>
                </table>
              </form>
        <?php
            }
          }
        ?>
      </div>
    </div>
  </div>
  </div>
<div id="footer"><div class="wrapper"><img src="../images/Properties_footer.gif" width="960" height="27" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/includes/footer.php')?></div>
</div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script type="text/javascript">
    function delete_image(img) {
      var ans = confirm("Are you sure that you want to delete this image?");
      if(ans) {
        window.location = "./delete_image.php?property_id=<?php echo $property_id;?>&image=" + img;
      }
      return false;
    };
    function delete_property(id) {
      var ans = confirm("Are you sure that you want to remove this property?");
      if(ans) {
        window.location = "./delete_prop.php?property_id=" + id;
      }
      return false;
    }
  </script>
</body>
</html>