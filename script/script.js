
let i = 0;
var index;

function openForm() {
    if(i == 0){
        document.getElementById("formPop").style.display = "block";
        i++;
    } else {
        closeForm();
    }
}
  
function closeForm() {
    if(i == 1){
        document.getElementById("formPop").style.display = "none";
        i=0;
    }
}


function openForm2(index) {
    var formId = "formDelete_" + index;
    document.getElementById("formPop2").style.display = "block";
}


function openFormEdit() {
    document.getElementById("formPopupEdit").style.display = "block"; 
}
  
function closeFormEdit() {
    document.getElementById("formPopupEdit").style.display = "none";
}