function estNull(input) {
    var field = document.getElementsByName(input);
    for (let i = 0; i < field.length; i++) {
        field[i].className = 'invalid';
    }
    return false;
}

function estNonVide(champ) {
    if (!String(champ.value).length>0) {
        champ.className = 'invalid';
        return false;
    } else {
        champ.className = '';
        return true;
    }
}

function estDate(champ) {
    if (!(champ.value instanceof Date)) {
        champ.className = 'invalid';
    } else {
        champ.className = '';
    }
    return champ.value instanceof Date;
}

function estChaineLettres(champ) {
    let regex = /[^a-zA-Z-]/;
    if (!regex.test(champ.value)) {
        champ.className = 'invalid';
    } else {
        champ.className = '';
    }
    return regex.test(champ.value);
}

function estCourriel(champ) {
    let regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    if (!regex.test(String(champ.value))) {
        champ.className = 'invalid';
    } else {
        champ.className = '';
    }
    return regex.test(String(champ.value));
}

function estValide(dob,civ,nom,prenom,mail,date,fonction,sujet,contenu) {
    var validation = true;
    validation &= estDate(dob);
    validation &= (civ==null) ? estNull("civilite") : estNonVide(civ);
    validation &= estChaineLettres(nom);
    validation &= estChaineLettres(prenom);
    validation &= estCourriel(mail);
    validation &= estDate(date);
    validation &= (fonction==null) ? false : estNonVide(fonction);
    validation &= (sujet==null) ? false : estNonVide(sujet);
    validation &= (contenu==null) ? false : estNonVide(contenu);
    return validation;
}

function contactFormValide() {
    var dob = document.getElementById("dob");
    var civ = document.querySelector("input[name='civil']:checked");
    var nom = document.getElementById("nom");
    var prenom = document.getElementById("prenom");
    var mail = document.getElementById("email");
    var date = document.getElementById("date");
    var fonction = document.getElementById("fonction");
    var sujet = document.getElementById("sujet");
    var contenu = document.getElementById("contenu");

    if(estValide(dob,civ,nom,prenom,mail,date,fonction,sujet,contenu)) {
        alert("Formulaire envoyé");
        $('form').submit();
    } else {
        alert("Formulaire pas envoyé");
    }
}