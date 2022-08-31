<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'es',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        Maatwebsite\Excel\ExcelServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'deudas' => [

        [
            "deuda" => "CHEQUES / PAGARÉS",
            "prescripcion" => 3,
            "extrajudicial" => true,
            "judicial"=> true
        ],
        [
            "deuda" => "VENTA DE PRODUCTOS A CONSUMIDOR FINAL",
            "prescripcion" => 3,
            "extrajudicial" => true,
            "judicial"=> true
        ],
        [
            "deuda" => "HONORARIOS DE PROFESIONALES",
            "prescripcion" => 3,
            "extrajudicial" => true,
            "judicial"=> true
        ],
        [
            "deuda" => "VENTA DE PRODUCTOS FARMACEÚTICOS",
            "prescripcion" => 3,
            "extrajudicial" => true,
            "judicial"=> true
        ],
        [
            "deuda" => "ABONO COMIDA Y HABITACIÓN EN HOTELES",
            "prescripcion" => 3,
            "extrajudicial" => true,
            "judicial"=> true
        ],
        [
            "deuda" => "PRESTACIÓN DE SERVICIOS",
            "prescripcion" => 3,
            "extrajudicial" => true,
            "judicial"=> true,
            "cataluna" => 3
        ],
        [
            "deuda" => "VENTA DE PRODUCTOS MAYORISTA",
            "prescripcion" => 5,
            "extrajudicial" => true,
            "judicial"=> true
        ],
        [
            "deuda" => "COMPRAVENTA DE BIENES MUEBLES PARA REVENTA",
            "prescripcion" => 5,
            "extrajudicial" => true,
            "judicial"=> true
        ],
        [
            "deuda" => "PAGOS APLAZADOS",
            "prescripcion" => 5,
            "extrajudicial" => true,
            "judicial"=> true,
            "cataluna" => 3
        ],
        [
            "deuda" => "RESTO DE DEUDAS NO INCLUIDAS EN LAS ANTERIORES",
            "prescripcion" => 5,
            "extrajudicial" => true,
            "judicial"=> true,
            "cataluna" => 10
        ],
        [
            "deuda" => "HIPOTECARIA / ALQUILERES BIENES INMUEBLES. RECUPERACIÓN DE CANTIDADES ECONÓMICAS",
            "prescripcion" => 5,
            "extrajudicial" => true,
            "judicial"=> true,
            "cataluna" => 10
        ],
        /*[
            "deuda" => "Otro",
            "prescripcion" => 5,
            "extrajudicial" => true,
            "judicial"=> true,
            "cataluna" => 10
        ]*/
    ],

    "no_viables" => [
        [
            "deuda" => "HIPOTECARIA / ALQUILERES BIENES INMUEBLES. RECUPERACIÓN DE CANTIDADES ECONÓMICAS + DESAHUCIO",
            "prescripcion" => 1,
            "extrajudicial" => false,
            "judicial" => false
        ],
        [
            "deuda" => "TRIBUTARIAS Y DE LA SEGURIDAD SOCIAL ",
            "prescripcion" => 4,
            "extrajudicial" => false,
            "judicial" => false
        ],
        [
            "deuda" => "INFRACCIONES Y SANCIONES ADMINISTRATIVAS",
            "prescripcion" => 3,
            "extrajudicial" => false,
            "judicial" => false
        ],
        /*[
            "deuda" => "HIPOTECARIA/ALQUILERES BIENES INMUEBLES",
            "prescripcion" => 2,
            "extrajudicial" => false,
            "judicial" => false
        ],*/
        [
            "deuda" => "RESPONSABILIDAD EXTRACONTRACTUAL / DAÑOS Y PERJUICIOS",
            "prescripcion" => 1,
            "extrajudicial" => false,
            "judicial" => false
        ],
        [
            "deuda" => "DEUDA TRANSPORTES MERCANCÍAS",
            "prescripcion" => 1,
            "extrajudicial" => false,
            "judicial" => false
        ],
        [
            "deuda" => "DEUDAS NO DOCUMENTADAS",
            "prescripcion" => 1,
            "extrajudicial" => false,
            "judicial" => false
        ]
    ],
    'phases' => [
        'FASE EXTRAJUDICIAL',
        'FASE JUDICIAL',
        'FASE PAGO'
    ],
    // -1 = reload
    // phases 0 extrajudicial, 1 judicial, 3 pago
    'actuations' => [
        [
            'id' => "0",
            'phase' => [2],
            'name' => 'FASE EXTRAJUDICIAL',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "001",
                'redirect_to' => null,
                'email' => false,
                'name' => 'DIVIDAE HA RECIBIDO TU EXPEDIENTE CORRECTAMENTE'],
                ['id' => "002",
                'redirect_to' => null,
                'email' => false,
                'name' => 'INICIADA RECLAMACIÓN - A TRAVÉS CONTACTO TELEFÓNICO'],
                ['id' => "003",
                'redirect_to' => null,
                'email' => false,
                'name' => 'ENVIADO E-MAIL A DEUDOR'],
                ['id' => "004",
                'redirect_to' => null,
                'email' => false,
                'name' => 'CONTACTO CON  DEUDOR CON ÉXITO - NEGOCIACIÓN ACUERDO'],

            ]
        ],
        [
            'id' => "1",
            'phase' => [2],
            'name' => 'FIN EXTRAJUDICIAL - INVIABLE',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "101",
                'redirect_to' => "20",
                'email' => true,
                'name' => 'SE ENCUENTRA EN PARADERO DESCONOCIDO'],

                ['id' => "102",
                'redirect_to' => "20",
                'email' => true,
                'name' => 'NO DISPONE DE BIENES PARA PODER HACER FRENTE A LA DEUDA'],

                ['id' => "103",
                'redirect_to' => "20",
                'email' => true,
                'name' => 'NO DISPONE DE INGRESOS QUE HAGAN VIABLE LA RECUPERACIÓN DE LA DEUDA'],

                ['id' => "104",
                'redirect_to' => "20",
                'email' => true,
                'name' => 'SE ENCUENTRA EN CONCURSO DE ACREEDORES'],

                ['id' => "105",
                'redirect_to' => "20",
                'email' => true,
                'name' => 'LA DEUDA ESTÁ PRESCRITA'],

                ['id' => "106",
                'redirect_to' => "20",
                'email' => true,
                'name' => 'CAMPO LIBRE PARA INDICAR EL MOTIVO '],
            ],
        ],
        [
            'id' => "2",
            'phase' => [2],
            'name' => 'FIN EXTRAJUDICIAL -PENDIENTE MONITORIO',
            'email' => null,
            'redirect_to' => "301",
            'type' => ['judicial_amount','judicial_fees'],
            'hitos' => null,
        ],
        [
            'id' => "3",
            'phase' => [3],
            'name' => 'PENDIENTE NUEVA FASE JUDICIAL',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "301",
                'redirect_to' => "302",
                'email' => true,
                'name' => 'A LA ESPERA DE FIRMA APODERAMIENTO APUD ACTA',],
                ['id' => "302",
                'redirect_to' => "303",
                'email' => true,
                'name' => 'A LA ESPERA DE ACEPTACIÓN Y ABONO HONORARIOS Y TASA/DEPÓSITO (SEGÚN TIPO ACCIÓN JUDICIAL)',],
                ['id' => "303",
                'redirect_to' => "21",
                'email' => true,
                'name' => 'COMPLETADA FASE PAGO CON ÉXITO ',],
            ],
        ],
        [
            'id' => "4",
            'phase' => [1],
            'name' => 'MONITORIO',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "401",
                'redirect_to' => null,
                'email' => false,
                'name' => 'DEMANDA MONITORIO PRESENTADA'],
                ['id' => "402",
                'redirect_to' => null,
                'email' => false,
                'name' => 'DEMANDA ADMITIDA A TRÁMITE'],
                ['id' => "403",
                'redirect_to' => null,
                'email' => false,
                'name' => 'MONITORIO EN TRÁMITE'],
                ['id' => "404",
                'redirect_to' => null,
                'email' => false,
                'name' => 'REQUERIMIENTO DE PAGO AL DEUDOR POSITIVO'],

            ],
        ],
        [
            'id' => "5",
            'phase' => [1],
            'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "501",
                'redirect_to' => null,
                'email' => false,
                'name' => 'ARCHIVO MONITORIO – DEUDOR ILOCALIZADO'],
                ['id' => "502",
                'redirect_to' => null,
                'email' => false,
                'name' => 'ARCHIVO MONITORIO – INCOMPETENCIA TERRITORIAL'],
                ['id' => "503",
                'redirect_to' => null,
                'email' => false,
                'name' => 'OTRO MOTIVO AJENO A DIVIDAE: campo explicativo libre'],
            ],
        ],
        [
            'id' => "6",
            'phase' => [1],
            'name' => 'PENDIENTE JUDICIAL - PROPUESA ALTERNATIVA',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "601",
                'redirect_to' => "301",
                'email' => true,
                'type' => ['judicial_amount','judicial_fees'],
                'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - PENDIENTE NUEVO MONITORIO'],
                ['id' => "602",
                'redirect_to' => "301",
                'email' => true,
                'type' => ['verbal_amount','verbal_fees'],
                'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - PENDIENTE VERBAL'],
                ['id' => "603",
                'redirect_to' => "301",
                'email' => true,
                'type' => ['ordinary_amount','ordinary_fees'],
                'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - PENDIENTE ORDINARIO'],
                ['id' => "604",
                'redirect_to' => "20",
                'email' => true,
                'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - INVIABLE  SEGUIR CON RECLAMACIÓN JUDICIAL'],
            ],
        ],
        [
            'id' => "7",
            'phase' => [1],
            'name' => 'ARCHIVO MONITORIO - OPOSICIÓN CONTRARIO',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "701",
                'redirect_to' => "301",
                'email' => true,
                'type' => ['verbal_amount','verbal_fees'],
                'name' => 'ARCHIVO MONITORIO - OPOSICIÓN CONTRARIO - PENDIENTE VERBAL'],
                ['id' => "702",
                'redirect_to' => "301",
                'email' => true,
                'type' => ['ordinary_amount','ordinary_fees'],
                'name' => 'ARCHIVO MONITORIO - OPOSICIÓN CONTRARIO - PENDIENTE ORDINARIO'],
            ],
        ],
        [
            'id' => "8",
            'phase' => [1],
            'name' => 'ARCHIVO MONITORIO - ARCHIVO PARA EJECUTAR',
            'email' => null,
            'redirect_to' => null,
            'hitos' => null,
        ],
        [
            'id' => "9",
            'phase' => [1],
            'name' => 'ARCHIVO MONITORIO - ARCHIVO PARA EJECUTAR - RECOMENDACIÓN EJECUCIÓN',
            'email' => true,
            'redirect_to' => "301",
            'type' => ['execution'],
            'hitos' => null,
        ],
        [
            'id' => "10",
            'phase' => [1],
            'name' => 'INICIO PROCEDIMIENTO DECLARATIVO',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "1001",
                'redirect_to' => null,
                'email' => false,
                'name' => 'IMPUGNACIÓN OPOSICIÓN DE CONTRARIO'],
                ['id' => "1002",
                'redirect_to' => null,
                'email' => false,
                'name' => 'PRESENTACIÓN DEMANDA DE ORDINARIO'],
                ['id' => "1003",
                'redirect_to' => null,
                'email' => false,
                'name' => 'PENDIENTE AUDIENCIA PREVIA'],
                ['id' => "1004",
                'redirect_to' => null,
                'email' => false,
                'name' => 'PENDIENTE JUICIO'],
                ['id' => "1005",
                'redirect_to' => null,
                'email' => true,
                'name' => 'SENTENCIA ESTIMATORIA'],
                ['id' => "1006",
                'redirect_to' => null,
                'email' => true,
                'name' => 'SENTENCIA DESETIMATORIA'],

            ],
        ],
        [
            'id' => "11",
            'phase' => [1],
            'name' => 'SENTENCIA DICTADA - PROPUESTA RECURSO',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "1101",
                'redirect_to' => "301",
                'email' => true,
                'type' => ['resource'],
                'name' => 'RECURSO DE CONTRARIO - PROPUESTA OPOSICIÓN RECURSO CONTRARIO'],
                ['id' => "1102",
                'redirect_to' => "301",
                'email' => true,
                'type' => ['resource'],
                'name' => 'RECURSO A INSTANCIA DIVIDAE - PROPUESTA INTERPOSICIÓN RECURSO'],
            ],
        ],
        [
            'id' => "12",
            'phase' => [1],
            'name' => 'SENTENCIA DICTADA - PROPUESTA EJECUCIÓN',
            'email' => null,
            'redirect_to' => "301",
            'type' => ['execution'],
            'hitos' => null,
        ],
        [
            'id' => "13",
            'phase' => [1],
            'name' => 'RECURSO PRESENTADO/OPUESTO',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "1301",
                'redirect_to' => null,
                'email' => false,
                'name' => 'RECURSO PRESENTADO DE CONTRARIO'],
                ['id' => "1302",
                'redirect_to' => null,
                'email' => false,
                'name' => 'OPOSICIÓN A RECURSO DE CONTRARIO'],
                ['id' => "1303",
                'redirect_to' => null,
                'email' => false,
                'name' => 'RECURSO PRESENTADO'],
                ['id' => "1304",
                'redirect_to' => null,
                'email' => true,
                'name' => 'SENTENCIA AL RECURSO'],
            ],
        ],
        [
            'id' => "14",
            'phase' => [1],
            'name' => 'EJECUCIÓN INICIADA',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "1401",
                'redirect_to' => null,
                'email' => null,
                'name' => 'PRESENTADA DEMANDA DE EJECUCIÓN'],
                ['id' => "1402",
                'redirect_to' => null,
                'email' => null,
                'name' => 'DESPACHO DE EJECUCIÓN'],
                ['id' => "1403",
                'redirect_to' => null,
                'email' => null,
                'name' => 'VIA DE APREMIO - EMBARGOS ACORDADOS'],
            ],
        ],
        [
            'id' => "15",
            'phase' => [1,2],
            'name' => 'COBRO PARCIAL RECIBIDO',
            'email' => true,
            'redirect_to' => null,
            'hitos' => null,
        ],
        [
            'id' => "16",
            'phase' => [1,2],
            'name' => 'COBRO TOTAL RECIBIDO',
            'email' => true,
            'redirect_to' => "20",
            'hitos' => null,
        ],
        [
            'id' => "17",
            'phase' => [1,2],
            'name' => 'ACUERDO ALCANZADO',
            'email' => null,
            'redirect_to' => null,
            'hitos' => [
                ['id' => "1701",
                'redirect_to' => null,
                'email' => true,
                'name' => 'ACUERDO ALCANZADO - PREAPROBADO POR CLIENTE'],

                ['id' => "1702",
                'redirect_to' => "1703",
                'email' => true,
                'name' => 'ACUERDO ALCANZADO - PENDIENTE ACEPTACIÓN CLIENTE'],

                ['id' => "1703",
                'redirect_to' => null,
                'email' => true,
                'name' => 'ACUERDO ALCANZADO - APROBADO POR CLIENTE'],

                ['id' => "1704",
                'redirect_to' => null,
                'email' => true,
                'name' => 'ACUERDO ALCANZADO - RECHAZADO POR CLIENTE'],

                ['id' => "1705",
                'redirect_to' => "301",
                'email' => true,
                'type' => ['execution'],
                'name' => 'ACUERDO INCUMPLIDO - RECOMENDACIÓN VÍA JUDICIAL - DEMANDA EJECUCIÓN'],

                ['id' => "1706",
                'redirect_to' => "301",
                'email' => true,
                'type' => ['judicial_amount','judicial_fees'],
                'name' => 'ACUERDO INCUMPLIDO - RECOMENDACIÓN VÍA JUDICIAL - DEMANDA MONITORIO'],

                ['id' => "1707",
                'redirect_to' => null,
                'email' => true,
                'name' => 'ACUERDO RECHAZADO DEUDOR'],
            ],
        ],
        [
            'id' => "18",
            'phase' => [1,2],
            'name' => null,
            'email' => null,
            'redirect_to' => null,
            'hitos' => null,
        ],
        [
            'id' => "19",
            'phase' => [1,2],
            'name' => 'DESISTIMIENTO ACCIONES - CIERRE FASE RECLAMACIÓN',
            'email' => null,
            'redirect_to' => "20",
            'hitos' => null,
        ],
        [
            'id' => "20",
            'phase' => [1,2],
            'name' => 'RECLAMACIÓN TERMINADA',
            'email' => true,
            'redirect_to' => null,
            'hitos' => null,
        ],
        [
            'id' => "21",
            'phase' => [1],
            'name' => 'PAGADO CONTINÚA CON RECLAMACIÓN JUDICIAL',
            'email' => true,
            'redirect_to' => null,
            'hitos' => null,
        ],
        [
            'id' => "-1",
            'phase' => null,
            'name' => 'TOKEN',
            'email' => true,
            'redirect_to' => "001",
            'hitos' => null,
        ],
    ],
    'aliases' => Facade::defaultAliases()->merge([

        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        // ...
    ])->toArray(),

    'infopago' => [
        ['hito'=>"201",
         'titulo'=>'FIN EXTRAJUDICIAL -PENDIENTE MONITORIO',
         'msg'=>'¡Vaya! No hemos conseguido alcanzar un acuerdo con tu deudor, Dividae te recomienda que continues por la vía judicial, ya que según tu reclamación consideramos que puede prosperar.
                Para continuar la vía judicial, tienes que abonar la tarifa correspondiente al procedimiento monitorio * ',
         'concepto'=>'Procedimiento monitorio',
         'importe'=>'69,90'
        ],
        ['hito'=>"601",
         'titulo'=>'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - PENDIENTE NUEVO MONITORIO',
         'msg'=>'¡Vaya! El juzgado no ha localizado al deudor con la información que nos has facilitado, pero aún nos queda camino juntos, ya que durante el procedimiento hemos identificado un nuevo domicilio donde localizarlo/a.
                Para continuar por la vía judicial, Dividae te recomienda  que abones la tarifa correspondiente al procedimiento monitorio * ',
         'concepto'=>'Procedimiento monitorio',
         'importe'=>'69,90'
       ],
       ['hito'=>"602",
        'titulo'=>'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - PENDIENTE VERBAL',
        'msg'=>'¡Vaya! La información que has aportado no es suficiente para reclamar la deuda por el procedimiento monitorio. Pero aún nos queda camino juntos, ya que sí es posible seguir reclamándola por el procedimiento verbal*.
               Para seguir avanzando, necesitamos que abones la tarifa del procedimiento verbal * ',
         'concepto'=>'Procedimiento verbal',
         'importe'=>'199,90'
        ],
        ['hito'=>"603",
         'titulo'=>'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - PENDIENTE ORDINARIO',
         'msg'=>'¡Vaya! La información que has aportado no es suficiente para reclamar la deuda por el procedimiento monitorio. Pero aún nos queda camino juntos, ya que sí es posible seguir reclamándola por el procedimiento ordinario*.
               Para seguir avanzando, necesitamos que abones la tarifa del procedimiento ordinario * ',
         'concepto'=>'Procedimiento ordinario',
         'importe'=>'399,90'
        ],
        ['hito'=>"701",
         'titulo'=>'ARCHIVO MONITORIO - OPOSICIÓN CONTRARIO - PENDIENTE VERBAL',
         'msg'=>'¡Vaya! El deudor se ha opuesto a tu demanda, parece que nos encontramos con una deuda discutida y tu procedimiento va a derivar en un verbal por decisión judicial.
                Para seguir avanzando tendrás que abonar la tarifa del procedimiento verbal * ',
         'concepto'=>'Procedimiento verbal',
         'importe'=>'199,99'
        ],
        ['hito'=>"702",
         'titulo'=>'ARCHIVO MONITORIO - OPOSICIÓN CONTRARIO - PENDIENTE ORDINARIO',
         'msg'=>'¡Vaya! El deudor se ha opuesto a tu demanda, parece que nos encontramos con una deuda discutida y tu procedimiento va a derivar en un verbal por decisión judicial.
               Para seguir avanzando tendrás que abonar la tarifa del procedimiento ordinario * ',
         'concepto'=>'Procedimiento ordinario',
         'importe'=>'399,90'
        ],
        ['hito'=>"1101",
         'titulo'=>'RECURSO DE CONTRARIO - PROPUESTA OPOSICIÓN RECURSO CONTRARIO',
         'msg'=>'¡Vaya! La parte contraria no está de acuerdo con la resolución establecida por el Juzgado, para poder oponernos a su recurso necesitamos que tomes una decisión.
                Para seguir con la reclamación tendrás que abonar la tarifa correspondiente para comenzar un recurso de contrario *',
         'concepto'=>'Tarifa recurso',
         'importe'=>'149,90'
        ],
        ['hito'=>"1102",
         'titulo'=>'RECURSO A INSTANCIA DIVIDAE - PROPUESTA INTERPOSICIÓN RECURSO',
         'msg'=>'Como sabes, el Juzgado ha desestimado tu reclamación. Tras analizar la resolución, te recomendamos recurrirla.
               Para seguir avanzando tendrás que abonar la tarifa recurso* y el depósito recurrir apelación **.',
         'concepto'=>'Tarifa recurso',
         'importe'=>'149,90'
        ],
        ['hito'=>"1201",
         'titulo'=>'SENTENCIA DICTADA - PROPUESTA EJECUCIÓN',
         'msg'=>'¡Buenas noticias! La resolución nos ha dado la razón. Para poder recuperar la deuda, Dividae te recomienda presentar una demanda de ejecución para embargar los bienes de tu deudor. Para ello necesitamos que tomes una decisión: Proceder con la ejecución.
               Para seguir, Dividae te recomienda abonar la tarifa ejecución*.',
         'concepto'=>'Tarifa ejecución',
         'importe'=>'149,90'
        ],
        ['hito'=>"1703",
         'titulo'=>'ACUERDO INCUMPLIDO - RECOMENDACIÓN VÍA JUDICIAL - DEMANDA EJECUCIÓN',
         'msg'=>'¡Buenas noticias! La resolución nos ha dado la razón. Para poder recuperar la deuda, Dividae te recomienda presentar una demanda de ejecución para embargar los bienes de tu deudor. Para ello necesitamos que tomes una decisión: Proceder con la ejecución.
              Para seguir, Dividae te recomienda abonar la tarifa ejecución*.',
         'concepto'=>'tarifa ejecución',
         'importe'=>'149,90'
        ]
    ]
];
