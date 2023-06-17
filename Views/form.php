<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<form action = "" method="post">
    		<fieldset>
    			<legend><?= (isset($country)) ? "edit " . $country["country"] : "New Actor" ?></legend>
    			<input type = "text" name = "fname" value = "<?= $country["fname"] ?? "" ?>"><br>
    			<input type = "text" name = "lname" value = "<?= $country["lname"] ?? "" ?>"><br>
    			<input type = "submit" value = "<?= (isset($country)) ? "edit " : "add" ?>">
    		</fieldset>
		</form>
	</body>
</html>