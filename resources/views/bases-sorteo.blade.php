<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="ZTvvFBs0fJ6f864MWTU3BPQOJfKdC9Xa0PneA26E">

    <meta name="robots" content="index, follow" />

    <title>Dividae - ¿Quiénes somos?</title>
    <meta name="description" content="Dividae es una plataforma 100% online que ofrece a PYMES y autónomos la solución para reclamar facturas impagadas."/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('landing') }}/app_quental.css">
    @include('styles2')

    <style>
        .owl-carousel img {
            display: inline-block !important;
            width: auto !important;
        }

        .progressbar {
            -webkit-transition: width 1s ease;
            transition: width 1s ease
        }

        .vue-step-wizard {
            background-color: #f7f8fc;
            width: 900px;
            margin: auto;
            padding: 40px
        }

        .step-progress {
            height: 1rem;
            background: #fff;
            border-radius: 1rem;
            margin: 1rem 0
        }

        .step-progress .bar {
            content: "";
            height: 1rem;
            border-radius: 1rem;
            background-color: #4b8aeb
        }

        .step-pills {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            background-color: #fff;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1rem;
            border-radius: 1rem;
            -webkit-box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important
        }

        .step-pills .step-item {
            background-color: #f5f5f5;
            border-radius: 10px;
            padding: 5px 20px;
            list-style-type: none;
            padding: .5rem 1.5rem
        }

        .step-pills .step-item a {
            text-decoration: none;
            color: #7b7b7b
        }

        .step-pills .step-item.active {
            border: 1px solid #4b8aeb
        }

        .step-pills .step-item.validated {
            border: 1px solid #008011
        }

        .step-body {
            background-color: #fff;
            margin-left: auto;
            -webkit-box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important
        }

        .step-body,
        .step-footer {
            padding: 1rem;
            border-radius: 1rem
        }

        .step-footer {
            margin-left: auto;
            margin: 1rem 0;
            text-align: center
        }

        .step-button {
            font-weight: 700;
            line-height: 1;
            text-transform: uppercase;
            position: relative;
            max-width: 30rem;
            text-align: center;
            border: 1px solid;
            border-radius: 12px;
            color: #22292f;
            color: rgba(34, 41, 47, var(--text-opacity));
            padding: .5rem 1.25rem;
            font-size: .875rem;
            margin: .5rem;
            color: #fff;
            outline: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important
        }

        .step-button-next {
            background-color: #126fde
        }

        .step-button-previous {
            background-color: #3deaba
        }

        .step-button-submit {
            background-color: #4fa203
        }

        .step-button-reset {
            background-color: #037da2
        }

        .tabStatus {
            display: inline-block;
            width: 1.5rem;
            height: 1.5rem;
            margin-right: .5rem;
            line-height: 1.5rem;
            color: #fff;
            text-align: center;
            background: rgba(0, 0, 0, .38);
            border-radius: 50%
        }

    </style>

</head>

