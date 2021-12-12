<!doctype html>
<html>
<head>
  <title>Traitement des donn&eacute;es du formulaire</title>
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
  
    $formulaire_valide = false;
 
    if (!empty($_GET)) {
  
      echo "Traitement du formulaire method GET <br />";
      
      $nom = $_GET['form1Nom'];
      $prenom = $_GET['form1Prenom'];
      $mail = $_GET['form1Mail'];
      $tel = $_GET['form1Tel'];
      $pass = $_GET['form1Pass'];
      $role = $_GET['form1Role']; 
    
      $formulaire_valide = true;
      
    } else if (!empty($_POST)) {
        echo "Traitement du formulaire method POST <br />";
    
      $nom = $_POST['form1Nom'];
      $prenom = $_POST['form1Prenom'];
      $mail = $_POST['form1Mail'];
      $tel = $_POST['form1Tel'];
      $pass = $_POST['form1Pass'];
      $role = $_POST['form1Role'];
       
      $formulaire_valide = true;
 
    }
    
    if ($formulaire_valide == true) {

      $servername = 'localhost';
      $username = 'devsql1';
      $password = 'devsql1';
      
      try {      
        //On établit la connexion
        $conn = new PDO("mysql:host=$servername;dbname=base_test", $username, $password);
      
        echo "Connexion OK <br/>";
              
        $requete = "INSERT INTO utilisateurs (nom,prenom,mail,tel,password,role) 
                    VALUES ('$nom','$prenom','$mail','$tel','$pass','$role')";

        echo "Resultats de la requete $requete <br />";
        
        if ($conn->exec($requete) === true) {
        
          echo "Insertion réussie<br/>";

        }// if
        
        // Fermeture connexion
        $conn = null;
        
      } catch(PDOException $e) {
        echo "Erreur : ", $e->getMessage(),"<br />";    
      }// catch
        
    } else {
    
      echo("<p>Le Formulaire n'a pas &eacute;t&eacute; rempli");
      
    }
      
  ?>
  
  
  

  </section>
  
  <footer>
  
  
  </footer>
  
</body>
</html>

