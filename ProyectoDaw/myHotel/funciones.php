<?php
require_once('conexion.php');

function checkUser($user,$patronUser){
    if( (empty($_POST[$user]))){
        return 'El nombre no puede estar vacios';
    }
    elseif (!preg_match($patronUser, $_POST[$user])) {
        return 'El nombre de usuario es inválido.';
    } 
}

function validar_email($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return  "el email no es correcto";
      }
}

function comprobar_fecha_inicio($fecha_entrada,$fecha_salida){
    // echo $fecha_entrada .'  p';
    // echo $fecha_salida;
    //echo $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
    if( (empty($fecha_entrada))){
        return 'Las fechas no pueden estar vacias';
    }
}

function mostrar_checked($campo, $value) {
    if(isset($campo)){ //si está rellena...
        if ($campo == $value) { //si estaba marcada la opcion...
            echo 'checked= "checked"';
        }
    }
}

function insertar_nueva_reserva($id_reserva,$id_usuario,$id_hotel,$dni,$nombre,$apellidos,$telefono,$nombre_hotel,
            $fecha_inicio,$fecha_fin,$num_personas,$num_habitaciones ,$total_dias ,$precio_total){
    $conexion= abrir_conexion_PDO();
    // echo $id_reserva;
    // echo $id_usuario;
    // echo $id_hotel;
    //INSERT INTO datos_usuario( id_usuario, email, pass, )VALUES ( :id_usuario,:email,:pass)
      $sql ="INSERT INTO `datos_reserva`(`id_reserva`, `id_hotel`, `id_usuario`, `dni`, `nombre`, `apellidos`, `telefono`,
       `fecha_inicio`, `fecha_fin`, `nombre_hotel`, `num_personas`, `num_habitaciones`, `total_dias`, `precio_total`)
      VALUES (:id_reserva,:id_hotel,:id_usuario,:dni,:nombre ,:apellidos ,:telefono ,:fecha_inicio,:fecha_fin, :nombre_hotel ,:num_personas ,:num_habitaciones ,:total_dias ,:precio_total)";
            $consulta = $conexion->prepare($sql); 
            $consulta->bindParam(':id_reserva', $id_reserva);
            $consulta->bindParam(':id_hotel', $id_hotel);
            $consulta->bindParam(':id_usuario', $id_usuario);
            $consulta->bindParam(':dni', $dni);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->bindParam(':telefono', $telefono);
            $consulta->bindParam(':fecha_inicio', $fecha_inicio);
            $consulta->bindParam(':fecha_fin', $fecha_fin);
            $consulta->bindParam(':nombre_hotel', $nombre_hotel);
            $consulta->bindParam(':num_personas', $num_personas);
            $consulta->bindParam(':num_habitaciones', $num_habitaciones);
            $consulta->bindParam(':total_dias', $total_dias);
            $consulta->bindParam(':precio_total', $precio_total);
            $consulta->execute();  
            if($consulta->rowCount()>0) {
              
                
             }else{
                 
             }       
}

function comprobar_fecha_fin($fecha_entrada,$fecha_salida){
    $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
    if( (empty($fecha_salida))){
        return 'La fecha no puede estar vacios';
    } 
}

function comprobar_checked($campo){
    if(empty($_POST[$campo])){
        return 'debes selecionar las casillas obligatorias';
    }
}

// function calcularDias($fecha_entrada,$fecha_salida){
//     $dias = (strtotime($fecha_salida)-strtotime($fecha_entrada))/86400;
//     //$dias = $fecha_entrada->diff($fecha_salida);
//     return $dias;
// }

function comprobar_numero($num){
    if( (empty($num))){
        return 'El númmero no puede estar vacios';
    }
    elseif (!is_numeric($num) && ($num<0)) {
        return 'El númmero no de no es correcta';
    }
}

function checkPassword($password,$patronPass){
    if( (empty($_POST[$password]))){
        return 'La contraseña no puede estar vacios';
    }
    elseif (!preg_match($patronPass, $_POST[$password])) {
        return 'La contraseña es inválida.';
    } 
}

