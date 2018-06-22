<?php 
session_start();

if(!$_POST['subject'])(
		echo ("<script>alert('제목을 입력하세요');history.go(-1);</script>");exit;}
if(!$_POST['content'])(
		echo ("<script>alert('내용을 입력하세요');history.go(-1);</script>");exit;}
if(!$_SESSION['userid'])(
		echo ("<script>window.alert('로그인 후 이용해 주세요.');history.go(-1);</script>");exit;}

$regist = date("Y-m-d (H:i)");
include "../login/dbconn.php";
		
$subject = $_post['subject'];
$content = $_post['content'];

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$usernick = $_SESSION['usernick'];

if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
		$desination = "../data/" .$_FILES['upfile']['name'];
		move_upload_file($_FILES['upfile']['tmp_name'],$destination);
		$file_name = $_FILES['upfile']['name'];
}

$sql = "insert into greet (id, nick, subject, content, regist_day, hit, file_name)";
$sql .= "values ('$userid','$usernick', '$subject', '$content', '$regist_day','$regist_day','0','$file_name')";
mysql_query($sql, $connect);
mysql_close();

echo ("<script>location.herf='./list.php';</script>");







?>
