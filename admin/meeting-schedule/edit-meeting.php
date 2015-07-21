<? ob_start(); ?>
<?php
session_start();

if (!isset($_SESSION['is_logged_in'])) {
     header("Location:../login.php");
     die();     // just to make sure no scripts execute
}
?>

<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id, $meeting, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 <script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
        <style type="text/css">
		body
		{
			font:14px/16px Verdana, Geneva, sans-serif;
		}
		table
		{
			border-collapse:collapse;
		}
		td
		{
			text-align:left;
		}
		h2
		{
			font:22px/24px "Trebuchet MS", Arial, Helvetica, sans-serif;
			margin:0px 0px 15px 0px;
			text-align:center;
		}
		</style>
 </head>
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <p><strong>Add Meeting Schedule :</strong></p>
 <p>
   <textarea name="meeting"  id="elm1" cols="65" rows="15"><?php echo $meeting; ?></textarea>
   <br/>
 </p>
 <p>* Required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form>
 <script type="text/javascript">
if (document.location.protocol == 'file:') {
	alert("The examples might not work properly on the local file system due to security settings in your browser. Please use a real webserver.");
}
</script> 
 </body>
 </html> 
 <?php
 }



 // connect to the database
 include('../config.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
	 // confirm that the 'id' value is a valid integer before getting the form data
	 if (is_numeric($_POST['id']))
	 {
	 // get form data, making sure it is valid
	 $id = $_POST['id'];
	 $meeting = $_POST['meeting'];
	 
			 // check that firstname/lastname fields are both filled in
			 if ($meeting == '')
			 {
			 // generate error message
			 $error = 'ERROR: Please fill in all required fields!';
			 
			 //error, display form
			 renderForm($id, $meeting, $error);
			 }
			 else
			 {
			 // save the data to the database
			 mysql_query("UPDATE meeting SET meeting='$meeting' WHERE id='$id'")
			 or die(mysql_error()); 
			 
			 // once saved, redirect back to the view page
			 header("Location: view-meeting.php"); 
			 }
	 }
	 else
	 {
	 // if the 'id' isn't valid, display an error
	 echo 'Error!';
	 }
 }
 
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
	 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
	 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
	 {
	 // query db
	 $id = $_GET['id'];
	 $result = mysql_query("SELECT * FROM meeting WHERE id=$id")
	 or die(mysql_error()); 
	 $row = mysql_fetch_array($result);
	 
			 // check that the 'id' matches up with a row in the databse
			 if($row)
			 {
			 
			 // get data from db
			 $meeting = $row['meeting'];
			 
			 // show form
			 renderForm($id, $meeting, '');
			 }
			 else
			 // if no match, display result
			 {
			 	echo "No results!";
			 }
	 }
	 else
	 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
	 {
	 echo 'Error!';
	 }
 }
?>
<? ob_flush(); ?>