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
  </header>

  <?php
  // On teste si une nouvelle course a été ajouté
  
   if (!empty($_POST)) {
   
      // echo "Traitement du formulaire method POST <br />";
    
      $action = $_POST['Action'];

      switch($action) {
        case "ajout" :

          $nom = $_POST['nomCourse'];
           
          $servername = 'localhost';
          $username = 'devsql1';
          $password = 'devsql1';
          $nom_base = 'base_courses';
        
          try {      
            //On établit la connexion
            $conn = new PDO("mysql:host=$servername;dbname=$nom_base", $username, $password);
          
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
        
        break; // case Ajout
        
        case "modif" :
        
          $nom = $_POST['nomCourse'];
           
          $servername = 'localhost';
          $username = 'devsql1';
          $password = 'devsql1';
          $nom_base = 'base_courses';
        
          try {      
            //On établit la connexion
            $conn = new PDO("mysql:host=$servername;dbname=$nom_base", $username, $password);
          
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
      
        break; // case Modif
        
        default:
          echo("<p>Le Formulaire n'a pas &eacute;t&eacute; rempli");
      
      }// fin switch
       
    } else {
   
      echo("<p>Le Formulaire n'a pas &eacute;t&eacute; rempli");

    }
      
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
  
  <form id="liste" enctype="multipart/form-data" method="post" action="courses.php">
  <input id="action" name="action" type="hidden" value="modif">

  <?php
  
    $servername = 'localhost';
    $username = 'devsql1';
    $password = 'devsql1';
    $nom_base = 'base_courses';
    
    try {      
      //On établit la connexion
      $conn = new PDO("mysql:host=$servername;dbname=$nom_base", $username, $password);
    
      // echo "Connexion OK <br/>";
            
      $requete = "SELECT * FROM courses ORDER BY id";

      // echo "Resultats de la requete $requete <br />";
      
      // Construction de la liste
      echo "<div class=\"listeCourses\"><ul>";

      foreach ($conn->query($requete) as $ligne) {
      
        $ligneId = $ligne['id'];
      
        if ($ligne['statut']) {
          // Affichage différent de la ligne
        }
      
        echo "<li>";
        echo $ligne['nom'];
        echo "<input id=\"ligne_$ligneId\" name=\"ligne_$ligneId\" type=\"submit\" value=\"-\">"; 

        echo "</li>\n";

      }// foreach

      echo "</ul></div>\n";
      
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

