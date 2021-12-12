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
    
      echo "Connexion OK ";
      
      echo "Resultats de la requete ",$requete;
      
      $requete = "SELECT col1,col2 FROM table_test2 ORDER BY col1";
      
      foreach ($conn->query($requete) as $ligne) {
      
        echo $row['col1']," - ",$row['col2'];
      }
      
      
    
    } catch(PDOException $e) {
      echo "Erreur : ", $e->getMessage();    
    }
    
      
  ?>
  
  
  

  </section>
  
  <footer>
  
  
  </footer>
  
</body>
</html>