function checkPhone($phone,$patronPhone){
    if( (empty($_POST[$phone]))){
        return 'El teléfono no Puede estar vacía';
        if (!preg_match($patronPhone, $_POST[$phone])) {
            return 'El teléfono no es inválida.';
        } 
    }
    
}

function checkDni($dni,$patronDni){
    
    if( (empty($_POST[''.$dni.'']))){
        return 'El Dni no Puede estar vacía';
        if (!preg_match($patronDni, $_POST[$dni])) {
            return 'El Dni no es inválida.';
        } 
    }
    
}

function mostrar_error_campo($campo, $errores){
    if(isset($errores[$campo])) {
        echo '<label>'.$errores[$campo].'</label>';
    }
}

function showErrors($campo, $errores){
    if(isset($errores[$campo])) {
        echo '<label>'.$errores[$campo].'</label>';
    }
}

function Lista_de_errores($errores) {
    if (isset($errores)) {
        echo '<ul>';
        foreach ($errores as $key => $error) {
            echo '<li>' . $key . ': ' . $error . '</li>';
        }
        echo '</ul>';
    }
}

function show_value($campo, $errores){
   
    if(isset($_POST[$campo])){ //si está rellena...
        if (empty($errores[$campo])){//si no tiene errores..
            echo 'value="'.$_POST[$campo].'"'; //vuelves a rellenar ese campo
        }
    }
}

function show($errores){
     ?>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
     <script>
        
        Swal.fire({
            icon: 'error',
            title: '<?php Lista_de_errores($errores)?>',
        });
        // Swal.fire(Lista_de_errores($errores)        
        // );
          
          </script>
          <?php                  
    
    }



//INSERTAR NUEVO USUARIO

