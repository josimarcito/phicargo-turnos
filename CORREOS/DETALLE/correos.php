<?php

require_once "../../mysql/conexion.php";

$cn = conectar();
$referencia = $_POST['referencia'];
$sqlSelect  =  "SELECT VIAJES.REFERENCIA, VIAJES.PLACAS, ID_CLIENTE, NOMBRE, FECHA_ENVIO, LATITUD, LONGITUD, UBICACIONES.REFERENCIA, VELOCIDAD, FECHA_HORA FROM CORREOS INNER JOIN UBICACIONES on ubicaciones.id = correos.id_ubicacion inner join viajes on viajes.id = correos.id_viaje INNER JOIN CLIENTES ON CLIENTES.id = VIAJES.id_cliente WHERE VIAJES.REFERENCIA = $referencia ORDER BY FECHA_ENVIO ASC";
$resultSet  = $cn->query($sqlSelect);

function imprimirTiempo($fecha){
    $start_date = new DateTime($fecha);
    $since_start = $start_date->diff(new DateTime(date("Y-m-d")." ".date("H:i:s")));
    echo "Hace ";
    if($since_start->y==0){
        if($since_start->m==0){
            if($since_start->d==0){
               if($since_start->h==0){
                   if($since_start->i==0){
                      if($since_start->s==0){
                         echo $since_start->s.' segundos';
                      }else{
                          if($since_start->s==1){
                             echo $since_start->s.' segundo'; 
                          }else{
                             echo $since_start->s.' segundos'; 
                          }
                      }
                   }else{
                      if($since_start->i==1){
                          echo $since_start->i.' minuto'; 
                      }else{
                        echo $since_start->i.' minutos';
                      }
                   }
               }else{
                  if($since_start->h==1){
                    echo $since_start->h.' hora';
                  }else{
                    echo $since_start->h.' horas';
                  }
               }
            }else{
                if($since_start->d==1){
                    echo $since_start->d.' día';
                }else{
                    echo $since_start->d.' días';
                }
            }
        }else{
            if($since_start->m==1){
               echo $since_start->m.' mes';
            }else{
                echo $since_start->m.' meses';
            }
        }
    }else{
        if($since_start->y==1){
            echo $since_start->y.' año';
        }else{
            echo $since_start->y.' años';
        }
    }
}

?>
<ul class="timeline mt-2 mb-0">
    <?php while ($row = $resultSet->fetch_assoc()) { ?>
        <li class="timeline-item">
            <div class="d-flex align-items-start m-3">
                <div class="flex-grow-1">
                    <small class="float-end text-navy"><?php imprimirTiempo($row['FECHA_ENVIO'])?></small>
                    <strong>El sistema</strong> envío una actualización de status al cliente <strong><?php echo $row['NOMBRE']?> </strong><br />

                    <div class="border text-sm text-muted p-2 mt-1">
                        <?php echo 'Fecha: ' . $row['FECHA_HORA'] . '<br>' .'Latitud: ' . $row['LATITUD'] . '<br>' . 'Longitud: ' . $row['LONGITUD'] . '<br>' . 'Referencia: ' . $row['REFERENCIA'] . '<br>' ?>
                        <?php if ($row['VELOCIDAD'] > 0.00) {
                            echo 'Estado: En Ruta';
                        } else {
                            echo 'Estado: Detenido';
                        } ?>

                    </div>
                </div>
            </div>
        </li>
    <?php } ?>
</ul>