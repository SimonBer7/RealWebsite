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
        <div class="m-3 rounded">
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

    loadData() {
            if (localStorage.getItem("produkty") == null) {
                this.getFromWeb();
                console.log("Data byly nacteny z webu");

            } else if (localStorage.getItem("produkty") != null) {
                this.getFromLocalStorage();
                console.log("Data byly nacteny z local storage");

            } else {
                this.vymazLocalStorage();
                console.error("Data byly vymazany");
            }
        }

    ulozToLocalStorage() {
            localStorage.setItem("produkty", JSON.stringify(this.produkty));
    }

    vymazLocalStorage() {
            localStorage.removeItem("produkty");
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
                self.ulozToLocalStorage();
                self.printProducts();
            },
            error: function () { // error callback 
                alert('Error with connection to website');
            }
        });
    }

    getFromLocalStorage() {
            let self = this;
            let produkty = JSON.parse(localStorage.getItem("produkty"));

            produkty.forEach(produkt => {
                self.addProdukt(new Produkt(
                    produkt.nazev,
                    produkt.cena,
                    produkt.img
                ));

            });
            self.printProducts();
        }
}


$(document).ready(function (){
    var obchod = new Obchod();
});

