<?php
	$file = $_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/../';
	$root = dirname(__FILE__).'/../';
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
    <div id="center">
      <div class="Sptext" style="padding-bottom: 52px;">
        <div class="title">
          CREATE SITE PLAN
        </div>
        <?php
          require('../inc/db.inc');
          
          if(!isset($_GET) || !isset($_GET['property_id']) && !isset($_POST['property_id']) && !isset($_POST['siteplan'])) {
        ?>
          Choose a property to add a Site Plan to:<br/>
          <form action="./siteplanupload.php" method="get">
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
          } else if(isset($_GET) && isset($_GET['property_id']) && !isset($_POST['property_id'])) {
            $property_id = $_GET['property_id'];
            $q = mysql_query("SELECT * FROM siteplan WHERE siteplan_property_id = '$property_id'");
            if(mysql_num_rows($q) == 0) {
        ?>
              <form action="./siteplanupload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="property_id" value="<?php echo $property_id;?>" />
                <input type="file" name="siteplan_image" /><br/>
                <input type="submit" value="Upload SitePlan" />
              </form>
        <?php
            } else {
              $q = mysql_query("SELECT siteplan_id,siteplan_image_ext,siteplan_areas FROM siteplan WHERE siteplan_property_id = $property_id");
              while($r = mysql_fetch_assoc($q)) {
                $id = $r['siteplan_id'];
                $image_ext = $r['siteplan_image_ext'];$id;
                $areas = $r['siteplan_areas'];
        ?>
                <input type="text" size="8" id="tenant_number" />
                <input type="text" size="75" id="siteplan_areas" />
                <input type="submit" value="Add Tenant" id="add_map_area" />
                <button id="undo">Undo</button>
                <button id="clear">Clear</button>
                <img src="../images/siteplan/<?php echo $property_id . '.' . $image_ext;?>" id="siteplan_create" usemap="#map" />
                <map name="map" id="map"></map>
                <form action="./siteplanupload.php" method="post" id="siteplan_form">
                  <input type="hidden" name="siteplan_id" value="<?php echo $id;?>" />
         <?php
                  if(!empty($areas) && !is_null($areas)) {
                    $areas = unserialize($areas);
                    foreach($areas as $v) {
         ?>
                      <input type="text" class="tenants_row_<?php echo $v['tenant_number'];?>" size="8" name="siteplan[<?php echo $v['tenant_number'];?>][tenant_number]" value="<?php echo $v['tenant_number'];?>" />
                      <input type="text" class="tenants_row_<?php echo $v['tenant_number'];?>" name="siteplan[<?php echo $v['tenant_number'];?>][tenant_areas]" value="<?php echo $v['tenant_areas'];?>" />
                      <button class="remove_area tenants_row_<?php echo $v['tenant_number'];?>">Remove this tenant area</button><br/>
         <?php
                    }
                  }
         ?>
                  <input type="submit" value="Add areas" id="areas_adder" />
                </form>
        <?php
              }
            }
          } else if(isset($_POST['property_id']) && isset($_FILES['siteplan_image'])) {
            if($_FILES['siteplan_image']['error'] == 0) {
              $id = $_POST['property_id'];
              
              $filetype = $_FILES['siteplan_image']['type'];
              $type = array('image/gif', 'image/jpeg', 'image/png','image/bmp');
              $ext = array('gif', 'jpg', 'png', 'bmp');
              $comb = array_combine($type, $ext);
              
              $newExt = $comb[$filetype];

              $dir = "../images/siteplan/";
              $upload = move_uploaded_file($_FILES['siteplan_image']['tmp_name'],$dir.'/'.$id.'.'.$newExt);
              if($upload) {
                $q = mysql_query("INSERT INTO siteplan (siteplan_property_id,siteplan_image_ext) VALUES ('$id','$newExt')");
                if(!$q) {
                  echo "error inserting " . mysql_error();
                } else {
                  header("Location: ./siteplanupload.php?property_id=$id");
                }
              } else {
                echo "issue uploading";
              }
            } else {
              echo "file couldn't upload";
            }
            echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><pre>";
            print_r($_POST);
            print_r($_FILES);
            echo "</pre>";
          } else if(isset($_POST['siteplan_id'])) {
            $id = $_POST['siteplan_id'];
            $areas = serialize($_POST['siteplan']);
            
            $update = mysql_query("UPDATE siteplan SET siteplan_areas = '$areas' WHERE siteplan_id = $id");
            if($update) {
              header("Location: ./siteplanupload.php");
            } else {
              echo "Couldn't update " . mysql_error();
            }
          }
        ?>
        <br/>
        <br/>
        <br/>
        <br/>
      </div>
    </div>
  </div>
<div id="footer"><div class="wrapper"><img src="../images/Properties_footer.gif" width="960" height="27" style="background-repeat:no-repeat;" />
    <?php include_once($root.'/includes/footer.php')?></div>
</div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script type="text/javascript" src="../maphilight.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      if($("#siteplan_create")) {

        $('#siteplan_create').click(function(e) {
          var offset = $(this).offset();
//      $("#siteplan_create").maphilight();
          var xArea = Math.floor(e.pageX - offset.left);
          var yArea = Math.floor(e.pageY - offset.top);
          
          if($("#siteplan_areas").val().length == 0) {
            $("#siteplan_areas").val(xArea + "," + yArea);
          } else {
            var curVal = $("#siteplan_areas").val();
            $("#siteplan_areas").val(curVal + "," + xArea + "," + yArea);
          }
        }); 
      }
      
      $("#add_map_area").on('click',function() {
        var tenant_number = $("#tenant_number").val();
        var areas = $("#siteplan_areas").val();
        if(tenant_number.length >= 1) {
          var newArea = '<area href="#" shape="poly" coords="' + areas + '" alt="' + tenant_number + '" title="' + tenant_number + '">';
          $("#map").append(newArea);
          $("#tenant_number,#siteplan_areas").val('');
          
          var addArea = '<input type="text" class="tenants_row_'+tenant_number+'" size="2" name="siteplan['+tenant_number+'][tenant_number]" value="'+tenant_number+'" />';
          addArea += '<input type="text" class="tenants_row_'+tenant_number+'" name="siteplan['+tenant_number+'][tenant_areas]" value="'+areas+'" />';
          addArea += '<button class="remove_area tenants_row_'+tenant_number+'">Remove this tenant area</button><br/>';
          $("#areas_adder").before(addArea);
          
          remove_areas();
        } else {
          alert("Tenant number can't be empty!");
        }
      })
      
      $("#undo").on('click',function() {
        if($("#siteplan_areas").val().length >= 1) {
          var areas = $("#siteplan_areas").val();
          var newAreas = areas.split(',');
          newAreas.pop();
          newAreas.pop();
          $("#siteplan_areas").val(newAreas);
        } else {
          alert("There's nothing to undo!");
        }
      });
      
      $("#clear").on('click',function() {
        if($("#siteplan_areas").val().length >= 1) {
          $("#siteplan_areas").val('');
        } else {
          alert("Area field is already empty!");
        }
      })
      
      remove_areas();
    })
    
    function remove_areas() {
      $(".remove_area").each(function() {
        $(this).on('click',function() {
          $(this).removeClass("remove_area");
          var area_row = $(this).attr("class");
          var ans = confirm("Are you sure that you want to remove this area?");
          if(ans) {
            $("." + area_row).each(function() {
              $(this).remove();
            });
          } else {
            $(this).addClass("remove_area");
          }
          return false;
        })
      })
    }
  </script>
</body>
</html>