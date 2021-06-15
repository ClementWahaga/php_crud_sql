

<?php get_header(); ?>

<?php 
include ('db.php');


$connect = pdo_connect_mysql();

$pdo_statement =$connect->prepare("SELECT * FROM abonnes ");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<div class="content">
<h2>Voir les abonnes</h2>

<table>
	<thead>
		<tr>
			<td>#</td>
			<td>Nom</td>
			<td>Prenom</td>
			<td>télephone</td>
			<td></td>
		</tr>
	</thead>
	<tbody id="table-body">
<?php
if(!empty($result)) { 
	foreach($result as $row) {
?>
  <tr class="table-row">
	<td><?php echo $row["id.abonnes"]; ?></td>
	<td><?php echo $row["lastName"]; ?></td>
	<td><?php echo $row["firstName"]; ?></td>
	<td><?php echo $row["telephone"]; ?></td>
	
	
<?php
	}
}
?>
</tbody>
</table>
</div>
<?php get_footer(); ?>