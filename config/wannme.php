<?php


if($_SERVER['SERVER_NAME']=='develop.dividae.com'||$_SERVER['SERVER_NAME']=='127.0.0.1'){
    /* Entorno test 1.autorization, 2.url, 3.partner_id, 4.private_key */
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
        'arg2'=> 'https://rest.wannme.com/integration/v2',
        'arg3'=> '-dq7jmsf5v3i6oiockve',
        'arg4'=>'qlQrVtXyqzuJBTPlFCe0EKHt8310s5'
        ];
}
