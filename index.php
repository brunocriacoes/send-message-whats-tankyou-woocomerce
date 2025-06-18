<?php

add_action('woocommerce_thankyou', 'enviar_mensagem_detalhada_apos_pedido');

function create_w_api_sender($instanceId, $token)
{
    return function ($phone, $message) use ($instanceId, $token) {
        $url = "https://api.w-api.app/v1/message/send-text?instanceId=$instanceId";
        $body = json_encode(array(
            'phone' => $phone,
            'message' => $message,
        ));
        $args = array(
            'body'        => $body,
            'timeout'     => 5,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking'    => true,
            'headers'     => array(
                'Authorization' => 'Bearer ' . $token,
                'Content-Type'  => 'application/json',
            ),
        );
        return wp_remote_post($url, $args);
    };
}

function enviar_mensagem_detalhada_apos_pedido($order_id)
{

    $order = wc_get_order($order_id);

    if (!$order) {
        return;
    }

    $phone = $order->get_billing_phone();
    $name = $order->get_billing_first_name();
    $total = number_format($order->get_total(), 2, ',', '.');

    $mensagem = "
Bem vindo ao THOMAS APP💡\n\n
Voce acaba de efetuar uma compra no BEK BURITIS🛍🤠 \n\n
Pedido: #".$order_id." \n
Total: R$".$total." \n\n
Retire suas fichas direto no Bek Buritis \n\n
O BEK agradece.🥳\n
https://bekburitis.com.br 📚
    ";

    $instanceId = 'your_instance_id';
    $token = 'your_token';
    create_w_api_sender($instanceId, $token)($phone, $mensagem);

}
