<!doctype html>
<html>
<head>
  <title>Liste des courses</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  
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

          $nom = $_POST['nomCourse'];
          
          if (!empty($nom)) {
          
          try {      
            //On établit la connexion            
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
        
          $nom = $_POST['nomCourse'];
          $idCourse = $_POST['id'];
          
          // parcours du tableau pour récupérer le numéro d'Id
          foreach($_POST as $cle => $valeur) {
            echo $cle."-".$valeur."<BR>\n";
            
            if(strpos($cle,"ligne_")) {
              echo "ID trouvé<BR>\n";
            }// Fin if
          }// Fin foreach
          
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
      
        break; // case Modif
        
        default: ;
      
      }// fin switch
       
    } else {
   
      echo("<p>Le Formulaire n'a pas &eacute;t&eacute; rempli");

    }// Fin if
      
  ?>  

  <section>
  
  <div class="courses">
  <form id="courses" enctype="multipart/form-data" method="post" action="courses.php">
    <input id="action" name="action" type="hidden" value="ajout">
    <fieldset>
    <legend>Courses</legend>
      <label for="nomCourse"></label>
      <input id="nomCourse" name="nomCourse" type="text" value="" />

      <input id="ajouteCourse" type="submit" value="+" />
    </fieldset>
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
      echo "<div class=\"listeCourses\"><ul>\n";
      echo "<form id=\"liste\" class=\"formModif\" enctype=\"multipart/form-data\" method=\"post\" action=\"courses.php\">\n";
      echo "<input id=\"action\" name=\"action\" type=\"hidden\" value=\"modif\">\n";

      foreach ($conn->query($requete) as $ligne) {
      
        $ligneId = $ligne['id'];
        $nomCourse = $ligne['nom'];
        $statut = $ligne['statut'];
      
        if ($statut) {
          // Affichage différent de la ligne
        }
      
        echo "<li>";
        echo $nomCourse;
        echo "<input name=\"ligne_$ligneId\" type=\"submit\" value=\"-\">"; 
        echo "</li>\n";

      }// foreach

      echo "</form>\n";
      echo "</ul></div>\n";
      
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

