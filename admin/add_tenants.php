<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/../';
	$root = dirname(__FILE__).'/../';
  require('../inc/db.inc');
  if(isset($_GET['prop']) && !empty($_GET['prop'])) {
    $prop = $_GET['prop'];
  }
?><?php
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
            ADD NEW TENANTS
          </div>
          <?php
            if(isset($_GET["prop"]) && !isset($_POST["prop"])) {
          ?>
          <form action="add_tenants_.php" method="post" enctype="multipart/form-data" class="adminForm">
            <input type="hidden" name="tenants_property_id" value="<?php echo $prop?>"/>
            <table cellpadding="0" cellspacing="0" class="adminTable tenantTable">
              <tr>
                <td align="right">
                  <label for="tenants_name" class="adminLabels">Name</label>
                </td>
                <td align="left">
                  <input type="text" name="tenant[0][tenants_name]" id="tenants_name" class="adminInput"/>
                </td>
              </tr>
              <tr>
                <td align="right">
                  <label for="tenants_sq_feet" class="adminLabels">Sq Feet</label>
                </td>
                <td align="left">
                  <input type="text" name="tenant[0][tenants_sq_feet]" id="tenants_sq_feet" class="adminInput"/>
                </td>
              </tr>
              <tr>
                <td align="right">
                  <label for="tenants_number" class="adminLabels">Number</label>
                </td>
                <td align="left">
                  <input type="text" name="tenant[0][tenants_number]" id="tenants_number" class="adminInput"/>
                </td>
              </tr>
              <tr>
                <td align="center" colspan="2">
                  <input type="hidden" name="tenant[0][tenants_vacant]" value="0"/>
                  <input type="hidden" name="tenant[0][tenants_anchor]" value="0"/>
                  <label for="tenants_vacant" class="adminLabels" style="padding:0;">Vacant</label> <input type="checkbox" name="tenant[0][tenants_vacant]" id="tenants_vacant" value="1"/> &nbsp;
                  <label for="tenants_anchor" class="adminLabels" style="padding:0;">Anchor</label> <input type="checkbox" name="tenant[0][tenants_anchor]" id="tenants_anchor" value="1"/> &nbsp;
                  <a href="" class="adminSubmit add_tenants" style="float:none;display:inline-block" onclick="add_tenants(this);return false;">+</a>
                </td>
              </tr>
            </table>
            <table cellpadding="0" cellspacing="0" class="adminTable">
              <tr>
                <td align="right" colspan="2">
                  <input type="submit" value="Add Tenants" class="adminSubmit" />
                </td>
              </tr>
            </table>
          </form>
          <?php
            } else if(!isset($_GET["prop"]) && !isset($_POST["prop"])) {
          ?>
          Choose a property to add tenants to:<br/>
          <form action="add_tenants.php" method="get">
            <select name="prop">
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
            } else if(isset($_POST["prop"]) && !isset($_GET["prop"])) {
              $prop = $_POST["prop"];
              header("Location: ./add_tenants.php?prop=$prop");
              exit;
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
    function add_tenants(obj) {
      var curTable = $(obj).parents("table");
      $(curTable).clone().insertAfter(curTable);
      
      var counter = ($("[name$='[tenants_name]']").length -1);
      
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