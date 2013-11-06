<html>
<head><title>chat</title></head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <textarea name="client" id="client" cols="30" rows="2"></textarea>
    <input type="submit" value="submit" name="submit"/>
</form>
<?php
if(isset($_POST['client']))
{
$message=$_POST['client'];
echo $message;
    echo include_once('client.php');
}
?>
</body>
</html>