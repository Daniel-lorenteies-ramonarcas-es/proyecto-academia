document.addEventListener('DOMContentLoaded',setup);

async function setup(){
    const hoteles= await obtenerHoteles();
    mostrarHoteles(hoteles);
    //mostrarSelect(hoteles); 
    
}

async function obtenerHoteles(){
    const url= 'http://localhost/myHotel/datos/read_hotel.php';
    const response= await fetch(url);
    const data= await response.json();
    console.log(data.datos_hotel)
    return data.datos_hotel;

}

function mostrarSelect(hoteles){
    const nDiv= document.querySelector('#nDIvSelect');
    const nSelect= document.createElement('select');
    nSelect.setAttribute('id','nSelect');
    nDiv.appendChild(nSelect);
    const paises=[];
    for(const hotel of hoteles){
        paises.push(hotel.pais);
    }
    const paises_norepetidos= Array.from(new Set(paises));
    for(const pais of  paises_norepetidos){
        const nOption= document.createElement('option');
        nOption.setAttribute('value',pais);
        const ntext= document.createTextNode(pais);
        nSelect.appendChild(nOption);
        nOption.appendChild(ntext);
    }
    
    nSelect.addEventListener('change',buscarHotelPorPais);
}


async function buscarHotelPorPais (e){   
    const pais= e.target.value;
    const url= `http://localhost/myHotel/datos/read_hotel_pais.php?pais=${pais}`;
    const response= await fetch(url);
    const data= await response.json();
    mostrarHotel(data.datos_hotel[0]);

}

function mostrarHotel(hotel){
    const nDiv= document.querySelector('#nDivHoteles');
    nDiv.setAttribute('class','form');
    while(nDiv.hasChildNodes()){
        nDiv.removeChild(nDiv.firstChild);
    }

    const nDivHotel= document.createElement('div');
        nDivHotel.setAttribute('id',`nDivHotel-${hotel.id_hotel}`);
        nDivHotel.setAttribute('class',`hotel`);
        nDiv.appendChild(nDivHotel);

        const nTabla= document.createElement('table');
        nDiv.appendChild(nTabla);

        const ntr= document.createElement('tr');
        nTabla.appendChild(ntr);
        
        const nthimagen= document.createElement('th');
        ntr.appendChild(nthimagen);

        // const ntrimagen= document.createElement('tr');
        // nthimagen.appendChild(ntrimagen);
        const nimg=document.createElement('img');
        nimg.setAttribute('src',`./imagenes_hoteles/${hotel.fotos}`);
        nthimagen.appendChild(nimg);

        const nthinfo= document.createElement('th');
        ntr.appendChild(nthinfo);
        // const ntrinfo= document.createElement('tr');
        // nthinfo.appendChild(ntrinfo);
        const ntdinfo=document.createElement('td');
        nthinfo.appendChild(ntdinfo);
        const nheader= document.createElement('h1');
        ntdinfo.appendChild(nheader);
       
        const nheaderText= document.createTextNode(hotel.nombre_hotel);
        nheader.appendChild(nheaderText);

        const ndireccion= document.createElement('p');
        ntdinfo.appendChild(ndireccion);
        const ntext= document.createTextNode(`${hotel.direccion} ,${hotel.ciudad}` );
        ntdinfo.appendChild(ntext);

         const nspan= document.createElement('span');
         ntdinfo.appendChild(nspan);
         const nbutton = document.createElement('button');
         nspan.appendChild(nbutton);
        const nlink= document.createElement('a');
        nlink.setAttribute('href',`./hacerreserva.php`);
         nbutton.appendChild(nlink);
         const nLinktext= document.createTextNode('REALIZAR RESERVA');
         nbutton.appendChild(nLinktext);
         nbutton.setAttribute('id',`${hotel.id_hotel}`);
         nbutton.addEventListener('click',hacerReserva);

        // const ninpSubmit= document.createElement('input');
        // ninpSubmit.setAttribute('type','submit');
        // ninpSubmit.setAttribute('id',`${hotel.id_hotel}`);
        // ninpSubmit.setAttribute('name',`boton`);
        // nspan.appendChild(ninpSubmit);
        // const ntextSubmit= document.createTextNode('REALIZAR RESERVA');
        // ninpSubmit.appendChild(ntextSubmit);
        // ninpSubmit.addEventListener('click',guardarIdHotel);

}

