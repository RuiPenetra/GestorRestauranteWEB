 function mostrarInput() {
    var checkBoxTakeaway = document.getElementById("checkShow");
    var checkBoxRestaurante = document.getElementById("checkHide");
    var text = document.getElementById("show");
    if (checkBoxTakeaway.checked == true){
        text.style.display = "block";
    } else {
        document.getElementById('inputNome').value = "";
        if(checkBoxRestaurante.checked == true){
            text.style.display = "none";
        }
    }
}