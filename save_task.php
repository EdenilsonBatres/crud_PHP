<?php
include("db.php");

if(isset($_POST['save_task']))
{
//echo "";
$title = $_POST['title'];
$description = $_POST['descrption'];
//echo $title.$description;
$query = " INSERT INTO task (title, description) VALUES('$title', '$description')";
$result =  mysqli_query($con, $query);
if(!$result){
    die("query fail");
}
//echo "guardado";
$_SESSION['message'] = 'task saved';
$_SESSION['message_type'] = 'success';

header("location: index.php");//redirecciona al index nuevamente

}