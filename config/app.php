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
        ]
    ],

    "no_viables" => [
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
        [
            "deuda" => "HIPOTECARIA/ALQUILERES BIENES INMUEBLES",
            "prescripcion" => 2,
            "extrajudicial" => false,
            "judicial" => false
        ],
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
        'FASE PAGO',
        'FASE JUDICIAL',
        'FASE EXTRAJUDICIAL/JUDICIAL',
    ],
    'actuations' => [
        [
            'id' => 1,
            'phase' => 'FASE EXTRAJUDICIAL',
            'name' => 'FIN EXTRAJUDICIAL - INVIABLE',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 101,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'SE ENCUENTRA EN PARADERO DESCONOCIDO'],

                ['id' => 102,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'NO DISPONE DE BIENES PARA PODER HACER FRENTE A LA DEUDA'],

                ['id' => 103,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'NO DISPONE DE INGRESOS QUE HAGAN VIABLE LA RECUPERACIÓN DE LA DEUDA'],

                ['id' => 104,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'SE ENCUENTRA EN CONCURSO DE ACREEDORES'],

                ['id' => 105,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'LA DEUDA ESTÁ PRESCRITA'],

                ['id' => 106,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'CAMPO LIBRE PARA INDICAR EL MOTIVO '],

                ['id' => 107,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'Iniciado contacto telefónico'],

                ['id' => 108,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'Contacto telefónico sin éxito'],

                ['id' => 109,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'Contacto telefónico con éxito'],

                ['id' => 110,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'Email al deudor en curso'],

                ['id' => 111,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'No hemos podido contactar con el deudor. En esta ocasión, no hemos podido recupera tu factura. Nuestro equipo de Letrados ha estimado que no es una deuda viable judicialmente.'],

                ['id' => 112,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'No hemos podido alcanzar un acuerdo con el deudor. Dividae te recomienda la reclamación judicial.'],

                ['id' => 113,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'No hemos podido alcanzar un acuerdo con el deudor. En esta ocasión, no hemos podido recupera tu factura. Nuestro equipo de Letrados ha estimado que no es una deuda viable judicialmente.'],
            ],
        ],
        [
            'id' => 2,
            'phase' => 'FASE EXTRAJUDICIAL',
            'name' => 'FIN EXTRAJUDICIAL -PENDIENTE MONITORIO',
            'observations' => null,
            'self' => null,
            'hitos' => null,
        ],
        [
            'id' => 3,
            'phase' => 'FASE PAGO',
            'name' => 'PENDIENTE NUEVA FASE JUDICIAL',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 301,
                'redirect_to' => null,
                'email' => true,
                'payment' => true,
                'name' => 'A LA ESPERA DE ACEPTACIÓN Y ABONO HONORARIOS (SEGÚN TIPO ACCIÓN JUDICIAL)',],
                ['id' => 302,
                'redirect_to' => null,
                'email' => true,
                'payment' => true,
                'name' => 'A LA ESPERA DE ABONO TASA',],
                ['id' => 303,
                'redirect_to' => null,
                'email' => true,
                'payment' => true,
                'name' => 'A LA ESPERA DE FIRMA APODERAMIENTO APUD ACTA',],
                ['id' => 304,
                'redirect_to' => null,
                'email' => true,
                'payment' => true,
                'name' => 'A LA ESPERA DE PAGO DEPÓSITO PARA RECURRIR',],
            ],
        ],
        [
            'id' => 4,
            'phase' => 'FASE JUDICIAL',
            'name' => 'MONITORIO',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 401,
                'redirect_to' => -1,
                'email' => false,
                'payment' => false,
                'name' => 'DEMANDA MONITORIO PRESENTADA'],
                ['id' => 402,
                'redirect_to' => -1,
                'email' => false,
                'payment' => false,
                'name' => 'DEMANDA ADMITIDA A TRÁMITE'],
                ['id' => 403,
                'redirect_to' => -1,
                'email' => false,
                'payment' => false,
                'name' => 'MONITORIO EN TRÁMITE'],
                ['id' => 404,
                'redirect_to' => -1,
                'email' => false,
                'payment' => false,
                'name' => 'REQUERIMIENTO DE PAGO AL DEUDOR POSITIVO'],

            ],
        ],
        [
            'id' => 5,
            'phase' => 'FASE JUDICIAL',
            'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 501,
                'redirect_to' => -1,
                'email' => false,
                'payment' => false,
                'name' => 'ILOCALIZADO'],
                ['id' => 502,
                'redirect_to' => -1,
                'email' => false,
                'payment' => false,
                'name' => 'INCOMPETENCIA TERRITORIAL'],
                ['id' => 503,
                'redirect_to' => -1,
                'email' => false,
                'payment' => false,
                'name' => 'OTRO MOTIVO AJENO A DIVIDAE: campo explicativo libre'],
            ],
        ],
        [
            'id' => 6,
            'phase' => 'FASE JUDICIAL',
            'name' => 'PENDIENTE JUDICIAL - PROPUESA ALTERNATIVA',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 601,
                'redirect_to' => 3,
                'email' => true,
                'payment' => false,
                'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - PENDIENTE NUEVO MONITORIO'],
                ['id' => 602,
                'redirect_to' => 3,
                'email' => true,
                'payment' => false,
                'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - PENDIENTE VERBAL'],
                ['id' => 603,
                'redirect_to' => 3,
                'email' => true,
                'payment' => false,
                'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - PENDIENTE ORDINARIO'],
                ['id' => 604,
                'redirect_to' => 20,
                'email' => true,
                'payment' => false,
                'name' => 'ARCHIVO MONITORIO - FIN VÍA JUDICIAL - INVIABLE  SEGUIR CON RECLAMACIÓN JUDICIAL'],
            ],
        ],
        [
            'id' => 7,
            'phase' => 'FASE JUDICIAL',
            'name' => 'ARCHIVO MONITORIO - OPOSICIÓN CONTRARIO',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 701,
                'redirect_to' => 3,
                'email' => true,
                'payment' => false,
                'name' => 'ARCHIVO MONITORIO - OPOSICIÓN CONTRARIO - PENDIENTE VERBAL'],
                ['id' => 702,
                'redirect_to' => 3,
                'email' => true,
                'payment' => false,
                'name' => 'ARCHIVO MONITORIO - OPOSICIÓN CONTRARIO - PENDIENTE ORDINARIO'],
            ],
        ],
        [
            'id' => 8,
            'phase' => 'FASE JUDICIAL',
            'name' => 'ARCHIVO MONITORIO - ARCHIVO PARA EJECUTAR',
            'observations' => null,
            'self' => null,
            'hitos' => null,
        ],
        [
            'id' => 9,
            'phase' => 'FASE JUDICIAL',
            'name' => 'ARCHIVO MONITORIO - ARCHIVO PARA EJECUTAR - RECOMENDACIÓN EJECUCIÓN',
            'observations' => 'email',
            'self' => 3,
            'hitos' => null,
        ],
        [
            'id' => 10,
            'phase' => 'FASE JUDICIAL',
            'name' => 'INICIO PROCEDIMIENTO DECLARATIVO',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 1001,
                'redirect_to' => null,
                'email' => false,
                'payment' => false,
                'name' => 'IMPUGNACIÓN OPOSICIÓN DE CONTRARIO'],
                ['id' => 1002,
                'redirect_to' => null,
                'email' => false,
                'payment' => false,
                'name' => 'PRESENTACIÓN DEMANDA DE ORDINARIO'],
                ['id' => 1003,
                'redirect_to' => null,
                'email' => false,
                'payment' => false,
                'name' => 'PENDIENTE AUDIENCIA PREVIA'],
                ['id' => 1004,
                'redirect_to' => null,
                'email' => false,
                'payment' => false,
                'name' => 'PENDIENTE JUICIO'],
                ['id' => 1005,
                'redirect_to' => null,
                'email' => true,
                'payment' => false,
                'name' => 'SENTENCIA ESTIMATORIA'],
                ['id' => 1006,
                'redirect_to' => null,
                'email' => true,
                'payment' => false,
                'name' => 'SENTENCIA DESETIMATORIA'],

            ],
        ],
        [
            'id' => 11,
            'phase' => 'FASE JUDICIAL',
            'name' => 'SENTENCIA DICTADA - PROPUESTA RECURSO',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 1101,
                'redirect_to' => 3,
                'email' => true,
                'payment' => false,
                'name' => 'RECURSO DE CONTRARIO - PROPUESTA OPOSICIÓN RECURSO CONTRARIO'],
                ['id' => 1102,
                'redirect_to' => 3,
                'email' => true,
                'payment' => false,
                'name' => 'RECURSO A INSTANCIA DIVIDAE - PROPUESTA INTERPOSICIÓN RECURSO'],
            ],
        ],
        [
            'id' => 12,
            'phase' => 'FASE JUDICIAL',
            'name' => 'SENTENCIA DICTADA - PROPUESTA EJECUCIÓN',
            'observations' => null,
            'self' => 3,
            'hitos' => null,
        ],
        [
            'id' => 13,
            'phase' => 'FASE JUDICIAL',
            'name' => 'RECURSO PRESENTADO/OPUESTO',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 1301,
                'redirect_to' => null,
                'email' => false,
                'payment' => false,
                'name' => 'RECURSO PRESENTADO DE CONTRARIO'],
                ['id' => 1302,
                'redirect_to' => null,
                'email' => false,
                'payment' => false,
                'name' => 'OPOSICIÓN A RECURSO DE CONTRARIO'],
                ['id' => 1303,
                'redirect_to' => null,
                'email' => false,
                'payment' => false,
                'name' => 'RECURSO PRESENTADO'],
                ['id' => 1304,
                'redirect_to' => null,
                'email' => true,
                'payment' => false,
                'name' => 'SENTENCIA AL RECURSO'],
            ],
        ],
        [
            'id' => 14,
            'phase' => 'FASE JUDICIAL',
            'name' => 'EJECUCIÓN INICIADA',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 1401,
                'redirect_to' => null,
                'email' => null,
                'payment' => null,
                'name' => 'PRESENTADA DEMANDA DE EJECUCIÓN'],
                ['id' => 1402,
                'redirect_to' => null,
                'email' => null,
                'payment' => null,
                'name' => 'DESPACHO DE EJECUCIÓN'],
                ['id' => 1403,
                'redirect_to' => null,
                'email' => null,
                'payment' => null,
                'name' => 'VIA DE APREMIO - EMBARGOS ACORDADOS'],
            ],
        ],
        [
            'id' => 15,
            'phase' => 'FASE EXTRAJUDICIAL/JUDICIAL',
            'name' => 'COBRO PARCIAL RECIBIDO',
            'observations' => 'email',
            'self' => null,
            'hitos' => null,
        ],
        [
            'id' => 16,
            'phase' => 'FASE EXTRAJUDICIAL/JUDICIAL',
            'name' => 'COBRO TOTAL RECIBIDO',
            'observations' => 'email',
            'self' => 20,
            'hitos' => null,
        ],
        [
            'id' => 17,
            'phase' => 'FASE EXTRAJUDICIAL/JUDICIAL',
            'name' => 'ACUERDO ALCANZADO',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 1701,
                'redirect_to' => null,
                'email' => true,
                'payment' => false,
                'name' => 'ACUERDO ALCANZADO - PREAPROBADO POR DEUDOR'],
                ['id' => 1702,
                'redirect_to' => null,
                'email' => true,
                'payment' => false,
                'name' => 'ACUERDO ALCANZADO - PENDIENTE ACEPTACIÓN DEUDOR'],
                ['id' => 1703,
                'redirect_to' => null,
                'email' => true,
                'payment' => false,
                'name' => 'ACUERDO INCUMPLIDO - RECOMENDACIÓN VÍA JUDICIAL - DEMANDA EJECUCIÓN'],
            ],
        ],
        [
            'id' => 18,
            'phase' => 'FASE EXTRAJUDICIAL/JUDICIAL',
            'name' => 'ACEPTACIÓN/RECHAZO ACUERDO',
            'observations' => null,
            'self' => null,
            'hitos' => [
                ['id' => 1801,
                'redirect_to' => null,
                'email' => false,
                'payment' => false,
                'name' => 'ACUERDO ALCANZADO - ACEPTACIÓN DEUDOR'],
                ['id' => 1802,
                'redirect_to' => null,
                'email' => false,
                'payment' => false,
                'name' => 'ACUERDO RECHAZADO DEUDOR'],
            ],
        ],
        [
            'id' => 19,
            'phase' => 'FASE EXTRAJUDICIAL/JUDICIAL',
            'name' => 'DESISTIMIENTO ACCIONES - CIERRE FASE RECLAMACIÓN',
            'observations' => null,
            'self' => null,
            'hitos' => null,
        ],
        [
            'id' => 20,
            'phase' => 'FASE EXTRAJUDICIAL/JUDICIAL',
            'name' => 'RECLAMACIÓN TERMINADA',
            'observations' => 'email',
            'self' => null,
            'hitos' => null,
        ]
    ],
    'aliases' => Facade::defaultAliases()->merge([

        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        // ...
    ])->toArray(),


];