function mostrarHoteles(hoteles){
    const nDiv= document.querySelector('#nDivHoteles');
    // const nDivfecha= document.querySelector('#nDivdatos');
    // mostrarSelecionarFechas(nDivfecha);
    for(const hotel of hoteles){
        const nForm= document.createElement('form');
        nForm.setAttribute('method','POST');
        nForm.setAttribute('action','./menu.php');
        nForm.setAttribute('class','formhotel');

        const nDivImg= document.createElement('div');
        nForm.appendChild(nDivImg);
        nDivImg.setAttribute('class','img');

        const nDivInformacion= document.createElement('div');
        nForm.appendChild(nDivInformacion);
        nDivInformacion.setAttribute('class','informacion');

        const nDivtitulo= document.createElement('titulo');
        nForm.appendChild(nDivtitulo);
        nDivtitulo.setAttribute('class','titulo');

        const nDivdatosnumeros= document.createElement('div');
        nForm.appendChild(nDivdatosnumeros);
        nDivdatosnumeros.setAttribute('class','datosnumeros');

        const nDivprecio= document.createElement('div');
        nForm.appendChild(nDivprecio);
        nDivprecio.setAttribute('class','precio');
        
        const nDivenviar= document.createElement('div');
        nForm.appendChild(nDivenviar);
        nDivenviar.setAttribute('class','enviar');

        nDiv.appendChild(nForm);

        // const nDivHotel= document.createElement('div');
        // nDivHotel.setAttribute('id',`nDivHotel-${hotel.id_hotel}`);
        // nDivHotel.setAttribute('class',`hotel`);
        // nDivHotel.setAttribute('name',`id_hotel`);
        // nDivHotel.setAttribute('value',`${hotel.id_hotel}`);
        
        // nForm.appendChild(nDivHotel);

        // const nTabla= document.createElement('table');
        // nForm.appendChild(nTabla);

        // const ntr= document.createElement('tr');
        // nTabla.appendChild(ntr);
        
        // const nthimagen= document.createElement('th');
        // ntr.appendChild(nthimagen);

        // const ntrimagen= document.createElement('tr');
        // nthimagen.appendChild(ntrimagen);
        const nimg=document.createElement('img');
        nimg.setAttribute('name','img');
        nimg.setAttribute('src',`./imagenes_hoteles/${hotel.fotos}`);
        nDivImg.appendChild(nimg);

        // const nthinfo= document.createElement('th');
        // ntr.appendChild(nthinfo);
        // const ntrinfo= document.createElement('tr');
        // nthinfo.appendChild(ntrinfo);
        // const ntdinfo=document.createElement('td');
        // nthinfo.appendChild(ntdinfo);

        const nheader= document.createElement('h1');
        // ntdinfo.appendChild(nheader);
        nDivtitulo.appendChild(nheader);
        const nheaderText= document.createTextNode(hotel.nombre_hotel);
        nheader.appendChild(nheaderText);

        const ndireccion= document.createElement('p');
        nDivInformacion.appendChild(ndireccion);
        const ntext= document.createTextNode(`${hotel.direccion} ,${hotel.pais},${hotel.ciudad}` );
        ndireccion.appendChild(ntext);

        const nlabeldescpricon= document.createElement('label');
        nDivInformacion.appendChild(nlabeldescpricon);
        const ndesc= document.createTextNode(`${hotel.descripcion}` );
        ndireccion.appendChild(ndesc);

        // const nlabelnumpersonas= document.createElement('p');
        // nDivdatosnumeros.appendChild(nlabelnumpersonas);
        // const ntextnumpersonas= document.createTextNode(` número de peronas : ${hotel.numero_personas}` );
        // nDivdatosnumeros.appendChild(ntextnumpersonas);

        // const nlabelnumhabitaciones= document.createElement('p');
        // nDivdatosnumeros.appendChild(nlabelnumhabitaciones);
        // const ntextnumhabitaciones= document.createTextNode(`número de habitaciones : ${hotel.numero_habitaciones}` );
        // nDivdatosnumeros.appendChild(ntextnumhabitaciones);


        const nprecio= document.createElement('label');
        nDivprecio.appendChild(nprecio);
        const nTexprecio= document.createTextNode(`${hotel.precio_dia} € ` );
        nprecio.setAttribute('class','preciodia')
        nprecio.appendChild(nTexprecio);

        

        //  const nspan= document.createElement('span');
        //  ntdinfo.appendChild(nspan);

        //  const p =  document.createElement('p');
        //  nTabla.appendChild(p)
        //  const t= document.createTextNode('p');
        //  p.appendChild(t);
        //  p.setAttribute('name','p');
        //  const nDivSession= document.createElement('label');
        //  nDivSession.setAttribute('value',`${hotel.id_hotel}`);
        //  nDivSession.setAttribute('name','id_hotel');
        //  nTabla.appendChild(nDivSession);
        //  const nbutton = document.createElement('button');
        //  nspan.appendChild(nbutton);
        //const nlink= document.createElement('a');
        // nlink.setAttribute('href',`./hacerreserva.php`);
         //nbutton.appendChild(nlink);
        //  const nLinktext= document.createTextNode('REALIZAR RESERVA');
        //  nbutton.appendChild(nLinktext);
        //  nbutton.setAttribute('id',`${hotel.id_hotel}`);
        //  nbutton.addEventListener('click',hacerReserva);
        const ninpTextId= document.createElement('input');
        ninpTextId.setAttribute('type','text');
        ninpTextId.setAttribute('value',`${hotel.id_hotel}`);
        ninpTextId.setAttribute('name','session_hotel');
        ninpTextId.style.display = "none";
        nForm.appendChild(ninpTextId);

        const ninNumPersonas= document.createElement('input');
        ninNumPersonas.setAttribute('type','number');
        ninNumPersonas.setAttribute('value',`${hotel.numero_personas}`);
        ninNumPersonas.setAttribute('name','session_num_personas');
        ninNumPersonas.style.display = "none";
        nForm.appendChild(ninNumPersonas);

        const ninNumHabitantes= document.createElement('input');
        ninNumHabitantes.setAttribute('type','number');
        ninNumHabitantes.setAttribute('value',`${hotel.numero_habitaciones}`);
        ninNumHabitantes.setAttribute('name','session_num_habitaciones');
        ninNumHabitantes.style.display = "none";
        nForm.appendChild(ninNumHabitantes);

        const ninpSubmit= document.createElement('input');
        ninpSubmit.setAttribute('type','submit');
        ninpSubmit.setAttribute('id',`${hotel.id_hotel}`);
        nDivenviar.appendChild(ninpSubmit);
        ninpSubmit.setAttribute('value','REALIZAR RESERVA');
        ninpSubmit.addEventListener('click',guardarIdHotel);

}}

