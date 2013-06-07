<?php
  $link = mysql_connect('localhost', 'parkaveg', '1136countypark') or die('Connect: ' . mysql_error());
  $db = mysql_select_db('parkaveg_lexingtonco', $link) or die('DB: ' . mysql_error());