<?php 
include_once("connect.php");

if($_POST){ 
	$output = '';
	if(isset($_POST['call']) && $_POST['call']== 'projectData'){
	$output = '<ul id = "sortable1" class = "connectedSortable >';	
			
		$sql = "SELECT * FROM mantis_bug_table where project_id = ".$_POST['projectId']."";
		$result = $conn->query($sql);
        
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$id = stripslashes($row['id']);
				$text = stripslashes($row['summary']);

				$output .= '
				<li class="ui-state-default" id="'.$id.'">
				<input type="hidden" id="'.$id.'" name="name_'.$id.'" value="'.$text.'" />
					'.$text.'
				<div class="clear"></div>
				</li>  ';
			} 
		}
$output .= '</ul>';
	}	
	echo $output ;die;
}

