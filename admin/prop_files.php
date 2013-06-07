<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/../';
	$root = dirname(__FILE__).'/../';
  require('../inc/db.inc');
  if(isset($_GET['property_id']) && !empty($_GET['property_id'])) {
    $prop = $_GET['property_id'];
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
            if(isset($_GET["property_id"]) && !isset($_POST["property_id"])) {
          ?>
          <form action="prop_files_.php" method="post" enctype="multipart/form-data" class="adminForm">
            <input type="hidden" name="file_property_id" value="<?php echo $prop?>"/>
            <table cellpadding="0" cellspacing="0" class="adminTable tenantTable">
              <tr>
                <td>
                  <label class="adminLabels">Area Map</label>
                </td>
                <td>
                  <input type="file" name="area_map" class="adminInput" style="margin-left: 15px"/>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="adminLabels">Demographics</label>
                </td>
                <td>
                  <input type="file" name="demographics" class="adminInput" style="margin-left: 15px"/>
                </td>
              </tr>
            </table>
            <table cellpadding="0" cellspacing="0" class="adminTable tenantTable">
              <tr>
                <td>
                  <label class="adminLabels">Label</label>
                </td>
                <td>
                  <input type="text" name="file[1][label]" class="adminInput"/>
                </td>
                <td>
                  <input type="file" name="file[1][file]" class="adminInput" style="margin-left: 15px"/>
                  <a href="" class="adminSubmit add_file" style="float:none;display:inline-block;margin:0" onclick="add_file(this);return false;">+</a>
                </td>
              </tr>
            </table>
            <table cellpadding="0" cellspacing="0" class="adminTable">
              <tr>
                <td align="right" colspan="3">
                  <input type="submit" value="Add Files" class="adminSubmit" />
                </td>
              </tr>
            </table>
          </form>
          <?php
            } else if(!isset($_GET["prop"]) && !isset($_POST["prop"])) {
          ?>
          Choose a property to add files to:<br/>
          <form action="add_files.php" method="get">
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
            } else if(isset($_POST["property_id"]) && !isset($_GET["property_id"])) {
              $prop = $_POST["property_id"];
              header("Location: ./add_files.php?property_id=$prop");
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
    function add_file(obj) {
      var curTable = $(obj).parents("table");
      $(curTable).clone().insertAfter(curTable);
      
      var counter = ($("[name$='[label]']").length);
      console.log(counter);
      
      $("[name$='[label]']").last().attr("name","file[" + (counter) + "][label]");
      $("[name$='[file]']").last().attr("name","file[" + (counter) + "][file]");
      
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