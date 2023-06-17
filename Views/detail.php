<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>stalking...</title>
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
	<h1>detail of the actor</h1>
	<table border = 1>
		<tr>
			<th>nom</th>
			<th>prenom</th>
			<th>film?</th>
			<th>&nbsp;</th>
		</tr>
			<tr>
                <td><?php echo $actor['first_name']; ?></td>
				<td><?= $actor['last_name'] ?></td>
                <td>

                    <?php foreach($list as $l) : ?>
                        <?= $l["title"]."<br />";?>
                        <?php endforeach; ?>
                    </td>
                <td><a href="favori.php?id=<?= $actor['actor_id'];?>">❤️</a></td>
			</tr>
	</table>	
	
</body>
</html> 