<body>
    <div id="app">
        <main>
            <div data-v-effc9f78="" data-v-c7d18d50="">
                <div data-v-c7d18d50="" data-v-effc9f78="" class="block-About">

                    @include('front.navbar')

                    <div data-v-c7d18d50="" data-v-effc9f78="" class="container About">
                        <div data-v-c7d18d50="" data-v-effc9f78="" class="row">
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-title">Bases legales del sorteo</div>
                            </div>
                            <div data-v-c7d18d50="" data-v-effc9f78=""
                                class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div data-v-c7d18d50="" data-v-effc9f78="" class="About-text">

                                </div>
                            </div>
                        </div>
                    </div>
                    @include('followus')
                </div>

                <div class="container bottom-text">
                    <h2>Bases Legales sorteo FEDETO</h2>
                    <ol>
                        <!-- Bases Sorteo camisetas tarasona
                        <li>Empresa organizadora: El sorteo de la camiseta firmada por los jugadores del S.D Tarazona está organizado por DIVIDAE RECOVERY S.L., mercantil con sede social en Madrid, con plataforma digital de recuperación de facturas impagadas, con domicilio fiscal en la Calle de Príncipe de Vergara 37-1, 28001 y con CIF: B-06970677, a través de su plataforma digital de recuperación de facturas impagadas www.dividae.com</li>
                        <li>Requisitos de participación: El sorteo está abierto a todas las personas mayores de 18 años que residan legalmente en España. No podrán participar empleados de Dividae ni sus familiares directos.</li>
                        <li>Mecánica del sorteo: Para poder participar, los interesados deberán cumplir con los requisitos establecidos en la convocatoria del sorteo, que se realizará a través de las redes sociales de Dividae o en su página web oficial. Los participantes deberán seguir las instrucciones proporcionadas y completar todos los pasos requeridos para validar su participación.</li>
                        <li>Fechas del sorteo: El sorteo comenzará el 12 de junio de 2023 y finalizará el 19 de junio de 2023. Los ganadores serán seleccionados aleatoriamente entre todos los participantes elegibles el 19 de junio a las 16:00. El ganador será anunciado públicamente a través de las redes sociales de Dividae y se le notificará directamente por correo electrónico o mensaje privado.</li>
                        <li>Premio: El premio consiste en una camiseta oficial del S.D Tarazona firmada por los jugadores del equipo. El premio es personal e intransferible, y no podrá ser canjeado por su valor en efectivo ni por otro producto distinto al establecido.</li>
                        <li>Comunicación con el ganador: Una vez realizado el sorteo, Dividae se pondrá en contacto con el ganador a través de los datos proporcionados en su participación. Si el ganador no responde en un plazo de 30 desde la primera notificación, se entenderá que renuncia al premio y se procederá a seleccionar a un nuevo ganador de forma aleatoria.</li>
                        <li>Protección de datos personales: Dividae garantiza el cumplimiento de la normativa vigente en materia de protección de datos personales. Los datos recopilados durante el proceso de participación serán utilizados únicamente con el propósito de gestionar el sorteo y entregar el premio al ganador.</li>
                        <li>Responsabilidad: Dividae no se hace responsable de ninguna pérdida, robo, retraso o daño en el premio una vez entregado al ganador. Además, Dividae se reserva el derecho de modificar las bases del sorteo, cancelar o suspender el sorteo en caso de fuerza mayor o circunstancias que lo justifiquen.</li>
                        <li>Aceptación de las bases: La participación en el sorteo implica la aceptación de estas bases legales en su totalidad. Cualquier incumplimiento de las bases o cualquier intento de manipulación del sorteo dará lugar a la descalificación del participante.</li>
                        -->
                        <li>Empresa organizadora: El sorteo de la cena para dos personas en el restaurante Ivan Cerdeño (https://xn--ivancerdeo-19a.com/) está organizado por DIVIDAE RECOVERY S.L., mercantil con sede social en Madrid, con, plataforma digital de recuperación de facturas impagadas, con domicilio fiscal en la Calle Basílica 17, 1ª planta (Entrada Oficinas), Madrid y con CIF: B-06970677, a través de su plataforma digital de recuperación de facturas impagadas www.dividae.com</li>
                        <li>Requisitos de participación: El sorteo está abierto a todas las personas que accedan a través del código de descuento: dividae.com/register?FEDETO y que suban por lo menos, una reclamación impagada de una factura. </li>
                        <li>Mecánica del sorteo: Para poder participar, los interesados deberán cumplir con los requisitos establecidos en la convocatoria del sorteo, que se realizará a través de las redes sociales de Dividae o en su página web oficial. Los participantes deberán seguir las instrucciones proporcionadas y completar todos los pasos requeridos para validar su participación.</li>
                        <li>Fechas del sorteo: El sorteo comenzará el 25 de octubre de 2023 y finalizará el 20 de diciembre de 2023. Los ganadores serán seleccionados aleatoriamente entre todos los participantes elegibles el 20 de diciembre a las 16:00. El ganador será anunciado públicamente a través de las redes sociales de Dividae y se le notificará directamente por correo electrónico o mensaje privado.</li>
                        <li>Límite de participantes: El sorteo se llevará a cabo durante las fechas previamente mencionadas, pero únicamente tendrá lugar si se alcanza un mínimo de 20 participantes. En caso de no alcanzar el mínimo de 20 participantes antes de la fecha de finalización, el sorteo podrá ser pospuesto o cancelado a discreción de Dividae. Si el sorteo es cancelado debido a la falta de participantes, el organizador no será responsable ante ningún participante y no se otorgará ningún premio.</li>
                        <li>Premio: El premio consiste en una cena para dos en el restaurante Ivan Cerdeño (https://xn--ivancerdeo-19a.com/). El premio es personal e intransferible, y no podrá ser canjeado por su valor en efectivo ni por otro producto distinto al establecido.</li>
                        <li>Comunicación con el ganador: Una vez realizado el sorteo, Dividae se pondrá en contacto con el ganador a través de los datos proporcionados en su participación. Si el ganador no responde en un plazo de 30 desde la primera notificación, se entenderá que renuncia al premio y se procederá a seleccionar a un nuevo ganador de forma aleatoria.</li>
                        <li>Protección de datos personales: Dividae garantiza el cumplimiento de la normativa vigente en materia de protección de datos personales. Los datos recopilados durante el proceso de participación serán utilizados únicamente con el propósito de gestionar el sorteo y entregar el premio al ganador.</li>
                        <li>Responsabilidad: Dividae no se hace responsable de ninguna pérdida, robo, retraso o daño en el premio una vez entregado al ganador. Además, Dividae se reserva el derecho de modificar las bases del sorteo, cancelar o suspender el sorteo en caso de fuerza mayor o circunstancias que lo justifiquen.</li>
                        <li>Aceptación de las bases: La participación en el sorteo implica la aceptación de estas bases legales en su totalidad. Cualquier incumplimiento de las bases o cualquier intento de manipulación del sorteo dará lugar a la descalificación del participante.</li>
                    </ol>
                </div>
                @include('footer', ['contact' => true])
            </div>
        </main>
    </div>
    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ url('landing') }}/plugins/owl/js/owl.carousel.js"></script>
    <script src="{{ url('landing') }}/plugins/owl/js/owl.navigation.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    @yield('extrajs')

    <script>
        var owl = $('#about-slider').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: true,
            center: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        });
    </script>



</body>

</html>
