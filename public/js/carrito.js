

class Carrito{
    // CANTIDADES DEL CARRITO

    sumarCantidad(e){//pos, idpro, usuario

        const producto = e.target.parentElement.querySelector('#sCant');
        // console.log(usuario);
        // console.log(idProducto);
        // console.log('');

        //console.log(e);

        var cantidad = parseInt(producto.textContent);
        cantidad += 1;
        producto.textContent = cantidad.toString();
        //console.log(cantidad);
        //console.log('sumar');
        this.actualizarPrecio(e, cantidad);
        // console.log('antes de actualizar (s)');
        this.actualizarProductoCarrito(e);
    }
    
    restarCantidad(e){//pos, idpro, usuario

       
        const producto = e.target.parentElement.querySelector('#sCant');
        //console.log(e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#nomPro'));
        const idProducto = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#nomPro').getAttribute('name');
        const usuario = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#nomPro').getAttribute('usuario');
        // console.log(producto);
        // console.log('');
        
        var cantidad = parseInt(producto.textContent);
        if (cantidad > 0){
            cantidad -= 1;
            producto.textContent = cantidad.toString();
            //console.log(cantidad);
            //console.log('restar');
            this.actualizarPrecio(e, cantidad);
            if (cantidad > 0){
                // console.log('antes de actualizar (r)');
                this.actualizarProductoCarrito(e);
            }else{
                //preguntar si desea eliminar el producto
                if(this.existeProductoLS(idProducto)){
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
                            this.eliminarProductoLocalStorage(idProducto);
                            Swal.fire(
                            'Eliminado!',
                            'Producto eliminado del carrito',
                            'success'
                            )
                        }
                        if(this.filename() === 'index.php?controller=carritoCON&action=miCarrito'){
                            this.actualizarProductosEnCarrito(e,usuario);
                        }
                    })
                }
            }
        }
    }

    // PRECIOS DE LOS PRODUCTOS

    // PRECIO TOTAL DEL PRODUCTO * CANTIDAD
    actualizarPrecio(e, cantidad){

        const producto = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#preIndPrd');
        const procioProductoTotal = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#preTotPrd');
        // console.log(producto.textContent);
        var aux = producto.textContent.split(' ');
        //console.log(aux[1])
        var precioInd = parseFloat(aux[1]);
        //console.log(precioInd.toString())
        var precioAct = (precioInd * cantidad).toFixed(2);
    
        procioProductoTotal.textContent = aux[0] +' ' +precioAct.toString();
    
        if(this.filename() === 'index.php?controller=carritoCON&action=miCarrito'){
            this.actualizaTotal();
        }
    }
    
    // PRECIO TOTAL DE TODOS LOS PRODUCTOS
    actualizaTotal(){
        //const preTotSec  = document.querySelectorAll('#preTotPrd')
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
        preTotal.textContent = aux[0] +' ' +precioTotal;
    }

    agregarProductoAlCarrito(e){
        this.leerDatosProducto(e, 'A');// A - agregado
    }
    
    actualizarProductoCarrito(e){
        e = e.target.parentElement.parentElement.parentElement;
        //console.log(e);
        const idProducto = e.parentElement.querySelector('#nomPro').getAttribute('name');
        console.log(idProducto)
        console.log(this.existeProductoLS(idProducto))
        if(this.existeProductoLS(idProducto)){
            console.log('actualizando producto')
            this.eliminarProductoLocalStorage(idProducto);
            this.leerDatosProducto(e, 'M'); //M - modificacion
        }
    }
    
    //Leer datos del producto
    leerDatosProducto(e, origen){
        var producto = null;
        if(origen === 'M'){
            producto = e.parentElement;
        }else{
            producto = e.target.parentElement;
        }
        //console.log(producto);

        const infoProducto = {
            usuario:  producto.querySelector('#nomPro').getAttribute('usuario'),
            imagen:   producto.querySelector('#imgPro').src,
            nombre:   producto.querySelector('#nomPro').textContent,
            precio:   producto.querySelector('#preIndPrd').textContent,
            id:       producto.querySelector('#nomPro').getAttribute('name'),
            cantidad: producto.querySelector('#sCant').textContent
        }

        console.log(infoProducto);
        
        // console.log(this.existeProductoLS(infoProducto.id));
        if(this.existeProductoLS(infoProducto.id)){
            Swal.fire({
                //type: 'info',
                title: 'Oops...',
                text: 'El producto ya está agregado',
                showConfirmButton: false,
                timer: 2000
            })
            // console.log('Ya existe el producto');
        }
        else {
            if(parseInt(infoProducto.cantidad) < 1){
                console.log('la cantidad no puede ser 0');
            }else{
                //this.insertarCarrito(infoProducto);
                this.guardarProductosLocalStorage(infoProducto, origen);
                // console.log('Producto Insertado en el carrito');
            }
        }
    }

    existeProductoLS(idProducto){
        var aux = false;
        var productosLS;
        productosLS = this.obtenerProductosLocalStorage();
        productosLS.forEach(function (productoLS){
            if(productoLS.id === idProducto){  
                aux = (productoLS.id === idProducto);
            }
        });
        return aux;
    }
    
    //Eliminar producto por ID del LS
    eliminarProductoLocalStorage(productoID){
        var productosLS;
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
        var productos;
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
        var productoLS;
    
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

    mostrarProductosEnCarrito(usuario){
        console.log(usuario);
    
        var productosLS;
        const div = document.querySelector('#div-cards')
        const moneda = document.querySelector('#moneda').textContent;
        const sym_div = moneda.split(' ') 
    
        productosLS = this.obtenerProductosLocalStorage();
        var posicion = -1;
        var vacio = true;
        productosLS.forEach(function (producto){
            if(producto.usuario === usuario){
                vacio = false;
                posicion += 1;
                var aux = producto.precio.split(' ');
                var precioInd = parseFloat(aux[1]);
                var precioAct = (precioInd * producto.cantidad).toFixed(2);
    
                precioInd = precioInd / parseInt(sym_div[1]);
                precioAct = precioAct / parseInt(sym_div[1]);
    
                precioInd = sym_div[0] +' ' +precioInd.toFixed(2);
                precioAct = sym_div[0] +' ' +precioAct.toFixed(2);
                
                div.innerHTML += '<div class="card mb-2"><div class="card-body"><div class="row"><div class="col-3"><img id="imgPro" src="'+producto.imagen +'" alt="imagen producto"></div><div class="col-3 my-auto"><h5 class="card-title" id="nomPro" name="'+producto.id+'" usuario="' +producto.usuario +'">'+producto.nombre+'</h5></div><div class="col-2 my-auto"><div class="input-group mb-3"><a class="btn btn-outline-secondary bRestar" type="button" id="bRestar">-</a><span class="input-group-text" id="sCant">'+producto.cantidad+'</span><a class="btn btn-outline-secondary bSumar" type="button" id="bSumar">+</a></div></div><div class="col-2 my-auto text-center"><h5 style="border-right: 1px solid gray;" id="preIndPrd">'+precioInd+'</h5></div><div class="col-2 my-auto text-center"><h5 id="preTotPrd">' +precioAct +'</h5></div></div></div></div>';
    
                
            }
            
            if(vacio){
                div.innerHTML = 'Su carrito esta vacio';
            }
        });
        if(!vacio){
            this.actualizaTotal();
        }
    }

    actualizarProductosEnCarrito(e, usuario){
        e.target.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.innerHTML = '';
        this.mostrarProductosEnCarrito(usuario);
    }

    filename(){
		var rutaAbsoluta = self.location.href;   
		var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
		var rutaRelativa = rutaAbsoluta.substring( posicionUltimaBarra + "/".length , rutaAbsoluta.length );
		return rutaRelativa;  
	}

    actualizarCantidadesDeLosProductos(){
        const cantidades = document.querySelectorAll('#sCant');
        console.log(cantidades)

        const productosLS = this.obtenerProductosLocalStorage();

        cantidades.forEach(function(cantProducto){
            const idProducto = cantProducto.getAttribute('name');
            productosLS.forEach(function(productoLS){
                if(productoLS.id === idProducto){
                    cantProducto.textContent = productoLS.cantidad;
                }
            });
        });

        
    }

}








