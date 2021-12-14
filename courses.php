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

  <section>
  
  <div class="courses">
  <form id="courses" enctype="multipart/form-data" method="post" action="courses.php">
   <fieldset>
    <legend>Formulaire</legend>
      <label for="newCourse"></label>
      <input id="newCourse" name="newCourse" type="text" value="Nom" />
      <label for="form1Nom">      Nom      </label>
      <input id="form1Nom" name="form1Nom" type="button" value="Nom" />
    </fieldset>
  </form>
  
  </div>

  </section>
  
  <footer>
  
  
  </footer>
  
</body>
</html>

