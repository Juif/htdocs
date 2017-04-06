/* 
Activité : gestion des contacts
*/

// TODO : complétez le programme
// `var contact = {
    // initialise le contact
   var contact = {

    init: function (nom, prenom) {
        this.nom = nom;
        this.prenom = prenom;
    },
 
decrire: function () {
        var contacts = this.nom + " " + this.prenom;
        return contacts;
    }
};
 
  
var contact1 = Object.create(contact);
contact1.init("Maître", "Papa");
 
var contact2 = Object.create(contact);
contact2.init("Gohan", "Geniteur");
  
// Création du tableau contenant les contacts
var contacts=[];
contacts.push(contact1);
contacts.push(contact2);
 
 
  
// Création du tableau contenant les options
var option = ["1 : Liste des contacts", "2 : Ajouter un contact", "0 : Quitter"];
  
console.log ("Bienvenue dans le gestionnaire de contacts !");
  
while (choixUtilisateur !== 0) {
    for (var i = 0; i < option.length; i++) {
        console.log(option[i]);
    };
    var choixUtilisateur = Number(prompt("Choisisser une option :"));
    switch (choixUtilisateur) {
  
        case 1:
            for (var i = 0; i < contacts.length; i++) {
            console.log("Nom : " + contacts[i].nom +" Prénom : " + contacts[i].prenom);
            };
            break;
        case 2:
            var nom = prompt("Entrer le nom de la personne");
            var prenom = prompt("Entrer le prenom de la personne");
            var nomContact = "contact" + contacts.length;
            nomContact = Object.create(contact);
            nomContact.init(nom, prenom);
            contacts.push(nomContact);
            console.log("Le contact a bien était ajouté !");
            break;
        case 0:
            console.log("Au revoir !");
        }
}