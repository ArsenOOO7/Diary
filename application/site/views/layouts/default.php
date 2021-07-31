<!DOCTYPE HTML>
<html>
<head>
<title> <?php if(is_array($data) and array_key_exists("title", $data)){ echo $data["title"]; } ?> </title>
</head>
<body>

<h1> <?php echo $content; ?> </h1>

<?php
if(isset($_GLOBALS["error"])):
?>
<p> <?php echo $_GLOBALS["error"]; ?> </p>
<?php unset($_GLOBALS["error"]); endif; ?>

</body>
</html>