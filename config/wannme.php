<?php


if($_SERVER['SERVER_NAME']=='glc.dividae.com'||$_SERVER['SERVER_NAME']=='127.0.0.1'){
   
    return [
        'arg1'=> '778199111ac61968b18ac08c36aa04b44aa0ecc6',
        'arg2'=> 'https://rest-demo.wannme.com:443/integration/v2/wannmepay/payment/',
        'arg3'=> '-dq7jmsf5v3i6oiockve',
        'arg4'=>'AXLQtVw*9pgJ541PUdRy8oGVKQIxS5',
        'notificationURL'=> 'https://glc.dividae.com/callback',
        'returnOKURL'=> 'https://glc.dividae.com/claims',
        'returnKOURL'=> 'https://glc.dividae.com/callbackko'
        ];
}else{

 
    return [
        'arg1'=> 'eyJhbGciOiJIUzUxMiJ9.eyJxcsOTIjoiY20yMTJiMTExdiIsInRnd2XDiSI6Ikc1U1BDQUtTR0g1Iiwiw4lraHHDjXdresOJa8OTIjoidXJzdMOJIiwiZWE4d3lxaXdKIGvDk3c3w4lrw5NyIjoiY2LDsXYiLCJnd3nDiSI6IjlqTWZudmU3V2x6d3Z6eFFpM0M3RFE9PSIsInQgaiI6ImNiw7F2IiwicXkiOiJidjEiLCJhw4nDmjVyesOJIjoiWnFocXlyw4nCo2XDjXd5In0._O445pXEEME_tdLotAAtZLH_Ds_B_TSNj_HluEZB1lmA3a-r12MNlzotMoOtctuTD__Hvf_YOO1lZYCzJKhdwg',
        'arg2'=> 'https://rest.wannme.com/integration/v2/wannmepay/payment/',
        'arg3'=> 'pwfnuv4yqxze9z-ok52-',
        'arg4'=>'qlQrVtXyqzuJBTPlFCe0EKHt8310s5',
        'notificationURL'=> 'https://dividae.com/callback',
        'returnOKURL'=> 'https://dividae.com/claims',
        'returnKOURL'=> 'https://dividae.com/callbackko'
        ];
}
 