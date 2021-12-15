#!/bin/bash


git add *
git commit -m "test"
git push origin courses 


LISTE_FICHIERS='courses.php index.js style.css' 


for variable in $LISTE_FICHIERS 
do

  rcp $variable devphp1@192.168.0.1:/var/www/html/courses/

done
