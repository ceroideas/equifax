<?php


if($_SERVER['SERVER_NAME']=='develop.dividae.com'||$_SERVER['SERVER_NAME']=='127.0.0.1'){
    /* Entorno test autorization, url, partner_id, private_key */
    return [
        'arg1'=> '778199111ac61968b18ac08c36aa04b44aa0ecc6',
        'arg2'=> 'https://rest-demo.wannme.com:443/integration/v2/wannmepay/payment/',
        'arg3'=> '-dq7jmsf5v3i6oiockve',
        'arg4'=>'AXLQtVw*9pgJ541PUdRy8oGVKQIxS5'
        ];
}else{

    /* Claves de entorno produccion */
    return [
        'arg1'=> '778199111ac61968b18ac08c36aa04b44aa0ecc6',
        'arg2'=> 'https://rest-demo.wannme.com:443/integration/v2/wannmepay/payment/',
        'arg3'=> '-dq7jmsf5v3i6oiockve',
        'arg4'=>'AXLQtVw*9pgJ541PUdRy8oGVKQIxS5'
        ];
}
