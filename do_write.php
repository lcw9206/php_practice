<?php 
	require_once ('_db_conn.php');
	
	echo "<pre>";
	print_r($_POST['title']);
	echo "</pre>";

	if($_POST['title']=='') {
		echo "제목을 입력해주세요.";
		exit;
	}
	if($_POST['no']) {
		$title = $_POST['title'];
		$content = $_POST['content'];
		$is_secret = $_POST['is_secret'];
		$sql = "UPDATE posts SET title='".$title."', content='".$content."', is_secret='".$is_secret."' WHERE no=". $_POST['no'];
	} else {
		$sql = "INSERT INTO posts VALUES(null, '".$_POST['title']."', '".$_POST['content']."', '".$_POST['is_secret']."', NOW())";
	}
	
	mysqli_query($link, $sql);
	mysqli_close($link);
?>

<script type="text/javascript">
	document.location.href = '/board';
</script>