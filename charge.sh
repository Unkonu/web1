#!/bin/bash


git add *
git commit -m "test"
git push origin courses 


LISTE_FICHIERS='index.php index.php7 index.js style.css courses_entete.php courses_pied.php' 


for variable in $LISTE_FICHIERS 
do

  # rcp $variable devphp1@192.168.0.1:/var/www/html/courses/
  cp $variable /var/www/html/courses/

done
