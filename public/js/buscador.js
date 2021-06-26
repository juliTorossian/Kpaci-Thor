
function buscar(){

    //console.log("hola");

    var categoria = document.querySelector("#categoria").value;
    var busqueda  = document.querySelector("#busqueda").value;

    console.log(categoria +" " +busqueda);

    if (busqueda !== ''){
        window.location.href = "index.php?controller=productoCON&action=verProductosFiltradosBusquda&cate=" +categoria +"&busqueda=" +busqueda +"";
    }

}


function filtrarPorCategorias(){

    var categorias = document.querySelectorAll('.filtro-categoria').checkbox;

    console.log(categorias);

}