<?php
include"functions_custom.php";
$connect = pdo_connect_mysql();
$sql = "INSERT INTO students VALUES ( ?,?,?,?,?)";
if(!empty($_POST["submit"])) {
	
	$pdo_statement=$connect->prepare($sql);
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

?>
<pre>
<?php print_r($result)?>
</pre>

<?=template_header('Read')?>

<div class="content update">
	<h2>Create Students</h2>
    <form action="" method="POST">
        <label for="last_name">Nom</label> 
        <input type="text" name="name" value="" id="name">
		<label for="first_name">Prenom</label>
		<input type="text" name="first_name" value="" id="first_name">
        <label for="email">Email</label>
		<input type="email" name="email" value="" id="email">
        <label for="age">Age</label>
		<input type="number" name="age"  value="" id="age">
        <label for="phone">Phone</label>
        <input type="phone" name="phone" value="" id="phone">
        <input type="submit" value="create">
    </form>
    
</div>

<?=template_footer()?>

<?php

?>
