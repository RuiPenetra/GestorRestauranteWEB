
var table = document.getElementById("table-item-pedido"), sumVal=0;
var k;
for(var i = 1; i < table.rows.length; i++)
{
    sumVal = sumVal + parseFloat(table.rows[i].cells[2].innerHTML);
}
document.getElementById("val").innerHTML = sumVal;


function quantIncrement() {
        document.getElementById('inputQuantidade').value ++;

}
function quantDeincrement() {
    var val=document.getElementById('inputQuantidade').value;

    if(val!=0){
        document.getElementById('inputQuantidade').value --;
    }
}



 function calcularPreco() {
    var inputQuantidade = document.getElementById("inputQuantidade");
    var inputPreco = document.getElementById("inputPreco");
    var inputPrecoTotal = document.getElementById("inputPrecoTotal");

     document.getElementById("inputPrecoTotal").value=document.getElementById("inputQuantidade").value * document.getElementById("inputPreco").value;


}

 function produtoSelecionado(id) {


    if(document.getElementById("radio"+id).checked){

        document.getElementById("inputNome").value=document.getElementById("produtoNome"+id).textContent;
        document.getElementById("inputPreco").value=document.getElementById("produtoPreco"+id).textContent;
        document.getElementById("inputQuantidade").value='0,00';


    }
 }

 function unCkeck(id) {
     document.getElementById("teste"+id).checked=false;

     document.getElementById("inputQuantidade").value="";
     document.getElementById("inputPrecoTotal").value="";
 }
;