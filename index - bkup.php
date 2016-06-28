<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Papermashup.com | JQuery Drag and Drop Demo</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
ul {
	padding:0px;
	margin: 0px;
}
#response {
	padding:10px;
	background-color:#9F9;
	border:2px solid #396;
	margin-bottom:20px;
}
#list li {
	margin: 0 0 3px;
	padding:8px;
	background-color:#333;
	color:#fff;
	list-style: none;
}
#sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
  }
 #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
}
</style>
<script type="text/javascript">

</script>
</head>
<body>
<div id="container">
  <div id="list">

    <div id="response1"> </div>
    <ul>
      <?php
                ?>
    </ul>
  </div>
  
  <div id="mylist" style="margin-top:15px; margin-bottom: 20px;">
		<ul id="sortable1" class="connectedSortable">
			<?php
                include("connect.php");
				$query  = "SELECT id, text FROM testdragdropfirst ORDER BY listorder ASC";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					
				$id = stripslashes($row['id']);
				$text = stripslashes($row['text']);
					
				?>
		  <li class="ui-state-default" id="<?php echo $id ?>"><input type="hidden" name="<?php echo $id?>" value="<?php echo $text; ?>" /> <?php echo $text; ?>
			<div class="clear"></div>
		  </li>
      <?php } ?>
		  <?php  ?>
		</ul>
	</div>	 
	<div id="mylist2" style="margin-top:15px; margin-bottom: 20px;">	 
		<ul id="sortable2" class="connectedSortable">
			<?php
                include("connect.php");
				$query  = "SELECT id, text FROM testdragdrop ORDER BY listorder ASC";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					
				$id = stripslashes($row['id']);
				$text = stripslashes($row['text']);
					
			?>
		  <li id="arrayorder_<?php echo $id ?>"><?php echo $id?> <?php echo $text; ?>
			<div class="clear"></div>
		  </li>
			<?php } ?>
		
		</ul>
	
	</div>
  
</div>

<script>
$(function() {
	$("#sortable1, #sortable2").sortable({ 
			
			connectWith: ".connectedSortable", 
		 
			cursor: 'move', 
			update: function() {
				
				var list_content = [];
			
				$('div#mylist2').each(function() {
					var row = {};
					$(this).find('input,select,textarea').each(function() {
						if ($(this).is(':checkbox')) {
							if ($(this).is(':checked')) {
								row[$(this).attr('name')] = 1;
							}
							else {
								row[$(this).attr('name')] = 0;
							}
						} 
						else {
							row[$(this).attr('name')] = $(this).val();
						}
					});
					list_content.push(row);
					console.log(list_content);
					
				
					
					
				});
				
			 $.post( "updateList.php", { 
				list_content: JSON.stringify(list_content),
				
			});	
				
				
				
				
	 															 
		 }								  
		}).disableSelection();
	});
  
</script>
</body>
</html>
