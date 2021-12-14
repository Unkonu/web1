<!doctype html>
<html>
<head>
  <title>Titre de la page</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  
  <!-- include jQuery library --> 
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> 
  
  <script src="index.js"></script>

</head>
<body>
  <header>
    <a href="liste.php">Afficher liste des utilisateurs</a>
  </header>

  <section>
  
  <div class="dform1">
  <form id="fform1" enctype="multipart/form-data" method="post" action="./index.php">
  <!--form id="fform1" method="get" action="./index.php"-->
    <fieldset>
    <legend>Formulaire</legend>
    <p class="champsForm1">
      <label for="form1Nom">      Nom      </label>
      <input id="form1Nom" name="form1Nom" type="text" value="Nom" />
    </p>
    <p class="champsForm1">
      <label for="form1Prenom">      Pr&eacute;nom      </label>
      <input id="form1Prenom" name="form1Prenom" type="text" value="Pr&eacute;nom" />
    </p>
    <p class="champsForm1">
      <label for="form1Mail">      Mail      </label>
      <input id="form1Mail" name="form1Mail" type="text" value="Mail" />
    </p>
    <p class="champsForm1">
      <label for="form1Tel">      T&eacute;l&eacute;phone      </label>
      <input id="form1Tel" name="form1Tel" type="text" value="Telephone" />
    </p>
    <p class="champsForm1">
      <label for="form1Pass">      Mot de passe      </label>
      <input id="form1Pass" name="form1Pass" type="text" value="Mot de passe" />
    </p>
    <p class="champsForm1">
      <label for="form1Role">      Role      </label>
      <input id="form1Role" name="form1Role" type="text" value="Role" />
    </p>
    <p class="boutonForm1">
      <input id="form1Valide" type="submit" value="Valider le formulaire" />
    </p>
    </fieldset>
  </form>
  
  </div>

  </section>
  
  <footer>
  
  
  </footer>
  
</body>
</html>

