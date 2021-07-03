
const productosList = document.querySelector ('.productos');
cargarEventos();

function cargarEventos(){
    if(productosList !== null){
        productosList.addEventListener('click', (e)=>{
            if(e.target.parentElement.classList.contains('add-favoritos')){
                addFavoritos(e);
            }else if(e.target.parentElement.classList.contains('eliminar-favoritos')){
                console.log(e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#nomPro'));
                eliminarFavoritos(e);
            }
        });
    }
}

function addFavoritos(e){
    // console.log(e.target.parentElement.parentElement);
    const productoid = e.target.parentElement.parentElement.parentElement.querySelector('#nomPro').getAttribute('name');
    
    $.post('index.php?controller=favoritoCON&action=agregarProductoCarrito', {"productoId" : productoid}, function(data){
        // console.log(data);
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        
        Toast.fire({
            icon: 'success',
            title: 'Agregado a favoritos'
        })
    });
}

function eliminarFavoritos(e){
    // console.log(e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#nomPro'));
    const productoid = e.target.parentElement.parentElement.parentElement.parentElement.querySelector('#nomPro').getAttribute('name');
    
    $.post('index.php?controller=favoritoCON&action=eliminarProductoCarrito', {"productoId" : productoid}, function(data){
        // console.log(data);
        location.reload();
    });
}