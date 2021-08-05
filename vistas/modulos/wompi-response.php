<?php 
$METHOD = $_SERVER['REQUEST_METHOD'];
if($METHOD == 'POST'){
    $hook = json_decode(file_get_contents('php://input'));
    // $hook = get_object_vars($hook);
    $event = $hook->event;;
    $payment = $hook->data->transaction;
}else if($METHOD == 'GET'){
    $settings = (ControladorCheckout::ctrMostrarComercioSettings())[0]; 
    $endpoint = '';
    if($settings['modo'] == 'sandbox'){
        $endpoint = "https://sandbox.wompi.co/v1/transactions/".$_GET['id'];
    }else{
        $endpoint = $settings['modo'].$_GET['id'];
    }
    $payment = json_decode(file_get_contents($endpoint));
}
    
    $error = false;
    if(isset($payment->error)){
        $error = true;
        echo 'ID no existe en transacciones';
    }else{
        if($METHOD == 'POST'){
            // Registrar transaccion 
            $transaccion = ControladorCheckout::guardarTransaccion($payment);
            if($transaccion)
                http_response_code(200);
        }else{
            // Registrar transaccion
            $transaccion = ControladorCheckout::guardarTransaccion($payment->data);
        }
        // limpiar carrito
        $item = 'usuario_id';
        ControladorProductos::ctrEliminarCarrito($item ,$_SESSION['idUsuario']);
    }
// }
// else{
//     header('Location /error404');
// }
if(!$error){
?>
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-12 text-center text-response">
                <i class="far <?php echo $payment->data->status == 'APPROVED' ? 'fa-check-circle text-success ' : 'fa-times-circle text-danger' ?> icon-information"></i>
                <p class="py-0">TRANSACCION <?php echo $payment->data->status == 'APPROVED' ? 'APROBADA' : 'DECLINADA' ?></p>
                <p class="py-0"><strong>ID de transaccion: </strong> <?php echo $payment->data->id?></p>
                <p class="py-0"><strong>ID de Seguimiento: </strong> <?php echo $payment->data->payment_method->extra->ticket_id ?></p>
                <p class="py-0"><strong>Referencia: </strong> <?php echo $payment->data->reference?></p>
            </div>
            <div class="col-12">
                <div class="table-reponsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Fecha Pago</th>
                            <th scope="col">Moneda</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Metodo</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><?php $date =  new DateTime($payment->data->created_at); echo $date->format('d/m/Y H:i:s ') ?></th>
                                <td><?php echo $payment->data->currency?></td>
                                <td> $<?php echo number_format(substr($payment->data->amount_in_cents, 0 , -2))?></td>
                                <td><?php echo $payment->data->payment_method_type?></td>
                                <?php if($payment->data->status == 'APPROVED'){?>
                                    <td><span class="badge badge-success">APROBADO</span></td>
                                <?php }else{ ?>
                                    <td><span class="badge badge-danger">DECLINADO</span></td>
                                <?php }  ?>    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php }else{ ?>
<?php } ?>           