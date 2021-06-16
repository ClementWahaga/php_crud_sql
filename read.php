<?php
 include 'functions_custom.php';
 $connect = pdo_connect_mysql();

	$pdo_statement =$connect->prepare("SELECT * FROM students ORDER BY id ");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>

<?php echo template_header('Read'); ?>

<div class="content read">
	<h2>Voir les STUDENTS</h2>
	<a href="create.php" class="create-contact">Créer un étudiant</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Age</td>
                <td>Email</td>
                <td>Phone</td>
                <td></td>
            </tr>
        </thead>
        <tbody id="table-body">
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class="table-row">
		<td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["first_name"]; ?></td>
		<td><?php echo $row["last_name"]; ?></td>
        <td><?php echo $row["age"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
		<td class="actions">
                    <a href="update.php?id=<?php echo $row['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?php echo $row['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
    </table>
</div>

<?php echo template_footer(); ?>