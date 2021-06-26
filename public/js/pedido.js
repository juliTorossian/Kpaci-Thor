const carrito = new Carrito();
const productos = document.querySelector('.productos');
cargarEventos();

function cargarEventos(){
    if(productos !== null){
        productos.addEventListener('click', (e)=>{
            if(e.target.classList.contains('bSumar')){
                carrito.sumarCantidad(e);
            }else if (e.target.classList.contains('bRestar')){
                carrito.restarCantidad(e);
            }else if(e.target.classList.contains('comprar')){
                carrito.agregarProductoAlCarrito(e);
            }
    
        });
    }
}

function mostrarProductosEnCarrito(usuario){
    carrito.mostrarProductosEnCarrito(usuario);
}

function actualizarCantidades(){
    carrito.actualizarCantidadesDeLosProductos();
}