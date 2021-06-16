<?php
function pdo_connect_mysql() {
  $user='root';
  $pass="";
    
  try {
    $dbh = new PDO('mysql:host=localhost;dbname=introbdd', $user, $pass);
    echo "connexion établie" . "<br/>";
    return $dbh;
        
               
  }catch (PDOException $e) {
    print "Erreur, vous avez etait deconnecté !: " . $e->getMessage() . "<br/>";
    return false;
    }
    
     

   

}


/**
 * function permettant de printer la template de header
 */
function template_header($title) {
  echo <<<EOT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>phpmysql</title>
      <link href="style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
      <nav class="navtop">
        <div>
          <h1>Website Title</h1>
              <a href="index.php"><i class="fas fa-home"></i>Home</a>
          <a href="read.php"><i class="fas fa-address-book"></i>Contacts</a>
        </div>
      </nav>
  EOT;
}


/**
 * function permettant de printer la template de footer
 */
function template_footer() {
  $year = date("Y");
  echo <<<EOT
        <footer>
          <p>©$year MONSITE.NC</p>
        </footer>
      </body>
  </html>
  EOT;
}
?>