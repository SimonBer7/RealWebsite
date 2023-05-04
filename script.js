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

class Hrac {
    constructor(jmeno, prijmeni, cislo, vek, datum_narozeni, pozice, vyska, vaha, narodnost, img) {
        this.jmeno = jmeno;
        
    }
}





$.ajax({
    url: "https://raw.githubusercontent.com/SimonBer7/RealWebsite/main/hraci.json",
    dataType: "json",
    success: function (data) {
        console.log(data);

    },
    error: function () { // error callback 
        alert('Error with connection to website');
    }
});





