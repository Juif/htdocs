/* 
Activité : jeu de devinette
*/

// NE PAS MODIFIER OU SUPPRIMER LES LIGNES CI-DESSOUS
// COMPLETEZ LE PROGRAMME UNIQUEMENT APRES LE TODO


console.log("Bienvenue dans ce jeu de devinette !");



// Cette ligne génère aléatoirement un nombre entre 1 et 100
var solution  = Math.floor(Math.random() * 100) + 1;

var nombre    = Number(prompt("Entrez un nombre entre 1 et 100 :"));

var tentative = 1;

  while (nombre<1 || nombre>100 && tentative < 6){
  if (nombre<1 || nombre>100 ){
   console.log("le nombre n'est pas compris entre 1 et 100");
   tentative++;
   var nombre = Number(prompt("Entrez un nombre entre 1 et 100:"));
   }}



 
while((nombre !== solution) && (tentative < 6)){
    if (nombre > solution )
      console.log(nombre + " est trop grand");
    else if (nombre < solution )
      console.log(nombre + " est trop petit")
      tentative++;
      var nombre = Number(prompt("Entrez un nombre:"));
}
 if(nombre == solution)
  console.log("Bravo ! La solution est " + solution);
else
  console.log(nombre + " n'est pas bon la solution était " + solution +  " Vous avez perdu!");




// Décommentez temporairement cette ligne pour mieux vérifier le programme
//console.log("(La solution est " + solution + ")");

// TODO : complétez le programme
/**  */