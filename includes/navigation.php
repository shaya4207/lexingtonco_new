<ul>
  <?php if($page=='home'){?><li class="lion"><?php } else { ?><li><?php } ?><a href="http://<?php echo $file?>/index.php" style="margin-right:4px;">HOME</a></li>
  <?php if($page=='about'){?><li class="lion"><?php } else { ?><li><?php } ?><a href="http://<?php echo $file?>/about.php">ABOUT US</a> </li>
    <li><a href="http://<?php echo $file?>/properties.php" onMouseOver="mopen('m')" onMouseOut="mclosetime()">PROPERTIES FOR LEASE</a> 
  	<div id="m" onMouseOver="mcancelclosetime()" onMouseOut="mclosetime()">
		  <?php 
          $q = mysql_query("SELECT DISTINCT(s.states_id),s.states_name FROM properties p LEFT JOIN us_states s ON s.states_id = p.property_state ORDER BY s.states_name ASC");
          while($r = mysql_fetch_assoc($q)) {
        ?>
          <a href="http://<?php echo $file?>/properties/?s=<?php echo $r['states_id'];?>"><?php echo $r['states_name'];?></a>
        <?php
          }
		  ?>
		  </div>
  </li>
  <?php if($page=='contact'){?><li class="lion"><?php } else { ?><li><?php } ?><a href="http://<?php echo $file?>/contact.php">CONTACT US</a></li>
</ul>
