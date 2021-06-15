

<?php get_header(); ?>


<?php 

include ('db.php');
 $connect = pdo_connect_mysql();

	$pdo_statement =$connect->prepare("SELECT * FROM livre ORDER BY id ");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>

<div class="container">
<div class="content">
	<h2>Voir les livres</h2>
	
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Titre</td>
                <td>Auteur</td>
                <td>disponibilité</td>
                <td>rayon</td>
            </tr>
        </thead>
        <tbody id="table-body">
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class="table-row">
		<td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["titre"]; ?></td>
		<td><?php echo $row["auteur"]; ?></td>
        <td><?php echo $row["disponible"]; ?></td>
        <td><?php echo $row["id.rayon"]; ?></td>
		
    <?php
		}
	}
	?>
  </tbody>
    </table>
</div>
<?php


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
<?php


$pdo_statement =$connect->prepare("SELECT * FROM rayon ");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<div class="content">
<h2>Voir les rayons</h2>

<table>
	<thead>
		<tr>
			<td>#</td>
			<td>Nom</td>
			<td>Réference</td>
			
			
		</tr>
	</thead>
	<tbody id="table-body">
<?php
if(!empty($result)) { 
	foreach($result as $row) {
?>
  <tr class="table-row">
	<td><?php echo $row["id"]; ?></td>
	<td><?php echo $row["nom"]; ?></td>
	<td><?php echo $row["reference"]; ?></td>
	
	
	
<?php
	}
}
?>
</tbody>
</table>
</div>
<?php
$pdo_statement =$connect->prepare("SELECT * FROM emprunt  ");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<div class="content">
<h2>Voir les emprunt</h2>

<table>
	<thead>
		<tr>
			<td>#</td>
			<td># livre</td>
			<td># abonnes</td>
			<td>date emprunt</td>
			<td>date retour</td>
			
			
		</tr>
	</thead>
	<tbody id="table-body">
<?php
if(!empty($result)) { 
	foreach($result as $row) {
?>
  <tr class="table-row">
	<td><?php echo $row["id"]; ?></td>
	<td><?php echo $row["id.livre"]; ?></td>
	<td><?php echo $row["id abonnes"]; ?></td>
	<td><?php echo $row["dateEmprunt"]; ?></td>
	<td><?php echo $row["dateRetour"]; ?></td>
	
	
	
<?php
	}
}
?>
</tbody>
</table>
</div>
</div>
<?php global $post; $tag_ID = get_the_tags($post->ID);
 echo ' <p class="page-title">'.$tag_ID[3]->name . '</p> ';?>
<?php get_footer(); ?>