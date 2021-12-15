<!doctype html>
<html>
<head>
  <title>Liste des courses</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimal-scale=1, user-scalable=no"/>
  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- include jQuery library --> 
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> 

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

  <a href="index.php" class="badge badge-primary"><h1>Courses</h1></a>

  <form class="" enctype="multipart/form-data" method="post" action="index.php">
    <input id="action" name="action" type="hidden" value="ajout">
    <div class="input-group mb-3 row">
    
    <input class="form-control ml-1" id="nomCourse" name="nomCourse" type="text" value="" autofocus/>
    
    <div class="input-group-append col-1">
    <input class="btn" id="ajouteCourse" type="submit" value="+" />
    </div>
    
    </div>
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
      echo "<div class=\"container\">\n";
      echo "<form class=\"\" enctype=\"multipart/form-data\" method=\"post\" action=\"index.php\">\n";
      echo "<input id=\"action\" name=\"action\" type=\"hidden\" value=\"modif\">\n";
       
      foreach ($conn->query($requete) as $ligne) {
      
        $ligneId = $ligne['id'];
        $nomCourse = $ligne['nom'];
        $statut = $ligne['statut'];
      
        if ($statut) {
          // Affichage différent de la ligne
        }
      
        echo "<div class=\"input-group mb-1 row\">\n";
        echo "<label class=\"form-control ml-1 \">".$nomCourse."</label>";
        echo "<div class=\"input-group-append col-1\">";
        echo "<input class=\"btn\" name=\"ligne_$ligneId\" type=\"submit\" value=\"-\">\n"; 
        echo "</div>\n";
        echo "</div>\n";

      }// foreach
 
      echo "</form>\n";
      echo "</div>\n";
      
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

