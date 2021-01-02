
var table = document.getElementById("table-item-pedido"), sumVal=0;
var k;
for(var i = 1; i < table.rows.length; i++)
{
    sumVal = sumVal + parseFloat(table.rows[i].cells[4].innerHTML);
}
document.getElementById("val").innerHTML = sumVal;

if(document.getElementById('inputQuantidade'+id).value=""){
    document.getElementById('inputPrecoTotal'+id).value ="";
}


if(document.getElementById('tipo_restaurante').checked==true){

    document.getElementById('tipo_restaurante').style.display = "block";
}else{
    document.getElementById('tipo_restaurante').style.display = "none";
    document.getElementById('tipo_restaurante').style.display = "none";

}


function quantIncrement(id,preco) {

    document.getElementById('inputQuantidade'+id).value ++;
    document.getElementById("inputPrecoTotal"+id).value=document.getElementById("inputQuantidade"+id).value *preco;

}
function quantDeincrement(id,preco) {

    if(document.getElementById('inputQuantidade'+id).value>=1 ){
        document.getElementById('inputQuantidade'+id).value= document.getElementById('inputQuantidade'+id).value-1;

        if(document.getElementById('inputQuantidade'+id).value>0){
            document.getElementById("inputPrecoTotal"+id).value=document.getElementById("inputQuantidade"+id).value *preco;

        }else{
            document.getElementById('inputQuantidade'+id).value="";
            document.getElementById('inputPrecoTotal'+id).value="";

        }

    }else{
        document.getElementById('inputQuantidade'+id).value="";
        document.getElementById('inputPrecoTotal'+id).value="";
    }
}

function quantEntreIncrement(id) {

    document.getElementById('inputQuantEntregue'+id).value ++;
}
function quantEntreDeincrement(id) {

    if(document.getElementById('inputQuantEntregue'+id).value>=1 ){
        document.getElementById('inputQuantEntregue'+id).value= document.getElementById('inputQuantEntregue'+id).value-1;

    }else{
        document.getElementById('inputQuantEntregue'+id).value="0";
    }
}

function calcularPreco(id,preco) {
    var inputQuantidade = document.getElementById("inputQuantidade"+id);

     document.getElementById("inputPrecoTotal"+id).value=inputQuantidade *preco;


}

 function produtoSelecionado(id) {


    if(document.getElementById("radio"+id).checked){

        document.getElementById("inputNome").value=document.getElementById("produtoNome"+id).textContent;
        document.getElementById("inputPreco").value=document.getElementById("produtoPreco"+id).textContent;
        document.getElementById("inputQuantidade").value='0,00';


    }
 }

 function unCheck(id) {
     document.getElementById("radio"+id).checked=false;

     document.getElementById("inputQuantidade").value="";
     document.getElementById("inputPrecoTotal").value="";
 }

function showDivRestaurante() {

    var radioRestaurante = document.getElementById("radio-restaurante");
    var radioTakeaway = document.getElementById("radio-takeaway");
    var divRestaurante = document.getElementById("div-restaurante");
    var divTakeaway = document.getElementById("div-takeaway");

    if(radioRestaurante.checked===true){
        divRestaurante.style.display = "block";
        divTakeaway.style.display="none";
    }else{
        divRestaurante.style.display = "none";
        divTakeaway.style.display="block";


    }

}

function showDivTakeaway() {
    var radioRestaurante = document.getElementById("radio-restaurante");
    var radioTakeaway = document.getElementById("radio-takeaway");
    var divRestaurante = document.getElementById("div-restaurante");
    var divTakeaway = document.getElementById("div-takeaway");

    if(radioTakeaway.checked===true){
        divRestaurante.style.display = "none";
        divTakeaway.style.display="block";
    }else{
        divRestaurante.style.display = "block";
        divTakeaway.style.display="none";


    }
}