var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}



class Produkt {
    constructor(nazev, cena, img) {
        this.nazev = nazev;
        this.cena = cena;
        this.img = img;
    }


    getCard() {
        return ` 
        <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="${this.img}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">${this.nazev}</h5>
                        <p class="card-text">Cena: ${this.cena}</p>
                        <a href="#" class="btn btn-primary">KOUPIT</a>
                    </div>
                </div>
            </div>
        `;
    }

}

class Obchod {
    constructor() {
        this.produkty = [];
        this.getFromWeb();
    }

    addProdukt(produkt) {
        this.produkty.push(produkt);
    }

    printProducts() {
        let html = "";

        this.produkty.forEach(produkt => {
            html += produkt.getCard();
        });

        document.getElementById("shop").innerHTML = html;
    }


    getFromWeb() {
        let self = this;
        $.ajax({
            url: "https://raw.githubusercontent.com/SimonBer7/RealWebsite/main/produkty.json",
            dataType: "json",
            success: function (data) {
                data["produkty"].forEach(produkt => {

                    self.addProdukt(new Produkt(
                        produkt.nazev, 
                        produkt.cena,
                        produkt.img
                    ));
                    
                });
                self.printProducts();
            },
            error: function () { // error callback 
                alert('Error with connection to website');
            }
        });
    }
}


class Hrac {
    constructor(jmeno, prijmeni, cislo, vek, datum_narozeni, pozice, vyska, vaha, narodnost, img) {
        this.jmeno = jmeno;
        this.prijmeni = prijmeni;
        this.cislo = cislo;
        this.vek = vek;
        this.datum_narozeni = datum_narozeni;
        this.pozice = pozice;
        this.vyska = vyska;
        this.vaha = vaha;
        this.narodnost = narodnost;
        this.img = img;
    }


    getCard() {
        return ` 
        <div class="col md-3">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="${this.img}" alt="Avatar" style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <h1 id="jmeno">${this.jmeno} ${this.prijmeni}</h1>
                        <p id="datum_narozeni">${this.datum_narozeni}, (<span id="vek">${this.vek}</span> let)</p>
                        <p id="pozice">${this.pozice}</p>
                        <p>Číslo dresu: <span id="cislo_dresu">${this.cislo}</span></p>
                        <p>Výška: <span id="vyska">${this.vyska}</span></p>
                        <p>Váha: <span id="vaha">${this.vaha}</span></p>
                        <p>Národnost: <span id="narodnost">${this.narodnost}</span></p>
                    </div>
                </div>
            </div>
        </div>
        `;
    }


}


class Evidence {
    constructor() {
        this.hraci = [];
        this.loadData();
    }

    addHrac(hrac) {
        this.hraci.push(hrac);
    }


    loadData() {
        if (localStorage.getItem("hraci") == null) {
            this.getFromWeb();
            console.log("Data byly nacteny z webu");

        } else if (localStorage.getItem("hraci") != null) {
            this.getFromLocalStorage();
            console.log("Data byly nacteny z local storage");

        } else {
            this.vymazLocalStorage();
            console.error("Data byly vymazany");
        }
    }

    ulozToLocalStorage() {
        localStorage.setItem("hraci", JSON.stringify(this.hraci));
    }

    vymazLocalStorage() {
        localStorage.removeItem("hraci");
    }


    getFromWeb() {
        let self = this;
        $.ajax({
            url: "https://raw.githubusercontent.com/SimonBer7/RealWebsite/main/hraci.json",
            dataType: "json",
            success: function (data) {
                data["hraci"].forEach(hrac => {
                    
                    self.addHrac(new Hrac(
                        hrac.jmeno,
                        hrac.prijmeni,
                        hrac.cislo,
                        hrac.vek,
                        hrac.datum_narozeni,
                        hrac.pozice,
                        hrac.vyska,
                        hrac.vaha,
                        hrac.narodnost,
                        hrac.img
                    ));

                    
                    
                });
                
                //self.ulozToLocalStorage();
                self.printPlayers();
            },
            error: function () { // error callback 
                alert('Error with connection to website');
            }
        });

    }

    getFromLocalStorage() {
        let self = this;
        let hraci = JSON.parse(localStorage.getItem("hraci"));

        hraci.forEach(hrac => {
            self.addHrac(new Hrac(
                hrac.jmeno,
                hrac.prijmeni,
                hrac.cislo,
                hrac.vek,
                hrac.datum_narozeni,
                hrac.pozice,
                hrac.vyska,
                hrac.vaha,
                hrac.narodnost,
                hrac.img
            ));
            
        });
        self.printPlayers();
    }

    printPlayers() {
        let html = "";

        this.hraci.forEach(hrac => {
            html += hrac.getCard();
        });

        document.getElementById("hraci").innerHTML = html;
            
    }




}


$(document).ready(function () {
    var evidence = new Evidence();
    var obchod = new Obchod();

    $("#buttonHraci").click(function () {
        $("#panel").slideToggle();
    });


})














