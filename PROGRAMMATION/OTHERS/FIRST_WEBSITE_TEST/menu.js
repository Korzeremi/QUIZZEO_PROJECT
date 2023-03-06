const html = document.getElementsByTagName("html")[0];
const themeSwicth = document.getElementById("themeLogo");


themeSwicth.addEventListener("click", () => {
html.classList.toggle("nuit");
if (html.classList.contains("nuit")) {
    themeSwicth.innerHTML = "&#9788;";
} else {
    themeSwicth.innerHTML = "&#9789;";
}
});


class Display{
    constructor(){
        this.boite = document.querySelector(".container1");
        

        this.pop();
    }

    pop(){
        this.boite.addEventListener("mouseenter", (event)=> {
            console.log("oui")
            $("#texte1").css("visibility", "visible");
        })

        this.boite.addEventListener("mouseleave", (event)=> {
            console.log("oui")
            $("#texte1").css("visibility", "hidden");
            // this.pop = true;
        })
        
    }

}




new Display()



