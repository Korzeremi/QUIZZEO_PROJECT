class Display{
    constructor(){
        this.logPart = document.querySelector(".log_part");
        this.subPart = document.querySelector(".sub_part");
        this.subBtn = document.querySelector(".sub_btn");
        this.logBtn = document.querySelector(".log_btn");
        this.canSubBtn = document.querySelector(".sub_cancel_btn");
        this.canLogBtn = document.querySelector(".log_cancel_btn");
        this.showLogPopUp();
        this.hideLogPopUp();
        this.showSubPopUp();
        this.hideSubPopUp();
    }

    showLogPopUp(){
        this.logBtn.addEventListener("click", () => {
            console.log("test");
            $(".log_part").css("visibility", "visible");
        })
    }

    hideLogPopUp(){
        this.canLogBtn.addEventListener("click", () => {
            $(".log_part").css("visibility", "hidden");
        })
    }

    showSubPopUp(){
        this.subBtn.addEventListener("click", () => {
            console.log("test");
            $(".sub_part").css("visibility", "visible");
        })
    }

    hideSubPopUp(){
        this.canSubBtn.addEventListener("click", () => {
            $(".sub_part").css("visibility", "hidden");
        })
    }
}

new Display();