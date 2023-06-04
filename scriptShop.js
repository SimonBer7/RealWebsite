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
                    <button class="btn btn-primary addToBag">KOUPIT</button>
                </div>
            </div>
        </div>
        `;
    }
}

class Obchod {
    constructor() {
        this.produkty = [];
        this.bag = [];
        this.getFromWeb();
    }

    addProdukt(produkt) {
        this.produkty.push(produkt);
    }

    addToBag(cardElement) {   
        this.bag.push(cardElement);
        this.ulozToLocalStorage();
        
    }

    printProducts() {
        let html = "";

        this.produkty.forEach(produkt => {
            html += produkt.getCard();
        });

        document.getElementById("shop").innerHTML = html;

        this.getEvent();
    }

    getEvent() {
        const cards = document.getElementsByClassName("card");
        for (let i = 0; i < cards.length; i++) {
            cards[i].addEventListener("click", () => {
                this.addToBag(this.produkty[i]);
            });
        }
        
    }

    ulozToLocalStorage() {
        console.log(this.bag);
        localStorage.setItem("produkty", JSON.stringify(this.bag));
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
                self.vymazLocalStorage();
                self.printProducts();
            },
            error: function () {
                alert('Chyba pøi spojení se stránkou');
            }
        });
    }
}

$(document).ready(function () {
    var obchod = new Obchod();

});
