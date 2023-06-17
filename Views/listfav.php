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
			a{
				float: right;
			}
        </style>
</head>
<body>
	<h1>list of fav actors</h1>
	<a href="index.php">main</a>
	
    	<table border = 1>
    		<tr>
    			<th>first Name</th>
    			<th>last Name</th>
    		</tr>
    		<?php foreach ($couch as $c) : ?>
    			<tr>
    				<td><?= $c["nom"] ?></td>
    				<td><?= $c["prenom"] ?></td>
    				<td><a href="unfavori.php?id=<?= $c['_id']?>&rev=<?= $c['_rev']?>">delete </a></td>
    			</tr>
    		<?php endforeach; ?>
    	</table>
</body>
</html> 