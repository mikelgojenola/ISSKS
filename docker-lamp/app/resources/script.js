//NANaren konprobaketa
function konpNAN(dni) {
    var x = document.getElementById("nan")

    var regNAN = /^[0-9]{8}\-[A-Za-z]{1}$/;

    if (regNAN.test(dni)) {
        var zatiak = dni.split("-");
        var zenbakia = zatiak[0];
        var letra = zatiak[1].toUpperCase();
        letraT = letraKalk(zenbakia);

        if (letra != letraT) {
            alert("NAN hori ez da existitzen")
            x.value=""
            return false;
        } else {
            return true;
            
        }
    } else {
        alert("Hori ez da NAN formatu baliogarria")
        x.value=""
        return false;
    }
}


function letraKalk(zenbakia) {
    zenbakia = zenbakia % 23;
    var letraT = "TRWAGMYFPDXBNJZSQVHLCKET";
    return letraT.substring(zenbakia, zenbakia + 1);
}

//Telefonoaren konprobaketa
function konpTelefonoa(tlf) {
    var x = document.getElementById("tlf")

    if (/^[0-9]{9}$/.test(tlf)) {
        return true;

    } else {
        alert("Hori ez da Telefono formatu baliogarria")
        x.value=""
        return false;
    }
}

//emailaren konprobaketa

function konpEmail(email){
    var x = document.getElementById("email");
    if(/^[A-za-z0-9.]+@[a-z]+\.[a-z]+$/.test(email)){
        return true;
    }else{
        alert("Hori ez da email formatu baliogarria");
        x.value="";
        return false;
    }
}

function konpPsw(psw){
	var x = document.getElementById("psw");
	if(/^.{8,}$/.test(psw)){
		return true;
	} else {
	alert("Pasahitza insegurua, 8 digitu baino luzeagoa egin mesedez")
	x.value=""
	return false;
	}
}
//jokoak

function jokoaIkusi(){
    if(document.getElementById('kcd').checked) { 
        document.getElementById("infoJoko").innerHTML = 
        "<img src=img/kingdom.jfif height=100 width=140> Un jueguito medieval realista hijoputero";

        return true;

    }else if(document.getElementById("mc").checked){
        document.getElementById("infoJoko").innerHTML = 
        "<img src=img/minecraft.png height=100 width=100> Juego de minería y construcción para ratas ";


        return true;

    }else if(document.getElementById("vj").checked){
        document.getElementById("infoJoko").innerHTML = 
        "<img src=img/jager.jpg height=100 width=140> Obra maestra del mundo videojuegil, 10/10 GOTY ";


        return true;

    }else{
        alert("Ezer ez duzu hautatu")
        return false;
    }
}

function rellenar(izena, pegi, info, prezio, jData){
    var iz = document.getElementById("jIzena2");
    iz.value = izena;
    var p = document.getElementById("pegi2");
    p.value = pegi;
    var i = document.getElementById("info2");
    i.value = info;
    var pr = document.getElementById("prezioa2");
    pr.value = prezio;
    var d = document.getElementById("jData2");
    d.value = "Te rellenaste data";
}
