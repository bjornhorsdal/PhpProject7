function valider_telefon(){
    var telefon = document.getElementById("telefon").value;
    var regexTelefon = /^[\d]+$/;
    var telefonOk = regexTelefon.test(telefon);
    if (!telefonOk){
        alert ("Telefonummer må bare bestå av tall");
    }
    return telefonOk;  
}
    
function valider_epost(){
    var epost = document.getElementById("epost").value;
    var regexEpost = /@/;
    var epostOk = regexEpost.test(epost);
    if (!epostOk){
        alert ("E-post må inneholde alfakrøll");
    }
    return epostOk;  
}

function valider_navn(){
    var navn = document.getElementById("navn").value;
    var regexNavn = /./;
    var navnOk = regexNavn.test(navn);
    if (!navnOk){
        alert ("Skriv inn navn");
    }
    return navnOk;  
}

function valider_brukerNavn(){
    var brukerNavn = document.getElementById("brukerNavn").value;
    var regexbrukerNavn = /./;
    var brukerNavnOk = regexbrukerNavn.test(brukerNavn);
    if (!brukerNavnOk){
        alert ("Skriv inn brukernavn!");
    }
    return brukerNavnOk;  
}

function valider_passord(){
    var passord = document.getElementById("passord").value;
    var regexpassord = /./;
    var passordOk = regexpassord.test(passord);
    if (!passordOk){
        alert ("Skriv inn passord!");
    }
    return passordOk;  
}


function valider_opplysninger(){
    var telefonOk=valider_telefon();
    var epostOk=valider_epost();
    var navnOk=valider_navn();
    return telefonOk && epostOk && navnOk;
}

function valider_administrator(){
    var brukerNavnOk=valider_brukerNavn();
    var passordOk=valider_passord();
    return brukerNavnOk && passordOk;
}