<?php
  if(!isset($_GET['popup_type']) && !isset($_GET['prop_id'])) {
    header('Location: index.php');
  } else {
    require_once '../../inc/db.inc';
    $popup_type = $_GET['popup_type'];
    $prop_id = $_GET['prop_id'];
    $q = mysql_query("SELECT property_name,property_lease_contact FROM properties WHERE property_id = $prop_id");
    while($r = mysql_fetch_assoc($q)) {
      if($popup_type == 'email_agent') {
        $contact = unserialize($r['property_lease_contact']);
        $name = array();
        $email = array();
        foreach($contact as $v){
          $name[] = $v['name'];
          $email[] = $v['email'];
        }
        $name = implode(',',$name);
        $email = implode(';',$email);
      }
?>
      <form action="email_form.php" method="post" id="email_form">
        <input type="hidden" name="popup_type" value="<?php echo $popup_type;?>" />
        <input type="hidden" name="prop_id" value="<?php echo $prop_id;?>" />
        <label for="your_name" class="emailFormLabel">Your Name:</label><br/>
        <input type="text" name="your_name" id="your_name" class="emailFormInput" /><br/><br/>
        <label for="your_email" class="emailFormLabel">Your Email:</label><br/>
        <input type="text" name="your_email" id="your_email" class="emailFormInput" /><br/><br/>
        <label for="rec_name" class="emailFormLabel">Recipient Name:</label><br/>
        <input type="text" name="rec_name" id="rec_name"  value="<?php echo $name;?>" class="emailFormInput"/><br/><br/>
        <label for="rec_email" class="emailFormLabel">Recipient Email:</label><br/>
        <input type="text" name="rec_email" id="rec_email"  value="<?php echo $email;?>" class="emailFormInput"/><br/><br/>
        <label for="email_sub" class="emailFormLabel">Subject:</label><br/>
        <input type="text" name="email_sub" id="email_sub" value="Lexington Property ID: <?php echo $prop_id;?> - <?php echo $r['property_name'];?>" class="emailFormInput" /><br/><br/>
        <label for="email_message" class="emailFormLabel">Message:</label><br/>
        <textarea name="email_message" id="email_message" class="emailFormInput" rows="8" /></textarea><br/><br/>

        <input type="submit" value="Send" class="button1" /> &nbsp; &nbsp; <button id="email_close" class="button2">Close</button>
      </form>
<?php
    }
  }
?>