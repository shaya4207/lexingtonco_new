<?php
  require('../inc/db.inc');
?>
<html>
  <head>
    <title></title>
  </head>
  <body>
    <form action="add_property_.php" method="post" enctype="multipart/form-data">
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td align="left">Name</td><td align="left"><input type="text" name="property_name" /></td>
        </tr>
        <tr>
          <td align="left">Address</td><td align="left"><input type="text" name="property_address" /></td>
        </tr>
        <tr>
          <td align="left">City</td><td align="left"><input type="text" name="property_city" /></td>
        </tr>
        <tr>
          <td align="left">State</td><td align="left"><select name="property_state">
        <option selected disabled value=""></option>
        <?php
          $q = mysql_query("SELECT states_id,states_name FROM us_states");
          while($r = mysql_fetch_assoc($q)) {
        ?>
            <option value="<?php echo $r['states_id'];?>"><?php echo $r['states_name'];?></option>
        <?php
          }
        ?>
      </select></td>
        </tr>
        <tr>
          <td align="left">Zip</td><td align="left"><input type="text" name="property_zip" /></td>
        </tr>
        <tr>
          <td align="left">Lease Contact</td><td align="left"><input type="text" name="property_lease_contact[1][name]" /></td>
        </tr>
        <tr>
          <td align="left">Lease Contact Email</td><td align="left"><input type="text" name="property_lease_contact[1][email]" /></td>
        </tr>
        <tr>
          <td align="left">Lease Contact</td><td align="left"><input type="text" name="property_lease_contact[2][name]" /></td>
        </tr>
        <tr>
          <td align="left">Lease Contact Email</td><td align="left"><input type="text" name="property_lease_contact[2][email]" /></td>
        </tr>
        <tr>
          <td align="left">Property Type</td><td align="left"><select name="property_prop_type">
        <option selected disabled value=""></option>
        <?php
          $q = mysql_query("SELECT prop_id,prop_name FROM prop_types");
          while($r = mysql_fetch_assoc($q)) {
        ?>
            <option value="<?php echo $r['prop_id'];?>"><?php echo $r['prop_name'];?></option>
        <?php
          }
        ?>
      </select></td>
        </tr>
        <tr>
          <td align="left">Year Built</td><td align="left"><input type="text" name="property_built" /></td>
        </tr>
        <tr>
          <td align="left">Year Renovated</td><td align="left"><input type="text" name="property_renovated" /></td>
        </tr>
        <tr>
          <td align="left">Total Sq. Ft</td><td align="left"><input type="text" name="property_total_sq_ft" /></td>
        </tr>
        <tr>
          <td align="left">Available space</td><td align="left"><input type="text" name="property_avail_space" /></td>
        </tr>
        <tr>
          <td align="left">Description</td><td align="left"><textarea name="property_description"></textarea></td>
        </tr>
        <tr>
          <td align="left">Website</td><td align="left"><input type="text" name="property_website" /></td>
        </tr>
        <tr>
          <td align="left">Image</td><td align="left"><input type="file" name="property_image" /></td>
        </tr>
        <tr>
          <td align="right" colspan="2"><input type="submit" /></td>
        </tr>
      </table>
    </form>
  </body>
</html>