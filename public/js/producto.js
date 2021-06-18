
// const bComprar = document.querySelector('#comprar');

// bComprar.addEventListener('click', comprar);


// function comprar(){
    
// }

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
    console.log(cantidad);
    console.log('sumar');
    actualizarPrecio(cantidad, pos);
}

function restar(pos){
    var cantidad = parseInt(sCant[pos].innerHTML);
    if (cantidad > 0){
        cantidad -= 1;
        sCant[pos].innerHTML = cantidad.toString();
        console.log(cantidad);
        console.log('restar');
        actualizarPrecio(cantidad, pos);
    }
}

function actualizarPrecio(cantidad, pos){

    var aux = preInd[pos].innerHTML.split(' ');
    console.log(aux[1])
    var precioInd = parseFloat(aux[1]);
    console.log(precioInd.toString())
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