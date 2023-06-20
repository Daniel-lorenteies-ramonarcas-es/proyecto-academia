document.addEventListener('DOMContentLoaded',setup);


async function setup(){
    const hotel= await obtenerHotel();
    mostrarHotel(hotel); 
    
}

async function obtenerHotel(){
    const id=window.sessionStorage.getItem('id_hotel');
    const url= `http://localhost/myHotel/datos/read_hotel.php?id_hotel=${id}`;
    const response= await fetch(url);
    const data= await response.json();
    return data.datos_hotel[0];

}


function mostrarHotel(hotel){
    const nDivinformacion= document.querySelector('#nDIvinformacion');

    const nheaderNombre= document.createElement('h1');
    const ntextNombre= document.createTextNode(hotel.nombre_hotel);
    nDivinformacion.appendChild(nheaderNombre);
    nheaderNombre.appendChild(ntextNombre);

    // const nimg= document.createElement('img');
    // nimg.setAttribute('src',`./imagenes_hoteles/${hotel.fotos}`);
    // nDivinformacion.appendChild(nimg);

    const npararro=document.createElement('p');
    nDivinformacion.appendChild(npararro);
    const ntextdescripcion= document.createTextNode(hotel.descripcion);
    nDivinformacion.appendChild(ntextdescripcion);

    const nLabelNumerohabitaciones= document.createElement('label');
    const ntextNumerohabitaciones= document.createTextNode(`numero de habitaciones : ${hotel.numero_habitacion}`);
    nDivinformacion.appendChild(nLabelNumerohabitaciones);
    nLabelNumerohabitaciones.appendChild(ntextNumerohabitaciones);

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
                precio_Total= parseFloat(dias)* parseFloat( hotel.precio_dia);
                ninputPrecioTotal.setAttribute('value',`${precio_Total.toFixed(2)} €`);
            
        }
    }

    function guardarFechaInicio(e){
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
       //CalcularDias(fecha_inicio,fecha_fin)
    }
    
    function guardarFechaFin(e){
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

        nifin.setAttribute('value',`${fechaActual}`);
        //CalcularDias(fecha_inicio,fecha_fin)
    }

    // function CalcularDias(fecha_inicio,fecha_fin){
    //     let dias=0;
    //     if( (!fecha_inicio==='') && (!fecha_inicio==='')){
    //         if(fecha_inicio < fecha_fin){
    //             dias=fecha_inicio-fecha_inicio;
    //             console.log(dias);
    //         }
    //     }
    //     return dias;
    // }

}