function guardarIdHotel(e){
    const id= e.target.id;
    console.log(e.target.id);
    const nDiv= document.querySelector('#nDivsession');
    nDiv.setAttribute('value',id);
    window.sessionStorage.setItem('id_hotel',id);
    //window.location='./confirmar_reserva.php';
}


// function mostrarSelecionarFechas(ndivfechas){
//     const fechaActual=obtenerFechaActual();
    
//     const niputfechaEntrada=document.createElement('input');
//     niputfechaEntrada.setAttribute('type','date');
//     niputfechaEntrada.setAttribute('name','fecha-entrad');
//     niputfechaEntrada.setAttribute('value',`${fechaActual}`);
//     ndivfechas.appendChild(niputfechaEntrada);

//     const niputfechaSalida=document.createElement('input');
//     niputfechaSalida.setAttribute('type','date');
//     niputfechaSalida.setAttribute('name','fecha-salida');
//     const ntext=
//     niputfechaSalida.setAttribute('value',`${fechaActual}`);
//     ndivfechas.appendChild(niputfechaSalida);

// }

function obtenerFechaActual(){
    let hoy = new Date();
    let diaActual = hoy.getDay()+11;
    let mesActual = hoy.getMonth()+1;
    let añoActual = hoy.getFullYear();
    let fechaActual = `${añoActual}/${mesActual}/${diaActual}`;
    return fechaActual;
}

// function hacerReserva(e){
//     const id= e.target.id;
//     console.log(e.target.id);
//     window.sessionStorage.setItem('id',id);
//     window.location='./hacerreserva.php';
// }
