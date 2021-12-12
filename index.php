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
  
    echo "Traitement du formulaire";
    
    echo $_GET['form1Nom'];
    echo $_GET['form1Prenom'];
    echo $_GET['form1Mail'];
    echo $_GET['form1Tel'];
    echo $_GET['form1Pass'];
    echo $_GET['form1Role'];
    
    } else if (!empty($_POST)) {
    
    } else {
      echo("<p>Le Formulaire n'a pas &eacute;t&eacute; rempli");
    }
  
  ?>
  
  
  

  </section>
  
  <footer>
  
  
  </footer>
  
</body>
</html>

