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
    <a href="index.html">Retour formulaire</a>
  </header>

  <section>
  
  <?php
  
    $servername = 'localhost';
    $username = 'devsql1';
    $password = 'devsql1';
    
    try {      
      //On établit la connexion
      $conn = new PDO("mysql:host=$servername;dbname=base_test", $username, $password);
    
      echo "Connexion OK <br/>";
            
      $requete = "SELECT * FROM utilisateurs ORDER BY id";

      echo "Resultats de la requete $requete <br />";
      
      foreach ($conn->query($requete) as $ligne) {
      
        echo $ligne['nom']," - ",$ligne['prenom']," - ";
        echo $ligne['mail']," - ",$ligne['tel']," - ";
        echo $ligne['password']," - ",$ligne['role'],"<br />";

      }// foreach
      
      // Fermeture connexion
      $conn = null;
      
    } catch(PDOException $e) {
      echo "Erreur : ", $e->getMessage(),"<br />";    
    }// catch
    
      
  ?>
  
  
  

  </section>
  
  <footer>
  
  
  </footer>
  
</body>
</html>

