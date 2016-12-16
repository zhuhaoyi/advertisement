<?
require('../config.php');
require_once('chink.php');
require('../class/class.php');
require('../class/class_json.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>hi图片上传</title>
<style type="text/css">
*{margin:0;padding:0}
body{font:normal 12px/1.6 Tahoma,simsun, Verdana, Lucida, Arial, Helvetica, sans-serif;color:#066;background:#fafaf1;}
a:link{color:#000;text-decoration:none;}
a:visited{color:#810081;text-decoration:none;}
a:hover{color:#39F;text-decoration:none;}
img{border:0}
ul,li{list-style-type: none;}
h1,h2,h3{font-size:14px;font-weight:bold;}
</style>
<?
if(!empty($_SESSION['upload'])){
	?>
    <script type="text/javascript">
		function uploadhc(){
			window.parent.form2.files.value = "<?=substr($_SESSION['upload'],2);?>";
		}
	</script>
    <?
	$_SESSION['upload']='';
}
?>
</head>
<body onLoad="uploadhc()">
<form enctype="multipart/form-data" method="Post" action="upload.php">
选择文件：<input type="file" name="upload">
<input type="submit" name="submit" value="上传">
</form>
</body>
</html>