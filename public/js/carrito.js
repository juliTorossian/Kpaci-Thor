
const sCant    = document.querySelectorAll('#sCant')
const preTot   = document.querySelectorAll('#preTotPrd')
const preInd   = document.querySelectorAll('#preIndPrd')

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
    if (cantidad > 1){
        cantidad -= 1;
        sCant[pos].innerHTML = cantidad.toString();
        //console.log(cantidad);
        //console.log('restar');
        actualizarPrecio(cantidad, pos);
    }
}

function actualizarPrecio(cantidad, pos){

    var aux = preInd[pos].innerHTML.split(' ');
    var precioInd = parseFloat(aux[1]);
    precioAct = (precioInd * cantidad).toFixed(2);

    preTot[pos].textContent = aux[0] +' ' +precioAct.toString();

    actualizaTotal();
}


function actualizaTotal(){
    const preTot   = document.querySelectorAll('#preTotPrd')
    const preTotal = document.querySelector('#preTotal')

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
    preTotal.textContent = aux[0] +' ' +precioTotal.toFixed(2);
}

//class carrito {

//Mostrar los productos guardados en el LS
function leerLocalStorage(usuario){
    console.log(usuario);

    let productosLS;
    const div = document.querySelector('#div-cards')
    const moneda = document.querySelector('#moneda').textContent;
    const sym_div = moneda.split(' ') 

    productosLS = this.obtenerProductosLocalStorage();
    if (productosLS.length === 0){
        div.innerHTML = 'Su carrito esta vacio';
    }else{
        var posicion = -1;
        productosLS.forEach(function (producto){
            if(producto.usuario === usuario){
                posicion += 1;
                var aux = producto.precio.split(' ');
                var precioInd = parseFloat(aux[1]);
                precioAct = (precioInd * producto.cantidad).toFixed(2);

                precioInd = precioInd / parseInt(sym_div[1]);
                precioAct = precioAct / parseInt(sym_div[1]);

                precioInd = sym_div[0] +' ' +precioInd.toFixed(2);
                precioAct = sym_div[0] +' ' +precioAct.toFixed(2);
                
                div.innerHTML += '<div class="card mb-2"><div class="card-body"><div class="row"><div class="col-3"><img src="'+producto.imagen +'" alt="imagen producto"></div><div class="col-3 my-auto"><h5 class="card-title">'+producto.nombre+'</h5></div><div class="col-2 my-auto"><div class="input-group mb-3"><a onclick="restar(' +posicion +')" class="btn btn-outline-secondary" type="button" id="bRestar">-</a><span class="input-group-text" id="sCant">'+producto.cantidad+'</span><a onclick="sumar('+posicion+')" class="btn btn-outline-secondary" type="button" id="bSumar">+</a></div></div><div class="col-2 my-auto text-center"><h5 style="border-right: 1px solid gray;" id="preIndPrd">'+precioInd+'</h5></div><div class="col-2 my-auto text-center"><h5 id="preTotPrd">' +precioAct +'</h5></div></div></div></div>';

                actualizaTotal();
            }else{
                div.innerHTML = 'Su carrito esta vacio';
            }
        });
    }
    
}   



















//----/-/-/--/-

    //Añadir producto al carrito
    function agregarProductoAlCarrito(pos){
        this.leerDatosProducto(pos);
    }

    //Leer datos del producto
    function leerDatosProducto(pos){
        const infoProducto = {
            imagen:   document.querySelectorAll('#imgPro')[pos].src,
            nombre:   document.querySelectorAll('#nomPro')[pos].textContent,
            precio:   document.querySelectorAll('#preIndPrd')[pos].textContent,
            id:       document.querySelectorAll('#nompro')[pos].getAttribute('data-id'),
            cantidad: document.querySelectorAll('#sCant')[pos].textContent
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
            //this.guardarProductosLocalStorage(infoProducto);
            console.log('Producto Insertado en el carrito');
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

//}


function trunc (x, posiciones = 0) {
    var s = x.toString()
    var l = s.length
    var decimalLength = s.indexOf('.') + 1
    var numStr = s.substr(0, decimalLength + posiciones)
    return Number(numStr)
  }