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

  </header>

  <section>
  
  <?php
  
  
    $formulaire_valide = false;
 
    if (!empty($_GET)) {
  
      echo "Traitement du formulaire method GET <br/>";
      
      $nom = $_GET['form1Nom'];
      $prenom = $_GET['form1Prenom'];
      $mail = $_GET['form1Mail'];
      $tel = $_GET['form1Tel'];
      $password = $_GET['form1Pass'];
      $role = $_GET['form1Role']; 
    
      $formulaire_valide = true;
      
    } else if (!empty($_POST)) {
        echo "Traitement du formulaire method POST";
    
      $nom = $_POST['form1Nom'];
      $prenom = $_POST['form1Prenom'];
      $mail = $_POST['form1Mail'];
      $tel = $_POST['form1Tel'];
      $password = $_POST['form1Pass'];
      $role = $_POST['form1Role'];
       
      $formulaire_valide = true;
 
    }
    
    if ($formulaire_valide == true) {
    
      echo $nom;
      echo "<br/>";
      echo $prenom;
      echo "<br/>";
      echo $mail;
      echo "<br/>";
      echo $tel;
      echo "<br/>";
      echo $password;
      echo "<br/>";
      echo $role;
      echo "<br/>";
      
    } else {
    
      echo("<p>Le Formulaire n'a pas &eacute;t&eacute; rempli");
      
    }
      
  ?>
  
  
  

  </section>
  
  <footer>
  
  
  </footer>
  
</body>
</html>

