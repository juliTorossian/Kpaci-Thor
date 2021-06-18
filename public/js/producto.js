
const sCant    = document.querySelectorAll('#sCant')
const preTot   = document.querySelectorAll('#preTotPrd')
const preInd   = document.querySelectorAll('#preIndPrd')
//const preTotal = document.querySelector('#preTotal')

var cantidad = parseInt(sCant.innerHTML,2);
//console.log(cantidad);

//bSumar.addEventListener('click', sumar);
//bRestar.addEventListener('click', restar);

function sumar(pos){
    var cantidad = parseInt(sCant[pos].innerHTML);
    cantidad += 1;
    sCant[pos].innerHTML = cantidad.toString();
    //console.log(cantidad);
    //console.log('sumar');
    actualizarPrecio(cantidad, pos);
}

function restar(pos){
    var cantidad = parseInt(sCant[pos].innerHTML);
    if (cantidad > 0){
        cantidad -= 1;
        sCant[pos].innerHTML = cantidad.toString();
        //console.log(cantidad);
        //console.log('restar');
        actualizarPrecio(cantidad, pos);
    }
}

function actualizarPrecio(cantidad, pos){

    var aux = preInd[pos].innerHTML.split(' ');
    //console.log(aux[1])
    var precioInd = parseFloat(aux[1]);
    //console.log(precioInd.toString())
    precioAct = (precioInd * cantidad).toFixed(2);

    preTot[pos].textContent = aux[0] +' ' +precioAct.toString();

    //actualizaTotal();
}


function actualizaTotal(){
    //const preTotSec  = document.querySelectorAll('#preTotPrd')
    
    var precioTotal = 0;
    var count = 0;
    var aux;
    while(count < preTot.length){
        aux = preTot[count].innerHTML.split(' ');  
        //console.log(aux);
        precioTotal += parseFloat(aux[1]);
        count++;
    }

    //console.log(aux[0] +' ' +precioTotal);
    preTotal.textContent = aux[0] +' ' +precioTotal;
}




function agregarProductoAlCarrito(pos, idPro, usuario){
    this.leerDatosProducto(pos, idPro);
}

//Leer datos del producto
function leerDatosProducto(pos, idPro, usuario){

    var imgPro = document.querySelectorAll('#imgPro');
    var nomPro = document.querySelectorAll('#nomPro');
    var prePro = document.querySelectorAll('#preIndPrd');
    var canPro = document.querySelectorAll('#sCant');

    const infoProducto = {
        usuario:  usuario,
        imagen:   imgPro[pos].src,
        nombre:   nomPro[pos].textContent,
        precio:   prePro[pos].textContent,
        id:       idPro,
        cantidad: canPro[pos].textContent
    }
    let productosLS;
    productosLS = this.obtenerProductosLocalStorage();
    productosLS.forEach(function (productoLS){
        if(productoLS.id === infoProducto.id){
            productosLS = productoLS.id;
        }
    });

    if(productosLS === infoProducto.id){
        // Swal.fire({
        //     type: 'info',
        //     title: 'Oops...',
        //     text: 'El producto ya está agregado',
        //     showConfirmButton: false,
        //     timer: 1000
        // })
        console.log('Ya existe el producto');
    }
    else {
        //this.insertarCarrito(infoProducto);
        this.guardarProductosLocalStorage(infoProducto);
        //console.log('Producto Insertado en el carrito');
    }

}

//Eliminar producto por ID del LS
function eliminarProductoLocalStorage(productoID){
    let productosLS;
    //Obtenemos el arreglo de productos
    productosLS = this.obtenerProductosLocalStorage();
    //Comparar el id del producto borrado con LS
    productosLS.forEach(function(productoLS, index){
        if(productoLS.id === productoID){
            productosLS.splice(index, 1);
        }
    });

    //Añadimos el arreglo actual al LS
    localStorage.setItem('productos', JSON.stringify(productosLS));
}

//Almacenar en el LS
function guardarProductosLocalStorage(producto){
    let productos;
    //Toma valor de un arreglo con datos del LS
    productos = this.obtenerProductosLocalStorage();
    console.log(productos);
    //Agregar el producto al carrito
    productos.push(producto);
    //Agregamos al LS
    localStorage.setItem('productos', JSON.stringify(productos));
}

//Comprobar que hay elementos en el LS
function obtenerProductosLocalStorage(){
    let productoLS;

    //Comprobar si hay algo en LS
    if(localStorage.getItem('productos') === null){
        productoLS = [];
    }
    else {
        productoLS = JSON.parse(localStorage.getItem('productos'));
    }
    return productoLS;
}

//Eliminar todos los datos del LS
function vaciarLocalStorage(){
    localStorage.clear();
}