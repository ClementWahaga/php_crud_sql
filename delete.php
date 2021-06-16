<?php
$msg =  "confirmer la supprésion";
$sql= "DELETE from students where id=" . $_GET['id'];
require_once("functions_custom.php");
$pdo_statement=pdo_connect_mysql()->prepare($sql);
$pdo_statement->execute();
header('location:index.php');

?>
<?=template_header('Read')?>
<div class="content delete">
	<h2>Delete Student Guillaume</h2>
</div>
<?=template_footer()?>
<?php
$msg 

?>