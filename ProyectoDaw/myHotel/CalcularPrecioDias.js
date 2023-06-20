 document.addEventListener('DOMContentLoaded',setup);


 function setup(){
    const nifechanicio= document.querySelector('#ndatefechainicio');
    const nifin= document.querySelector('#ndatefechafin');
    let fecha_inicio='';
    let fecha_fin='';

    nifechanicio.addEventListener('change',guardarFechaInicio);
    nifechanicio.addEventListener('change',CalcularPrecioTotal);

    nifin.addEventListener('change',guardarFechaFin);
    nifin.addEventListener('change',CalcularPrecioTotal);

    let precio_dia=0;
    //let dias= CalcularDias(fecha_inicio,fecha_fin);
   // console.log(dias);
    const ninputPrecioTotal= document.querySelector('#nInputprecioTotal');
    //ninputPrecioTotal.setAttribute('value',`${CalcularPreciTotal()}`);

    function CalcularPrecioTotal(e){
        const precio_dia= document.querySelector('#nInputprecioDia');
         console.log(precio_dia.value);
        let dias=0;
        let precio_Total=0;
        if( (fecha_inicio!=='') && (fecha_fin!=='')){
            let diasDiferencia=fecha_fin- fecha_inicio;
            if( diasDiferencia>0){
                dias = diasDiferencia/1000/60/60/24;
                // const ninputPrecioTotal= document.querySelector('#nInputprecioTotal');
                // precio_Total= parseFloat(dias)* parseFloat( hotel.precio_dia);
                // ninputPrecioTotal.setAttribute('value',`${precio_Total.toFixed(2)} €`);
            }
                const ninputPrecioTotal= document.querySelector('#nInputprecioTotal');
                precio_Total= parseFloat(dias)* parseFloat(precio_dia.value);
                ninputPrecioTotal.setAttribute('value',`${precio_Total.toFixed(2)} €`);
                console.log(precio_Total.toFixed(2));
            
        }
    }

    function guardarFechaInicio(e){
        const nifin= document.querySelector('#ndatefechafin');
        const nifechanicio= document.querySelector('#ndatefechainicio');
        let hoy= new Date();
       let year = hoy.getFullYear();
       let mes = hoy.getMonth() + 1;
       let dia = hoy.getDate();
        
        if (mes < 10) {
          mes= '0' + mes;
        }
      
        if (dia < 10) {
          dia = '0' + dia;
        }
        const fechaActual=`${year}-${mes}-${dia}`;
       if(fechaActual<=e.target.value){
        fecha_inicio=new Date (e.target.value);
       }
      
       nifechanicio.setAttribute('value',`${fechaActual}`);
       nifin.setAttribute('min',`${fecha_inicio}`);
       //CalcularDias(fecha_inicio,fecha_fin)
    }
    
    function guardarFechaFin(e){
        const fechanicio= document.querySelector('#ndatefechainicio').value;
        const nifin= document.querySelector('#ndatefechafin');
        let hoy= new Date();
       let year = hoy.getFullYear();
       let mes = hoy.getMonth() + 1;
       let dia = hoy.getDate();
        
        if (mes < 10) {
          mes= '0' + mes;
        }
      
        if (dia < 10) {
          dia = '0' + dia;
        }
        const fechaActual=`${dia}/${mes}/${year}`;
        if(fechaActual<=e.target.value){
            fecha_fin=new Date (e.target.value);
        }
        nifin.setAttribute('min',`${fechanicio}`);
        nifin.setAttribute('value',`${fechaActual}`);
        //CalcularDias(fecha_inicio,fecha_fin)
    }
 }

//     function  setup(){
//     const nifechanicio=document.querySelector('#ndatefechainicio') ;
//     const nifechasalida=document.querySelector('#ndatefechafin');

//     // if( (nifechanicio.value!='') && (nifechasalida.value!='')){
//     //     CalcularPrecioDias(nifechanicio,nifechasalida);
//     // }
//     let fecha_inicio='';
//     let fecha_fin='';
//     nifechanicio.addEventListener('change',guardarFechaInicio);
//     nifechanicio.addEventListener('change',CalcularPrecioTotal);

