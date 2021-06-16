 
<?php
    $user='root';
    $pass="";
   

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=introbdd', $user, $pass,array(
            PDO::ATTR_PERSISTENT => true
        ));
        echo "connexion établie" . "<br/>";
        foreach($dbh->query('SELECT * from students') as $row) {
            echo '<table>id:<tr>';
            print_r("<tr>".$row['id']. "</tr>". "<br/>") ;
            echo'<tr>prénom:</tr>';
            print_r("<tr>".$row['first_name']."</tr>". "<br/>") ;
            echo '<tr>nom:</tr>';
            print_r("<tr>".$row['last_name']. "</tr>". "<br/>") ;
            echo '<tr>age:</tr>';
            print_r($row['age']. "<br/>") ;
            echo '<tr>email:</tr>';
            print_r($row['email']. "<br/>") ;
            echo '<tr>télephone:</tr>';
            print_r($row['phone']. "<br/>") ;
        }
        
        $dbh = null;
    } catch (PDOException $e) {
        print "Erreur, vous avez etait deconnecté !: " . $e->getMessage() . "<br/>";
        die();
    }
?>
<?php $dbh = new PDO('mysql:host=localhost;dbname=introbdd', $user, $pass);
 echo ($_POST .$row ['first_name']);
 echo ($_POST .$row ['last_name']);
 echo (int)$_POST .$row ['age'];
?>;