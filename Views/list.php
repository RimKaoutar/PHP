<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion des acteurs</title>
<style>
            table a{
                text-decoration: none;
            }
            table {
                float: left;    
            }
        </style>
</head>
<body>
	<h1>list of actors</h1>
	<div style = "text-align: right;">
    		<a href = "add.php">New actor</a>
    	</div>
	<div style = "text-align: center;">
    		<a href = "listfav.php">fav actor</a>
    	</div>
	<div style = "text-align: left;">
    		<a href = "export.php">export fav actors</a>
    	</div>
	<div style = "text-align: left;">
    		<a href = "pdf.php">export fav actors to pdf</a>
    	</div>
    	<table border = 1>
    		<tr>
    			<th>first Name</th>
    			<th>last Name</th>
    			<th>&nbsp;</th>
    			<th>&nbsp;</th>
    			<th>&nbsp;</th>
    		</tr>
    		<?php foreach ($countries as $c) : ?>
    			<tr>
    				<td><?= $c["first_name"] ?></td>
    				<td><?= $c["last_name"] ?></td>
    				<td><a href = "edit.php?id=<?= $c["actor_id"] ?>">🖊️</a></td>
    				<td><a href = "delete.php?id=<?= $c["actor_id"] ?>">🗑️</a></td>
    				<td><a href = "detail.php?id=<?= $c["actor_id"] ?>">🔍</a></td>
    			</tr>
    		<?php endforeach; ?>
    	</table>
    	
		</table>
    	<table border = 1>
    		<tr>
    			<th>first Name</th>
    			<th>last Name</th>
    		</tr>
    		<?php foreach ($couch as $c) : ?>
    			<tr>
    				<td><?= $c["nom"] ?></td>
    				<td><?= $c["prenom"] ?></td>
    			</tr>
    		<?php endforeach; ?>
    	</table>
</body>
</html> 