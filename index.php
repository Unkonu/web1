<!doctype html>
<html>
<head>
  <title>Liste des courses</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimal-scale=1, user-scalable=no"/>
  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                        VALUES ('$nom',0)";

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
                   
          // parcours du tableau pour récupérer le numéro d'Id et l'opération : modif ou suppr
          foreach($_POST as $cle => $valeur) {
                                  
            if (!empty(strstr($cle,"modif_")) || !empty(strstr($cle,"suppr_"))) {
              $elements = explode("_", $cle);
              $type = $elements[0];
              $idCourse = $elements[1];
              $statutCourse = $elements[2];
              
              // echo $type."_".$idCourse."_".$statutCourse."\n";
                         
            }// Fin if
            
          }// Fin foreach
          
          if (isset($idCourse)) {
          
            try {      
              //On établit la connexion
              $conn = new PDO("mysql:host=".NOM_SERVEUR.";dbname=".NOM_BASE, UTILISATEUR, MOTDEPASSE);
            
              // echo "Connexion OK <br/>";
              if ($type == "modif") {
                if ($statutCourse == 0) {
                  $statutBD = 1;
                } else {
                  $statutBD = 0;                
                }
                
                $requete = "UPDATE courses 
                            SET statut = $statutBD 
                            WHERE id = $idCourse";
              } else {
                $requete = "DELETE FROM courses WHERE id=$idCourse";
              }

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

    <a href="index.php" class=""><h2>Courses</h2></a>

  <form class="" name="formAjout" enctype="multipart/form-data" method="post" action="index.php">
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
  
  <div width=100 height=100 class="overflow-auto">
    testdslfdsklf
    dsf
    ds
    fds
    f
    ds
    fds
    f
    ds
    fds
    f
    ds
    fds
    df
    fds
    ds
    f
    ds
    fds
    f
    ds
    fds
  
  </div>


  
  <?php

    // Construction de la liste
    echo "<div class=\"container\">\n";
    echo "<form name=\"formModif\" class=\"\" enctype=\"multipart/form-data\" method=\"post\" action=\"index.php\">\n";
    echo "<input id=\"action\" name=\"action\" type=\"hidden\" value=\"modif\">\n";
    echo "<div class=\"overflow-auto row-1\">\n";
      
    try {      
      //On établit la connexion
      $conn = new PDO("mysql:host=".NOM_SERVEUR.";dbname=".NOM_BASE, UTILISATEUR, MOTDEPASSE);
    
      // echo "Connexion OK <br/>";
            
      $requete = "SELECT * FROM courses ORDER BY statut,id";

      // echo "Resultats de la requete $requete <br />";
             
      foreach ($conn->query($requete) as $ligne) {
      
        $ligneId = $ligne['id'];
        $nomCourse = $ligne['nom'];
        $statut = $ligne['statut'];
      
        // Affichage différent de la ligne selon statut
        if ($statut == 0) {
          $couleurElement = "bg-warning";
        } else {
          $couleurElement = "bg-primary";
        }
            
        echo "<div class=\"input-group mb-1 row\">\n";
        echo "<input type=\"submit\" class=\"form-control ml-1 ".$couleurElement."\" name=\"modif_".$ligneId."_".$statut."\" value=\"".$nomCourse."\" />\n";
        echo "<div class=\"input-group-append col-1\">\n";
        echo "<input class=\"btn col-1\" name=\"suppr_".$ligneId."_".$statut."\" type=\"submit\" value=\"-\">\n"; 
        echo "</div>\n";
        echo "</div>\n";

      }// foreach
      
      // Fermeture connexion
      $conn = null;
      
    } catch(PDOException $e) {
      echo "Erreur : ", $e->getMessage(),"<br />\n";    
    }// catch

    echo "</div>\n";
    
    echo "</form>\n";
    echo "</div>\n";
  
      
  ?>
  
  <script type="text/javascript">
    function initElement(element)
    {
      // console.log(element.classList);
      
      if(element.classList.contains("bg-primary")) {
        element.classList.remove("bg-primary");
        element.classList.add("bg-warning");
      } else {
        element.classList.remove("bg-warning");
        element.classList.add("bg-primary");
      }// Fin if
      
      // alert("soumission du formulaire");

      element.submit();
      
      
      // console.log(element.classList);
    }
  </script>
  
  </section>
    
  <footer>
    <?php
      include 'courses_pied.php';
    ?>  
  </footer>
  
</body>
</html>

