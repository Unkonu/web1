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
  
    if (!empty($_GET)) {
  
      echo "Traitement du formulaire method GET <br/>";
      
      define('nom',$_GET['form1Nom']);
      define('prenom',$_GET['form1Prenom']);
      define('mail',$_GET['form1Mail']);
      define('tel',$_GET['form1Tel']);
      define('password',$_GET['form1Pass']);
      define('role',$_GET['form1Role']); 
    
    } else if (!empty($_POST)) {
        echo "Traitement du formulaire method GET";
    
      define('nom',$_POST['form1Nom']);
      define('prenom',$_POST['form1Prenom']);
      define('mail',$_POST['form1Mail']);
      define('tel',$_POST['form1Tel']);
      define('password',$_POST['form1Pass']);
      define('role',$_POST['form1Role']); 

    } else {
      echo("<p>Le Formulaire n'a pas &eacute;t&eacute; rempli");
    }
    
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
  
  ?>
  
  
  

  </section>
  
  <footer>
  
  
  </footer>
  
</body>
</html>

