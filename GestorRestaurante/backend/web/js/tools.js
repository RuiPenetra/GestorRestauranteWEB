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

 function sync(id_produto_selecionado)
 {
     var id_produto = document.getElementById('input_id_produto');
     id_produto.value = id_produto_selecionado.value;
 }

 function syncapagar(id_mesa_selecionado)
 {
     var id_mesa = document.getElementById('input_id_mesa');
     id_mesa.value = id_mesa_selecionado.value;
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
  });*/$(document).ready(function(){

     var current_fs, next_fs, previous_fs; //fieldsets
     var opacity;

     $(".next").click(function(){

         current_fs = $(this).parent();
         next_fs = $(this).parent().next();

//Add Class Active
         $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
         next_fs.show();
//hide the current fieldset with style
         current_fs.animate({opacity: 0}, {
             step: function(now) {
// for making fielset appear animation
                 opacity = 1 - now;

                 current_fs.css({
                     'display': 'none',
                     'position': 'relative'
                 });
                 next_fs.css({'opacity': opacity});
             },
             duration: 600
         });
     });