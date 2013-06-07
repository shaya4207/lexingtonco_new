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
          EDIT TENANTS
        </div>
        <?php
          if(!isset($_GET['property_id'])) {
        ?>
            <form action="edit_tenants.php" method="get">
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
            $i = 1;
            $q = mysql_query("SELECT t.*,p.property_name FROM tenants t LEFT JOIN properties p ON p.property_id = t.tenants_property_id WHERE tenants_property_id = $property_id");
            $rows = mysql_num_rows($q);
            while($r = mysql_fetch_assoc($q)) {
              if($i == 1) {
        ?>
              <tr>
                <td align="center" colspan="2">
                  <span class="blue"><?php echo $r['property_name'];?></span>
                </td>
              </tr>
              <form action="edit_tenants_.php" method="post" class="adminForm">
                <input type="hidden" name="tenants_property_id" value="<?php echo $property_id?>"/>
        <?php
              }
        ?>
            <table cellpadding="0" cellspacing="0" class="adminTable tenantTable">
              <tr>
                <td align="right">
                  <label for="tenants_name" class="adminLabels">Name</label>
                </td>
                <td align="left">
                  <input type="text" name="tenant[<?php echo $i;?>][tenants_name]" id="tenants_name" value="<?php echo stripslashes($r['tenants_name']);?>" class="adminInput"/>
                </td>
              </tr>
              <tr>
                <td align="right">
                  <label for="tenants_sq_feet" class="adminLabels">Sq Feet</label>
                </td>
                <td align="left">
                  <input type="text" name="tenant[<?php echo $i;?>][tenants_sq_feet]" id="tenants_sq_feet" value="<?php echo $r['tenants_sq_feet'];?>" class="adminInput"/>
                </td>
              </tr>
              <tr>
                <td align="right">
                  <label for="tenants_number" class="adminLabels">Number</label>
                </td>
                <td align="left">
                  <input type="text" name="tenant[<?php echo $i;?>][tenants_number]" id="tenants_number" value="<?php echo $r['tenants_number'];?>" class="adminInput"/>
                </td>
              </tr>
              <tr>
                <td align="center" colspan="2">
                  <input type="hidden" name="tenant[<?php echo $i;?>][tenants_vacant]" value="0"/>
                  <input type="hidden" name="tenant[<?php echo $i;?>][tenants_anchor]" value="0"/>
                  <label for="tenants_vacant" class="adminLabels" style="padding:0;">Vacant</label> <input type="checkbox" name="tenant[<?php echo $i;?>][tenants_vacant]" id="tenants_vacant" <?php echo ($r['tenants_vacant']) ? 'checked="checked"' : '';?> value="1"/> &nbsp;
                  <label for="tenants_anchor" class="adminLabels" style="padding:0;">Anchor</label> <input type="checkbox" name="tenant[<?php echo $i;?>][tenants_anchor]" id="tenants_anchor" <?php echo ($r['tenants_anchor']) ? 'checked="checked"' : '';?> value="1"/> &nbsp;
                  <?php
                    if($i <> $rows) {
                  ?>
                      <a href="" class="adminSubmit add_tenants" style="float:none;display:inline-block" onclick="remove_tenants(this);return false;">-</a>
                  <?php
                    } else {
                  ?>
                      <a href="" class="adminSubmit add_tenants" style="float:none;display:inline-block" onclick="add_tenants(this);return false;">+</a>
                  <?php
                    }
                  ?>
                </td>
              </tr>
            </table>
        <?php
        $i++;
            }
          }
        ?>
            <table cellpadding="0" cellspacing="0" class="adminTable">
              <tr>
                <td align="right" colspan="2">
                  <input type="submit" value="Update Tenants" class="adminSubmit" />
                </td>
              </tr>
            </table>
          </form>
      </div>
    </div>
  </div>
  </div>
<div id="footer"><div class="wrapper"><img src="../images/Properties_footer.gif" width="960" height="27" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/includes/footer.php')?></div>
</div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script type="text/javascript">
    function add_tenants(obj) {
      var curTable = $(obj).parents("table");
      $(curTable).clone().insertAfter(curTable);
      
      var counter = ($("[name$='[tenants_name]']").length);
      console.log(counter);
      
      $("[name$='[tenants_name]']").last().attr("name","tenant[" + (counter) + "][tenants_name]");
      $("[name$='[tenants_sq_feet]']").last().attr("name","tenant[" + (counter) + "][tenants_sq_feet]");
      $("[name$='[tenants_number]']").last().attr("name","tenant[" + (counter) + "][tenants_number]");
      $("[name$='[tenants_vacant]']").last().attr("name","tenant[" + (counter) + "][tenants_vacant]");
      $("[name$='[tenants_vacant]']").eq("-2").attr("name","tenant[" + (counter) + "][tenants_vacant]");
      $("[name$='[tenants_anchor]']").last().attr("name","tenant[" + (counter) + "][tenants_anchor]");
      $("[name$='[tenants_anchor]']").eq("-2").attr("name","tenant[" + (counter) + "][tenants_anchor]");
      
      $(obj).text("-").attr("onclick","remove_tenants(this);return false;");
      
      return false;
    };
    function remove_tenants(obj) {
      var curTable = $(obj).parents("table");
      $(curTable).remove();
      $(obj).text("+").attr("onclick","add_tenants(this);return false;");
      
      return false;
    };
  </script>
</body>
</html>