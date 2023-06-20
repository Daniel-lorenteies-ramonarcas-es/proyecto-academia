// document.addEventListener('DOMContentLoaded',getNuemrodePersonas);
// async function  getNuemrodePersonas(){
//     const  numero = await getNumero();
//     console.log(numero);
//     const nPersonas= document.querySelector('#nInputnumeropersonas');
//     nPersonas.setAttribute('value',`${numero}`);
//     }
// async function getNumero(){
//     const id=window.sessionStorage.getItem('id_hotel');
//     const url= `http://localhost/myHotel/datos/read_hotel.php?id_hotel=${id}`;
//     const response= await fetch(url);
//     const data= await response.json();
//     return data.datos_hotel[0].numero_personas;
// }