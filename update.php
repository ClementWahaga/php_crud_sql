<?php
//recupere le fichier function_custom.php
include"functions_custom.php";
//declaration de variable (PDO)
$connect = pdo_connect_mysql();
$sql = "SELECT * FROM students where id=?" ;
//check la bd
if(!empty($_POST)) {
	
	$pdo_statement=$connect->prepare("UPDATE students set 
	 first_name =?,
	 last_name=?, 
	 age=?,
	 email=?,
	 phone=?
	 where id=" . $_GET["id"]);
	$result = $pdo_statement->execute( array( 
	 $_POST['first_name'],
	 $_POST['last_name'],
	 $_POST['age'],
	 $_POST['email'],
	 $_POST['phone'] ) );
	if($result) {
		header('location:index.php');
	}
}


//afiiche les valeurs de chaques champs
$pdo_statement =$connect->prepare($sql);
$pdo_statement->execute([$_GET['id']]);
$result = $pdo_statement->fetch(PDO ::FETCH_ASSOC);


?>
<pre>
<?php print_r( $result)?>
</pre>

<?=template_header('update')?>

<div class="content update">
	<h2>Update Students #<?= $_GET['id']?></h2>
    <form action="" method="POST">
        <label for="last_name">Nom</label> 
        <input type="text" name="last_name" value="<?=$result['last_name']?>" id="last_name">
		<label for="first_name">Prenom</label>
		<input type="text" name="first_name" value="<?=$result['first_name']?>" id="first_name">
        <label for="email">Email</label>
		<input type="email" name="email" value="<?=$result['email']?>" id="email">
        <label for="age">Age</label>
		<input type="number" name="age"  value="<?=$result['age']?>" id="age">
        <label for="phone">Phone</label>
        <input type="phone" name="phone" value="<?=$result['phone']?>" id="phone">
        <input type="submit" value="Update">
    </form>
    
</div>

<?=template_footer()?>

<?php 


?>