
const bCambiar = document.querySelector('#bCambiarContrasenia');

bCambiar.addEventListener('click', () =>{
    const userPass       = document.querySelector('#contraseniaUsuario');
    const newPass        = document.querySelector('#newPass');
    const newPassRepeat  = document.querySelector('#newPassRepeat');

    $.post('index.php?controller=UsuarioCON&action=veficarContrasenia', {"password" : userPass.textContent}, function(data){
        console.log(data);
    });
});