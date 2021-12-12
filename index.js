
$(document).ready(function() {

  $("header").html("Entete corps de page");
  $("footer").html("Pied corps de page");
  
  setTimeout(function() { $("header").hide(); },5000);
  $("footer").html("");
 
  
  // Ajout des évenements
 $(".champsForm1 input").click(function(event) {
 
   $(event.target).attr("value","");
   
 }); 
 
  // Ajout des évenements
 $(".fform1").submit(function(event) {
   console.log("envoie du formulaire pour traitement"); 
 }); 


});
