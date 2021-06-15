<?php get_header(); ?>

<?php
include ('db.php');

$connect = pdo_connect_mysql();
if(!empty($_POST)) {
$pdo_statement =$connect->prepare("SELECT * FROM abonnes ");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

	
	$pdo_statement=$connect->prepare("INSERT TO abonnes values
	 firstName =?,
	 lastName=?, 
	 telephone=?
	 where id=" . $_GET["id"]);

	$result = $pdo_statement->execute( array( 
	 $_POST['firstname'],
	 $_POST['lastname'],
	 $_POST['telephone'] ) );
	if($result) {
		header('location:index.php');
	}
}

?>

<div class="contain">
            <div class="card">
                <h2>add_abonnées</h2>
                <form action="" method="POST">
                    <label for="lastName">Nom</label> 
                    <input type="text" name="lastName" value="" id="lastName">
                    <br>
                    <label for="firstName">Prenom</label>
                    <input type="text" name="firstName" value="" id="firstName">
                    <br>
                    <label for="phone">Phone</label>
                    <input type="phone" name="phone" value="" id="phone">
                    <br>
                    <input type="submit" value="+">
                </form>
                
            </div>
<h3>Accueil</h3>

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    <div class="mini">
        
        <hr>
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
        <?php the_post_thumbnail();?>
       
    </div>
    
    
    <?php endwhile; endif; ?>
   
    


</div>



<?php 


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

$pdo_statement =$connect->prepare("SELECT * FROM emprunt ");
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
	<td><?php echo $row["id.abonnes"]; ?></td>
	<td><?php echo $row["dateEmprunt"]; ?></td>
	<td><?php echo $row["dateRetour"]; ?></td>
	
	
	</tbody>
</table>
</div>
<?php
	}
}


?>










<?php
$pdo_statement =$connect->prepare("SELECT * FROM abonnes left join livre on abonnes.id = livre.id");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<h2>Afficher tous les abonnées et leur livres emprunté </h2>
<table>
        <thead>
            <tr>
                <td># abonnes</td>
                <td>prénom</td>
                <td># livre</td>
                <td>titre</td>
                
            </tr>
        </thead>
        <tbody id="table-body">
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class="table-row">
		<td><?php echo $row["id.abonnes"]; ?></td>
        <td><?php echo $row["firstName"]; ?></td>
		<td><?php echo $row["id.livre"]; ?></td>
        <td><?php echo $row["titre"]; ?></td>
       
		
    
<?php
	}
}
?>
</tbody>
</table>
</div>
</div>

 
<?php get_footer(); ?>