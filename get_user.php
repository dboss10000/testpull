<?php 
include_once("connect.php");

if($_POST){ 
	$output = '';
	if(isset($_POST['call']) && $_POST['call']== 'userData'){
	$output = '<ul id = "sortable2" class = "connectedSortable">';	
	$sql = "SELECT assigned_tasks.*,summary from assigned_tasks left join mantis_bug_table on assigned_tasks.task_id = mantis_bug_table.id   where user_id = ".$_POST['userId']."";
		$result = $conn->query($sql);
        
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$id = stripslashes($row['id']);
				$text = stripslashes($row['summary']);

				$output .= '
				<li class="ui-state-default" id="arrayorder_'.$id.'">
				<input type="hidden" id="'.$id.'" name="name_'.$id.'" value="'.$text.'" />'.$text.'
				<div class="clear"></div>
				</li>  ';
				} 
		}
$output .= '</ul>';
	}	
	echo $output ;die;
}

