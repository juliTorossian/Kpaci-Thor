

class Carrito{




    // CANTIDADES DEL CARRITO

    sumarCantidad(pos, idpro, usuario){
        var cantidad = parseInt(sCant[pos].innerHTML);
        cantidad += 1;
        sCant[pos].innerHTML = cantidad.toString();
        //console.log(cantidad);
        //console.log('sumar');
        actualizarPrecio(cantidad, pos);
        actualizarProductoCarrito(pos, idpro, usuario);
    }
    
    restarCantidad(pos, idpro, usuario){
        var cantidad = parseInt(sCant[pos].innerHTML);
        if (cantidad > 0){
            cantidad -= 1;
            sCant[pos].innerHTML = cantidad.toString();
            //console.log(cantidad);
            //console.log('restar');
            actualizarPrecio(cantidad, pos);
            if (cantidad > 0){
                actualizarProductoCarrito(pos, idpro,usuario);
            }else{
                //preguntar si desea eliminar el producto
                if(existeProductoLS(idpro)){
                    Swal.fire({
                        title: 'Esta seguro?',
                        text: "Seguro desea eliminar este producto del carrito",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, eliminarlo!'
                    }).then((result) => {
                        //si desea, eliminarlo
                        if (result.isConfirmed) {
                            eliminarProductoLocalStorage(idpro);
                            Swal.fire(
                            'Eliminado!',
                            'Producto eliminado del carrito',
                            'success'
                            )
                        }
                    })
                }
            }
        }
    }

    // PRECIOS DE LOS PRODUCTOS

    // PRECIO TOTAL DEL PRODUCTO * CANTIDAD
    actualizarPrecio(cantidad, pos){

        var aux = preInd[pos].innerHTML.split(' ');
        //console.log(aux[1])
        var precioInd = parseFloat(aux[1]);
        //console.log(precioInd.toString())
        precioAct = (precioInd * cantidad).toFixed(2);
    
        preTot[pos].textContent = aux[0] +' ' +precioAct.toString();
    
        //actualizaTotal();
    }
    
    // PRECIO TOTAL DE TODOS LOS PRODUCTOS
    actualizaTotal(){
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

    agregarProductoAlCarrito(pos, idPro, usuario){
        this.leerDatosProducto(pos, idPro, usuario, 'A');// A - agregado
    }
    
    actualizarProductoCarrito(pos, idProducto, usuario){
        if(existeProductoLS(idProducto)){
            console.log('actualizando producto')
            eliminarProductoLocalStorage(idProducto);
            leerDatosProducto(pos, idProducto, usuario, 'M'); //M - modificacion
        }
    }
    
    //Leer datos del producto
    leerDatosProducto(pos, idPro, usuario, origen){

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
        
        console.log(existeProductoLS(infoProducto.id));
        if(existeProductoLS(infoProducto.id)){
            Swal.fire({
                //type: 'info',
                title: 'Oops...',
                text: 'El producto ya está agregado',
                showConfirmButton: false,
                timer: 2000
            })
            console.log('Ya existe el producto');
        }
        else {
            if(parseInt(infoProducto.cantidad) < 1){
                console.log('la cantidad no puede ser 0');
            }else{
                //this.insertarCarrito(infoProducto);
                this.guardarProductosLocalStorage(infoProducto, origen);
                //console.log('Producto Insertado en el carrito');
            }
        }
    }

    existeProductoLS(idProducto){
        var aux = false;
        let productosLS;
        productosLS = obtenerProductosLocalStorage();
        productosLS.forEach(function (productoLS){
            aux = (productoLS.id === idProducto);
        });
        return aux;
    }
    
    //Eliminar producto por ID del LS
    eliminarProductoLocalStorage(productoID){
        let productosLS;
        //Obtenemos el arreglo de productos
        productosLS = this.obtenerProductosLocalStorage();
        //Comparar el id del producto borrado con LS
        productosLS.forEach(function(productoLS, index){
            if(productoLS.id === productoID){
                console.log('eliminando: ' +productoLS)
                productosLS.splice(index, 1);
            }
        });
    
        //Añadimos el arreglo actual al LS
        localStorage.setItem('productos', JSON.stringify(productosLS));
    }
    
    //Almacenar en el LS
    guardarProductosLocalStorage(producto,origen){
        let productos;
        //Toma valor de un arreglo con datos del LS
        productos = this.obtenerProductosLocalStorage();
        console.log(productos);
        //Agregar el producto al carrito
        productos.push(producto);
        //Agregamos al LS
        localStorage.setItem('productos', JSON.stringify(productos));
        if(origen === 'A'){ // A - agregado
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Agregado al carrito',
                showConfirmButton: false,
                timer: 1500
            })
        }
    }
    
    //Comprobar que hay elementos en el LS
    obtenerProductosLocalStorage(){
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
    vaciarLocalStorage(){
        localStorage.clear();
    }

}



const sCant    = document.querySelectorAll('#sCant')
const preTot   = document.querySelectorAll('#preTotPrd')
const preInd   = document.querySelectorAll('#preIndPrd')
//const preTotal = document.querySelector('#preTotal')

var cantidad = parseInt(sCant.innerHTML,2);
//console.log(cantidad);

//bSumar.addEventListener('click', sumar);
//bRestar.addEventListener('click', restar);










