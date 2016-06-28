<?php
include_once("connect.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Innnnng</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
</head>
<body>
	
Projects
<select name="project_data" id="project_data">	
	<?php
		$sql = "SELECT * from mantis_project_table";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) { 
				echo "<option  value='$row[id]'>$row[name]</option>";
			}
		} 
	?>
</select>

Users 
<select name="user_data" id="user_data">	
	<?php
		$sql = "SELECT * from mantis_user_table";
		$result = $conn->query($sql);		
		if ($result->num_rows > 0) {				
			while($row = $result->fetch_assoc()) {
				echo "<option value='$row[id]'>$row[username]</option>";
			}
		} 
	?>
</select>	
	
<div id="container">
<div id="list">
<div id="response1"> 
</div>
</div>
<div id = "mylist" style = "margin-top:15px; margin-bottom: 20px;">
	<ul id = "sortable1" class = "connectedSortable">
		
	<?php				
	/* 	$sql = "SELECT * FROM mantis_bug_text_table";
		$result = $conn->query($sql);
        
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$id = stripslashes($row['id']);
				$text = stripslashes($row['description']); */
	?>
<!--
<li class="ui-state-default" id="<?php //echo $id ?>">
<input type="hidden" id="<?php //echo $id?>" name="name_<?php //echo $id?>" value="<?php //echo $text; ?>" />
	<?php// echo $text; ?>
<div class="clear"></div>
</li>  -->
	<?php //} }?>
</ul>
</div>
	 
<div id="mylist2"   style="margin-top:15px; margin-bottom: 20px;">	 
	<ul id="sortable2" class="connectedSortable" >
		
	<?php
		$sql = " SELECT assigned_tasks.*,summary from assigned_tasks left join mantis_bug_table on assigned_tasks.task_id = mantis_bug_table.id ";
		$result = $conn->query($sql);
		 
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$id = stripslashes($row['id']);
				$text = stripslashes($row['summary']);				
	?>

	<li class="ui-state-default" id="arrayorder_<?php echo $id ?>">
	<input type="hidden" id="<?php echo $id?>" name="name_<?php echo $id?>" value="<?php echo $text; ?>" /><?php echo $text; ?>
	<div class="clear"></div>
	</li>
		<?php } }?>
	</ul>
</div>
</div>

<script>
$(function() {
	$("#sortable1, #sortable2").sortable({ 			
		connectWith: ".connectedSortable", 			 
		cursor: 'move', 
		update: function() {				
			list_content = [];
			var uid = $('#user_data').val();				 
			var row = {};
			
			row['userId'] = uid;
			$('div#mylist2').each(function() {					
				$(this).find('input,select,textarea').each(function() {						
					row[$(this).attr('id')] = $(this).val();
				});
				list_content.push(row);					
			});
		},
		stop: function(event,ui){$.post( "updateList.php", { 
		list_content: JSON.stringify(list_content),
	});}								  
	}).disableSelection();
});


	  $('#user_data').change(function() {	  
		  //alert('user');
		  var uid = $('#user_data').val();
		  var called = "userData";
		  console.log(uid);
		  $.ajax({
			  type: "POST",
			  url:'get_user.php',			  
			  data: { userId:uid,call:called},
			  success: function(data){
				$('#mylist2').html(data);
					$("#sortable1, #sortable2").sortable({ 			
		connectWith: ".connectedSortable", 			 
		cursor: 'move', 
		update: function() {				
			list_content = [];
			var uid = $('#user_data').val();				 
			var row = {};
			
			row['userId'] = uid;
			$('div#mylist2').each(function() {					
				$(this).find('input,select,textarea').each(function() {						
					row[$(this).attr('id')] = $(this).val();
				});
				list_content.push(row);					
			});
		},
		stop: function(event,ui){$.post( "updateList.php", { 
		list_content: JSON.stringify(list_content),
	});}								  
	}).disableSelection();
			  }
		  });
		  
	  });
	  	
	  $('#project_data').change(function(){
		  //alert('project');
		  var pid = $('#project_data').val();
	
		  var called = "projectData";

		  $.ajax({
			  type: "POST",
			  url:'get_project.php',			  
			  data: { projectId:pid,call:called},
			  success: function(data){
				$('#mylist').html(data);
					$("#sortable1, #sortable2").sortable({ 			
		connectWith: ".connectedSortable", 			 
		cursor: 'move', 
		update: function() {				
			list_content = [];
			var uid = $('#user_data').val();				 
			var row = {};
			
			row['userId'] = uid;
			$('div#mylist2').each(function() {					
				$(this).find('input,select,textarea').each(function() {						
					row[$(this).attr('id')] = $(this).val();
				});
				list_content.push(row);					
			});
		},
		stop: function(event,ui){$.post( "updateList.php", { 
		list_content: JSON.stringify(list_content),
	});}								  
	}).disableSelection();
			  }
		  });
	  });	
</script>
</body>
</html>
