#!/bin/bash


git add *
git commit -m "test"
git push origin courses 

for variable in 'courses.php' 'index.js' 'style.css'
do

  rcp $variable devphp1@192.168.0.1:/var/www/html/courses/

done