function insertar_nuevo_usuario($email_user,$password){
    $conexion= abrir_conexion_PDO();
    //if( !empty($user) && !empty($password)){ 
        // $id=generarId_Usuario();
      $sql ="INSERT INTO datos_usuario( email, pass )VALUES ( :email,:pass)";
            $consulta = $conexion->prepare($sql); 
            // $consulta->bindParam(':id_usuario', $id);
            $consulta->bindParam(':email', $email_user);
            $consulta->bindParam(':pass', $password);
            // $consulta->bindParam(':telefono', $telefono);
            // $consulta->bindParam(':tipo_usuario', $tipo);
            $consulta->execute();
            if($consulta->rowCount()>0) {

               header('Location:./login.php');
            }else{
                header('Location:./registro.php');
            }      
        //}
    }
                //header('Location:p_admin.php');
        //     }else{
        //         echo '<p>No se ha insertado un nuevo usuario <p>';
        //     }
            
            
            
        //     $id= ;
        //     $tipo = 'usuario';
        //     $password_cifrado=cifrarPass($password);
        //     $email_user=$email;
        //     if(empty($telefono)){
        //         $tlf='';
        //     }
        //     $consulta->execute();
    
        //     if(!$consulta->fetch()) {
        //         echo'insertado';
        //        $insertado=true;
        //     }else{
        //         $insertado=false;
        //     }
        // }else{
        //     $insertado=false;
        // }
        // return $insertado;


    // function encriptarPass($password){
    //     $password_encriptado=password_hash($password, PASSWORD_DEFAULT);
    //     return $password_encriptado;
    // }

    function generarId_Usuario(){
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = 8;
        $id_usuario='';
        $id_usuario= substr(str_shuffle($caracteres_permitidos), 0, $longitud);
        if($id_usuario!=''){
            return $id_usuario;
        }
        
    }

    function generarId_Reserva(){
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = 8;
        $id_reserva='';
        $id_reserva= substr(str_shuffle($caracteres_permitidos), 0, $longitud);
        if($id_reserva!=''){
            return $id_reserva;
        }
    }

    function generarId_Hotel(){
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = 8;
        $id_hotel='';
        $id_hotel= substr(str_shuffle($caracteres_permitidos), 0, $longitud);
        if($id_hotel!=''){
            return $id_hotel;
        }
    }

    function repiteID($id,$tabla){
        $conexion= abrir_conexion_PDO();

        $sql='SELECT * FROM '.$tabla.' WHERE '.$id.'=:'.$id;
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':'.$id.'', $id);
            $consulta->execute();
            if($consulta->rowCount()>0) {
                return true;
            }else{
                return false;
            }
    }


    function buscarUsuario($id_usuario){
        session_start();
        $conexion= abrir_conexion_PDO();
        $sql= 'SELECT * FROM datos_usuario WHERE id_usuario = :id_usuario';
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':id_usuario.', $id_usuario);
        $consulta->execute();
        if($consulta->rowCount()>0) {
            $_SESSION['usuario']= $consulta['id_usuario'];
        } 
    }

    function buscarReservas($id_usuario){
        

    }

    function MostrarReservas(){
        $id_usuario=$_SESSION['usuario'];
        // $id_hotel=$_GET['id_hotel'];
        // $id_reserva =$_GET['id_reserva'];
    $conexion= abrir_conexion_PDO();
        
        $email=obtenerEmailPorId($id_usuario);
        $sql= 'SELECT * FROM datos_reserva WHERE id_usuario = '.$id_usuario;
        $consulta = $conexion->prepare($sql);
        $consulta->execute();

        echo '<div class="reservas">';
        while ($fila = $consulta->fetch()) {
  
            echo '<div class="reserva">';
                echo '<div class="hotel"><tr> <td>'.$fila['nombre_hotel'].'</td>';
                echo '</div>';
                echo '<div class="datos-reserva">';
                    echo '<div class="nombre-fecha">';
                        echo '<div class="nombre">';
                        echo '<tr><p> Reservado : '.$fila['nombre'].'  '.$fila['apellidos'].'</p></tr>';
                        echo '</div>';
                        echo '<div class="usuario">';
                         echo '<tr><td> Con el usuario : '.$email.'</td></tr>';
                        
                    echo '</div>';
                    echo '<td> Fecha : Desde '.$fila['fecha_inicio'].' hasta '.$fila['fecha_fin'].' </td>';
                    echo '<div class="precio-reserva">';
                    echo '<td> Precio : '.$fila['precio_total'].' €  </td>';
                    echo '</div>';
                    echo '</tr>';
                    echo '</div>';
                   
                    echo '<div class="botones">';
                    echo '<td><button class="borrar">'.'<a class="enlace"  href="Borrar.php?id_reserva='.$fila['id_reserva'].'&id_hotel='.$fila['id_hotel'].'">Cancelar </a>'.'</button> </td>';
                    echo '<td><button  class="modificar">'.'<a  class="enlace" href="Modificar.php?id_reserva='.$fila['id_reserva'].'&id_hotel='.$fila['id_hotel'].'">Modificar </a>'.'</button> </td>';
                    echo '<td><button  class="pdf">'.'<a class="enlace" href="verfactura.php?id_reserva='.$fila['id_reserva'].'&id_hotel='.$fila['id_hotel'].'">Mostrar Factura </a>'.'</button> </td>';
                echo '</div>';
               
                echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    }


    function MostrarFactura(){
        $id_usuario=$_SESSION['usuario'];
        $id_hotel=$_GET['id_hotel'];
        $id_reserva =$_GET['id_reserva'];
    $conexion= abrir_conexion_PDO();
        
        $email=obtenerEmailPorId($id_usuario);
        $direccion=obtenerDirecionHotelPorId($id_hotel);
        $telefono_hotel= obtenerTelefonoPorId($id_hotel);
        $sql= 'SELECT * FROM datos_reserva WHERE id_reserva = '.$id_reserva;
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
        echo '<div class="factura">';
        echo '<h1>Datos de la Factura</h1>';
        echo '<table class="datos-usuario" >';
        while ($fila = $consulta->fetch()) {
            echo '<tr>';
            echo ' <td>Dni : '.$fila['dni'].'</td></tr>';
            echo '<tr><td>  Reservado por : '.$fila['nombre'].'  '.$fila['apellidos'].'</td> </tr>';
            echo '<tr><td> Correo Electrónico : '.$email.'</td> </tr>';
            echo '<tr><td> Teléfono : '.$fila['telefono'].'</td></tr>';
            echo '<tr><td>  '.$fila['nombre_hotel'].'</td> </tr>';
            echo '<tr><td> Número de personas : '.$fila['num_personas'].'</td> </tr>';
            echo '<tr><td> Número de habitaciones : '.$fila['num_habitaciones'].'</td> </tr>';
            echo '<tr><td> Direccion : '.$direccion.'</td> </tr>';
            echo '<tr><td> Teléfono : '.$telefono_hotel.'</td></tr>';
            echo '<tr><td> Fecha de entrada : '.$fila['fecha_inicio'].'</td></tr>';
            echo '<tr><td> Fecha de salida : '.$fila['fecha_fin'].' </td></tr>';

            echo '<tr><td> Número de días : '.$fila['total_dias'].' </td></tr>';
            echo '<tr><td> Precio Al día : '.$fila['precio_total']/$fila['total_dias'].' €  </td></tr>';
            echo '<tr><td> Precio Total : '.$fila['precio_total'].' €  </td></tr>';
                   
           
                    // echo '<div class="precio-reserva">';
                    // echo '<td> Precio : '.$fila['precio_total'].' €  </td>';
                    // echo '</div>';
                    // echo '</tr>';
                    // echo '</div>';
                   
              
        }

        echo '</table>';
        // echo '<div class="boton-volver">';
        // echo '<button><a href=./listareservas.php >Volver</a></button> ';
        // echo '</div>';
        echo '</div>';

        // $sql= 'SELECT * FROM datos_hotel WHERE id_hotel = '.$id_hotel;
        // $consulta = $conexion->prepare($sql);
        // $consulta->execute();
        // while ($fila = $consulta->fetch()) {

        // }
    }




    function validar_string($campo, $patron) {
        if (empty($_POST[$campo])) {//valido que no esté vacía
            return 'El '.$campo .' no puede estar vacío.';
        } 
        elseif (!preg_match($patron, $_POST[$campo])) {//valido que todos sus caracteres sean string
            return $campo.' inválido. Debe ser una cadena de texto, con una longitud de 3 a 20 caracteres.';
        } 
    }

    function buscarId_UsuarioPorEmeailYContraseña($email,$pass){
        $conexion= abrir_conexion_PDO();
        $sql='SELECT id_usuario FROM datos_usuario WHERE email =:email and pass= :pass';
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':pass', $pass);
        $consulta->execute();
        if($consulta->rowCount()>0) {
        while($resultado = $consulta->fetch()) {
            
            
            $_SESSION['id_usuario']= $resultado['id_usuario'];
            return $resultado['id_usuario'];
            }
        }
        
     }

     function mostrarError_login(){
        ?>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script> 
        <script>
      Swal.fire({
        icon: 'error',
        title: 'Ha sucedido un error',
        text: 'No se ha encontrado ningún usuario',
       
        })
        </script><?php
     }
    
        

    function calcularPrecio($fecha_entrada,$fecha_salida,$precio_dia){
        // $dias = (strtotime($fecha_entrada)-strtotime($fecha_salida))/86400;
        // $dias = abs($dias); $dias = floor($dias);
        
        return $precio_dia* CalcularDias($fecha_entrada,$fecha_salida);
    }


    function BuscarPrecioDelHotel($id_hotel){
        $conexion= abrir_conexion_PDO();
        $sql='SELECT precio_dia FROM `datos_hotel` WHERE id_hotel=:id_hotel';
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':id_hotel',$id_hotel);
        $consulta->execute();
        if($consulta->rowCount()>0) {
        while($resultado = $consulta->fetch()) {
            return $resultado['precio_dia'];
        } }
        } 
    
    function calcularTotalPersona($num_adultos,$num_ninos){
        $total_personas=$num_adultos+$num_ninos;
        return $total_personas;
    }


    function getNumerodePersonas($id_hotel){
        
        $conexion= abrir_conexion_PDO();
        $sql='SELECT numero_personas FROM datos_hotel WHERE id_hotel=:id_hotel';
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':id_hotel',$id_hotel);
        $consulta->execute();
        if($consulta->rowCount()>0) {
            while($resultado = $consulta->fetch()) {
                return $resultado['numero_personas'];
            } }
        }

        function getNumerodeHabitanciones($id_hotel){
            $conexion= abrir_conexion_PDO();
            $sql='SELECT numero_habitaciones FROM `datos_hotel` WHERE id_hotel=:id_hotel';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_hotel',$id_hotel);
            $consulta->execute();
            if($consulta->rowCount()>0) {
                while($resultado = $consulta->fetch()) {
                    return $resultado['numero_habitaciones'];
                } }
            }

        function  obtenerEmailPorId($id_usuario){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT email FROM datos_usuario WHERE id_usuario = :id_usuario';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_usuario', $id_usuario);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['email'];
            } 
        }
    

        function  obtenerNombreHotelPorId($id_hotel){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT nombre_hotel FROM datos_hotel WHERE id_hotel = :id_hotel';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_hotel', $id_hotel);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['nombre_hotel'];
            } 
        }
    
        
        function obtenerDescripcionHotelPorId($id_hotel){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT descripcion FROM datos_hotel WHERE id_hotel = :id_hotel';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_hotel', $id_hotel);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['descripcion'];
            } 
        }

        function obtenerNumeroPersonasPorId($id_hotel){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT numero_personas FROM datos_hotel WHERE id_hotel = :id_hotel';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_hotel', $id_hotel);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['numero_personas'];
            } 
        }

        function  obtenerNumeroHabitacionesPorId($id_hotel){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT numero_habitaciones FROM datos_hotel WHERE id_hotel = :id_hotel';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_hotel', $id_hotel);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['numero_habitaciones'];
            } 
        }

        function obtenerNumeroTelefonoPorId($id_hotel){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT telefono FROM datos_hotel WHERE id_hotel = :id_hotel';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_hotel', $id_hotel);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['telefono'];
            } 
        }

        function obtenerNumeroPrecioPorId($id_hotel){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT precio_dia FROM datos_hotel WHERE id_hotel = :id_hotel';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_hotel', $id_hotel);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['precio_dia'];
            } 
        }

        function obtenerDirecionHotelPorId($id_hotel){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT direccion,pais,ciudad FROM datos_hotel WHERE id_hotel = :id_hotel';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_hotel', $id_hotel);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['direccion'] .','. $resultado['ciudad'].','.$resultado['pais'];
            } 
        }


        function CalcularDias($fecha_inicio,$fecha_fin){
            $fechainicio =new DateTime($fecha_inicio);
            $fechafin =new DateTime($fecha_fin);
            $dias = $fechainicio->diff($fechafin);
           
            return $dias->format('%d');
        }

        function fechaActual(){
            $fecha = date("Y-m-d ");
            return $fecha;
        }
        
        function fechaDiaSiguiente(){
            $fecha=date( 'Y-m-d', strtotime( '+1 day' ) );
            return $fecha;
        }
        
        function fechaFin(){
            $fecha = date("Y-m-d ", strtotime( '+7 month' )) ;
            return $fecha;
        }

        //

        function  obtenerDniPorId($id_reserva){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT dni FROM datos_reserva WHERE id_reserva = :id_reserva';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_reserva', $id_reserva);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['dni'];
            } 
        }

        function  obtenerNombrePorId($id_reserva){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT nombre FROM datos_reserva WHERE id_reserva = :id_reserva';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_reserva', $id_reserva);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['nombre'];
            } 
        }

        function  obtenerApellidosPorId($id_reserva){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT apellidos FROM datos_reserva WHERE id_reserva = :id_reserva';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_reserva', $id_reserva);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['apellidos'];
            } 
        }

        function  obtenerTelefonoPorId($id_reserva){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT telefono FROM datos_reserva WHERE id_reserva = :id_reserva';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_reserva', $id_reserva);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['telefono'];
            } 
        }

        function  obtenerFechaInicioPorId($id_reserva){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT fecha_inicio FROM datos_reserva WHERE id_reserva = :id_reserva';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_reserva', $id_reserva);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['fecha_inicio'];
            } 
        }

        function  obtenerFechaFinPorId($id_reserva){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT fecha_fin FROM datos_reserva WHERE id_reserva = :id_reserva';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_reserva', $id_reserva);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['fecha_fin'];
            } 
        }

        function obtenerPrecioTotalPorId($id_reserva){
            $conexion= abrir_conexion_PDO();
            $sql= 'SELECT precio_total FROM datos_reserva WHERE id_reserva = :id_reserva';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':id_reserva', $id_reserva);
            $consulta->execute();
            while($resultado = $consulta->fetch()) {
                return $resultado['precio_total'];
            } 
        }


        function modificarReserva($id_reserva,$dni,$nombre,$apellidos,$correo,$telefono,
        $fecha_inicio,$fecha_fin,$num_personas,$num_habitaciones ,$total_dias ,$precio_total){
            $conexion= abrir_conexion_PDO();
            $sql=" UPDATE datos_reserva SET 
            dni= :dni,nombre=:nombre,apellidos=:apellidos,correo=:correo, telefono=:telefono,fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin,total_dias=:total_dias,precio_total=:precio_total
            WHERE id_reserva=:id_reserva ";
    
            $consulta = $conexion->prepare($sql); 
            $consulta->bindParam(':id_reserva', $id_reserva);

            $consulta->bindParam(':dni', $dni);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->bindParam(':correo', $correo);
            $consulta->bindParam(':telefono', $telefono);
            $consulta->bindParam(':fecha_inicio', $fecha_inicio);
            $consulta->bindParam(':fecha_fin', $fecha_fin);
            $consulta->bindParam(':total_dias', $total_dias);
            $consulta->bindParam(':precio_total', $precio_total);
            $consulta->execute();  
            if($consulta->rowCount()>0) {
                header('Location:menu.php');
            }else{
             
            }    
        }
        
