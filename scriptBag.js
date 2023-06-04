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
                </div>
            </div>
        </div>
        `;
    }
}

class Obchod {
    constructor() {
        this.bag = [];
        this.getFromLocalStorage();
    }


    addToBag(produkt) {
        this.bag.push(produkt);

    }


    printToBag() {
        let html = "";
        console.log(this.bag);
        this.bag.forEach(produkt => {
            html += produkt.getCard();
        });
        document.getElementById("bag").innerHTML = html;
    }

    
    getFromLocalStorage() {
        let self = this;
        let produkty = JSON.parse(localStorage.getItem("produkty"));

        produkty.forEach(produkt => {
            self.addToBag(new Produkt(
                produkt.nazev,
                produkt.cena,
                produkt.img
            ));
        });
        self.printToBag();
    }
}

$(document).ready(function () {
    var obchod = new Obchod();

});
