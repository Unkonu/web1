<?php

define('NOM_SERVEUR', 'localhost');
define('NOM_BASE', 'base_courses');

if (strcmp($_SERVER["HTTP_HOST"],"gaude.laurent.free.fr") == 0)
{
  define('UTILISATEUR', 'gaude.laurent');
  define('MOTDEPASSE', 'th32jn78');
} else {
  define('UTILISATEUR', 'devsql1');
  define('MOTDEPASSE', 'devsql1');
}

?>