//         function insertar_nueva_reserva($id_usuario,$id_hotel,$dni,$nombre,$apellidos,$correo,$telefono, $nommbre_hotel,
//         $fecha_inicio,$fecha_fin,$num_personas,$num_habitaciones ,$total_dias ,$precio_total){
// $conexion= abrir_conexion_PDO();
// $id_reserva= generarId_Reserva();

// //INSERT INTO datos_usuario( id_usuario, email, pass, )VALUES ( :id_usuario,:email,:pass)
//   $sql ="INSERT INTO `datos_reserva`(`id_reserva`, `id_hotel`, `id_usuario`, `dni`, `nombre`, `apellidos`,`correo`, `telefono`,
//    `fecha_inicio`, `fecha_fin`, `nombre_hotel`, `num_personas`, `num_habitaciones`, `total_dias`, `precio_total`)
//   VALUES (:id_reserva,:id_hotel,:id_usuario,:dni,:nombre ,:apellidos,:correo ,:telefono ,:fecha_inicio,:fecha_fin, :nommbre_hotel ,:num_personas ,:num_habitaciones ,:total_dias ,:precio_total)";
//         $consulta = $conexion->prepare($sql); 
//         $consulta->bindParam(':id_reserva', $id_reserva);
//         $consulta->bindParam(':id_hotel', $id_usuario);
//         $consulta->bindParam(':id_usuario', $id_hotel);
//         $consulta->bindParam(':dni', $dni);
//         $consulta->bindParam(':nombre', $nombre);
//         $consulta->bindParam(':apellidos', $apellidos);
//         $consulta->bindParam(':correo', $correo);
//         $consulta->bindParam(':telefono', $telefono);
//         $consulta->bindParam(':fecha_inicio', $fecha_inicio);
//         $consulta->bindParam(':fecha_fin', $fecha_fin);
//         $consulta->bindParam(':nommbre_hotel', $nommbre_hotel);
//         $consulta->bindParam(':num_personas', $num_personas);
//         $consulta->bindParam(':num_habitaciones', $num_habitaciones);
//         $consulta->bindParam(':total_dias', $total_dias);
//         $consulta->bindParam(':precio_total', $precio_total);
//         $consulta->execute();  
//         if($consulta->rowCount()>0) {
          
            
//          }else{
             
//          }       
// }