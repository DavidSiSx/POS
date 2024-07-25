let producto = [];
let cantidad = [];

$("#dataForm").submit(function(event){
    event.preventDefault();
    producto.push($(this).find('input[name="producto"]').val());
    cantidad.push($(this).find('input[name="cantidad"]').val());
    alert("Producto anadido");
});

function processData(){
    alert(`${producto} y ${cantidad}`);
}