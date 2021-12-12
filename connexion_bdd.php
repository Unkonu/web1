<!doctype html>
<html>
<head>
  <title>Connexion base de données</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  
  <!-- include jQuery library --> 
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> 
  
  <script src="index.js"></script>

</head>
<body>
  <header>

  </header>

  <section>
  
  <?php
  
    $servername = 'localhost';
    $username = 'devsql1';
    $password = 'devsql1';
    
    try {      
      //On établit la connexion
      $conn = new PDO("mysql:host=$servername;dbname=base_test", $username, $password);
    
      echo "Connexion : ",$conn,"<br />";
    
    } catch(PDOException $e) {
      echo "Erreur : ", $e->getMessage();    
    }
      
  ?>
  
  
  

  </section>
  
  <footer>
  
  
  </footer>
  
</body>
</html>

