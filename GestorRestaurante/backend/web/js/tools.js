 function mostrarInput() {
    var checkBoxTakeaway = document.getElementById("checkShow");
    var checkBoxRestaurante = document.getElementById("checkHide");
    var text_restaurante = document.getElementById("showRestaurante");
    var text_takeaway = document.getElementById("showTakeaway");


    if (checkBoxTakeaway.checked == true){

        text_takeaway.style.display = "block";
        text_restaurante.style.display = "none";
        document.getElementById('dropDownMesas').value = "";

    }else{
        document.getElementById('inputNome').value = "";
        text_takeaway.style.display = "none";
        text_restaurante.style.display = "block";
    }

}

/*
if(document.getElementById("checkHide").checked==true){

    document.getElementById("checkShow").checked=false;
}*/

 /* $(document.getElementById("checkShow")).mousedown(function () {
      document.getElementById("checkShow").checked=true;
      document.getElementById("checkHide").checked=false;;
  });
  $(document.getElementById("checkHide")).mousedown(function () {
      document.getElementById("checkHide").checked=true;
      document.getElementById("checkShow").checked=false;;
  });*/

