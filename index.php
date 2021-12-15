<!doctype html>
<html>
<head>
  <title>Liste des courses</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimal-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="style.css" />
  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- include jQuery library --> 
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> 

   
  <script src="index.js"></script>

</head>
<body>

  <header>
    <?php
      include 'courses_entete.php';
    ?>  
  </header>

  <?php
  // On teste si une nouvelle course a été ajouté
  
   if (!empty($_POST)) {
   
      // echo "Traitement du formulaire method POST <br />";
    
      $action = $_POST['action'];

      switch($action) {
        case "ajout" :
          
          if (isset($_POST['nomCourse'])) {
            $nom = $_POST['nomCourse'];
          }
          
          if (!empty($nom)) {
          
          try {      
            // On établit la connexion
            $conn = new PDO("mysql:host=".NOM_SERVEUR.";dbname=".NOM_BASE, UTILISATEUR, MOTDEPASSE);
          
            // echo "Connexion OK <br/>";
                  
            $requete = "INSERT INTO courses (nom,statut) 
                        VALUES ('$nom',false)";

            // echo "Resultats de la requete $requete <br />";
            
            if ($conn->exec($requete) === true) {
            
              // echo "Insertion réussie<br/>";

            }// if
            
            // Fermeture connexion
            $conn = null;
            
          } catch(PDOException $e) {
            echo "Erreur : ", $e->getMessage(),"<br />";    
          }// catch
          
          }// Fin if
        
        break; // case Ajout
        
        case "modif" :
                   
          // parcours du tableau pour récupérer le numéro d'Id
          foreach($_POST as $cle => $valeur) {
          
            // echo $cle."-".$valeur."<BR>\n";
                        
            if(!empty(strstr($cle,"ligne_"))) {
            
              $elements = explode("_", $cle);
              $idCourse = $elements[1];
                            
              // echo "ID trouvé : $idCourse<BR>\n";
            }// Fin if
            
          }// Fin foreach
          
          if (isset($idCourse)) {
          
            try {      
              //On établit la connexion
              $conn = new PDO("mysql:host=".NOM_SERVEUR.";dbname=".NOM_BASE, UTILISATEUR, MOTDEPASSE);
            
              // echo "Connexion OK <br/>";
                    
              $requete = "DELETE FROM courses WHERE id=$idCourse";

              // echo "Resultats de la requete $requete <br />";
              
              if ($conn->exec($requete) === true) {
              
                echo "Suppression réussie<br/>";

              }// if
              
              // Fermeture connexion
              $conn = null;
              
            } catch(PDOException $e) {
              echo "Erreur : ", $e->getMessage(),"<br />";    
            }// catch
      
          }// Fin if
          
        break; // case Modif
        
        default: ;
      
      }// fin switch
       
    } else {
   
      // echo("<p>Le Formulaire n'a pas &eacute;t&eacute; rempli");

    }// Fin if
      
  ?>  

  <section>
  
  <div class="container">
  <form class="formAjout" enctype="multipart/form-data" method="post" action="index.php">
    <input id="action" name="action" type="hidden" value="ajout">
    <a href="index.php" class="list-group-item" >Courses</a>
    <a href="#" class="list-group-item" >
    <input id="nomCourse" name="nomCourse" type="text" value="" autofocus/>
    <input id="ajouteCourse" type="submit" value="+" />
    </a>
  </form>
  
  </div>

  </section>
  
  <section>
  
  <?php
      
    try {      
      //On établit la connexion
      $conn = new PDO("mysql:host=".NOM_SERVEUR.";dbname=".NOM_BASE, UTILISATEUR, MOTDEPASSE);
    
      // echo "Connexion OK <br/>";
            
      $requete = "SELECT * FROM courses ORDER BY id";

      // echo "Resultats de la requete $requete <br />";
      
      // Construction de la liste
      echo "<form class=\"formModif\" enctype=\"multipart/form-data\" method=\"post\" action=\"index.php\">\n";
      echo "<input id=\"action\" name=\"action\" type=\"hidden\" value=\"modif\">\n";
      echo "<div class=\"container\">\n";
      foreach ($conn->query($requete) as $ligne) {
      
        $ligneId = $ligne['id'];
        $nomCourse = $ligne['nom'];
        $statut = $ligne['statut'];
      
        if ($statut) {
          // Affichage différent de la ligne
        }
      
        echo "<a href=\"#\" class=\"list-group-horizontal\">\n";
        echo $nomCourse;
        echo "</a>\n";
        echo "<a href=\"#\" class=\"list-group-horizontal\">\n";
        echo "<input name=\"ligne_$ligneId\" type=\"submit\" value=\"-\">"; 
        echo "</a>\n";

      }// foreach
      echo "</div>\n";
      echo "</form>\n";
      
      // Fermeture connexion
      $conn = null;
      
    } catch(PDOException $e) {
      echo "Erreur : ", $e->getMessage(),"<br />\n";    
    }// catch
    
      
  ?>
  
  </section>
  
  <footer>
    <?php
      include 'courses_pied.php';
    ?>  
  </footer>
  
</body>
</html>

