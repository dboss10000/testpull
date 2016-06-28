<?php 
include_once("connect.php");

if($_POST){ 
	
	if(isset($_POST['call']) && $_POST['call']== 'projectData'){
		
	}	
	$content = json_decode($_POST['list_content'], true);	
	echo '<pre>';
	print_r($content);die;
	$userid = $content[0]['userId'];
	unset($content[0]['userId']);
	
	foreach ($content[0] as $key=>$val) {
		$query = "INSERT INTO assigned_tasks (task_id, user_id) VALUES ('".$key."', '".$userid."') ";
		$conn->query($query);		
	}	
}
?>