//     nifechasalida.addEventListener('change',guardarFechaFin);
//     nifechasalida.addEventListener('change',CalcularPrecioTotal);


//     function guardarFechaInicio(e){
//         const fecha= e.timeStamp;
//         const nifechanicio= document.querySelector('#ndatefechainicio');
//     //     const fechaActual=`${year}-${mes}-${dia}`;
//     //    if(fechaActual<=e.target.value){
//     //     fecha_inicio=new Date (e.target.value);
//     //    }
//     //    nifechanicio.setAttribute('value',`${fecha_inicio}`);
//        //CalcularDias(fecha_inicio,fecha_fin)

//        fecha_inicio=  fecha;
//     //    console.log(fecha_fin.getTime())
//     }

//     function guardarFechaFin(e){
//         const fecha= e.timeStamp;
       
//         const nifechanicio= document.querySelector('#ndatefechafin');
//     //     const fechaActual=`${year}-${mes}-${dia}`;
//     //    if(fechaActual<=e.target.value){
//     //     fecha_inicio=new Date (e.target.value);
//     //    }

//     fecha_fin=  fecha;
//     // console.log(fecha_fin.getTime())
//     //    nifechanicio.setAttribute('value',`${fecha_fin}`);
//        //CalcularDias(fecha_inicio,fecha_fin)
//     }

//     function CalcularPrecioTotal(e){
//         const precio_dia= document.querySelector('#nInputprecioDia').value;
//         let dias=0;
//         let precio_Total=0;
//         if( (fecha_inicio!=='') && (fecha_fin!=='')){
//             let diasDiferencia= (fecha_fin -fecha_inicio) ;
//             if( diasDiferencia>0){
//                 dias = diasDiferencia  /(1000*60*60*24);;
//                 // const ninputPrecioTotal= document.querySelector('#nInputprecioTotal');
//                 // precio_Total= parseFloat(dias)* parseFloat( hotel.precio_dia);
//                 // ninputPrecioTotal.setAttribute('value',`${precio_Total.toFixed(2)} €`);
//             }
//                 const ninputPrecioTotal= document.querySelector('#nInputprecioTotal');
//                 precio_Total= parseFloat(dias)* parseFloat( precio_dia);
//                 ninputPrecioTotal.setAttribute('value',`${precio_Total.toFixed(2)} €`);
            
//         }
//     }
//     }

//     // function CalcularPrecioDias(fecha_inicio,fecha_fin){
//     //     let dias=0;
//     //     let precio_Total=0;
//     //     if( (fecha_inicio.timeStamp!=='') && (fecha_fin.timeStamp!=='')){
//     //         let diasDiferencia=fecha_fin.timeStamp- fecha_inicio.timeStamp;
//     //         if( diasDiferencia>0){
//     //             dias = diasDiferencia/1000/60/60/24;
//     //             // const ninputPrecioTotal= document.querySelector('#nInputprecioTotal');
//     //             // precio_Total= parseFloat(dias)* parseFloat( hotel.precio_dia);
//     //             // ninputPrecioTotal.setAttribute('value',`${precio_Total.toFixed(2)} €`);
//     //         }
//     //             const ninputPrecioTotal= document.querySelector('#nInputprecioTotal');
//     //             precio_Total= parseFloat(dias)* parseFloat( hotel.precio_dia);
//     //             ninputPrecioTotal.setAttribute('value',`${precio_Total.toFixed(2)} €`);
            
//     //     }

//     // }

// //     const  numero = await getNumero();
// //     console.log(numero);
// //     const nPersonas= document.querySelector('#nInputnumeropersonas');
// //     nPersonas.setAttribute('value',`${numero}`);
// //     }
// // async function getNumero(){
// //     const id=window.sessionStorage.getItem('id_hotel');
// //     const url= `http://localhost/myHotel/datos/read_hotel.php?id_hotel=${id}`;
// //     const response= await fetch(url);
// //     const data= await response.json();
// //     return data.datos_hotel[0].numero_personas;
// // }