<!doctype html>
<html class="fixed" id="html_id">

<head>
    <meta charset="utf-8">
    <title>@yield('title','Inicio')</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/notyJs.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/jquery.datetimepicker.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/validationEngine.jquery.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    @yield('header')
</head>

<body>
    <br>
    <div>
        <br>

        <div class="row">
            <div class="col-11 text-end">
                <label class=" text-primary-emphasis"> Escribanos por WhatsApp: 302 2200200 | servicio al cliente </label>
            </div>
            <div class="col-md-1 text-start"></div>
        </div>


        <div class="container-md text-center">
            <div class="row" style="display:flex; justify-content:space-between; align-items:center;">
                <div class="col-sm-3">
                    <img src="{{URL::asset('imagen/icon.png')}}" style="width: 20%;"  alt="totto_icon">
                </div>
                <div class="col-sm-9"></div>
            </div>
        </div>




        <div class="row">
            <div class="col-md-12 bg-black text-white text-center">
                < <span class="text-warning">NUEVA</span> COLECCIÓN PETS >
            </div>
        </div>

        <br>

        <div>
            <div class="row">
                <div class="col-12">
                    <section class="content-body">
                        <br>
                        @yield('content')
                        <br>
                    </section>
                </div>
            </div>
        </div>




        <div class="text-center">
            <div class="row">
            <div class="col-md-1 text-center"></div>
            <div class="col-md-10 text-center">
                <hr>
            </div>    
            <div class="col-md-1 text-center"></div>
        </div>
        
        <div class="row">
            <div class="col-md-12 text-center">
                <p>¿Necesitas ayuda?</p>
                <p>Linea nacional: 01 800 210203 - Bogotá: 39073 93</p>
                <p>Email: servicioalcliente@tottoo.com</p>
                <p>o escribenos a la linea de Whatapps: 302 2200200</p>
            </div>
        </div>
        <br>
        <div class="row  bg-black text-white text-start pt-3">
        <div class="col-md-1"></div>
            <div class="col-md-2">
                <p>Quienes somos</p>
                <p>Linea Etica</p>
                <p>Talento Totto</p>
                <p>Sostenibilidad</p>
                <p>Prensa</p>
                <p>Negocios empresariales</p>
                <p>Politoca de Tratamiento de Datos</p>
            </div>
            <div class="col-md-2">
                <p>Servicio al cliente</p>
                <p>Encuentra tu tienda</p>
                <p>Tiendas Totto Pets</p>
                <p>Promociones vigentes</p>
                <p>Envios y Devoluciones</p>
                <p>Escribenos por WhatsApp</p>
                <p>Keypago, paga facil</p>
            </div>
            <div class="col-md-2">
                <p>Siguenos</p>
                <p>
                    <img src="{{URL::asset('imagen/facebook.svg')}}" class="img-fluid" alt="facebook">
                    <img src="{{URL::asset('imagen/twitter.svg')}}" class="img-fluid" alt="twitter">
                    <img src="{{URL::asset('imagen/instagram.svg')}}" class="img-fluid" alt="instagram">
                    <img src="{{URL::asset('imagen/youtube.svg')}}" class="img-fluid" alt="youtube">
                </p>
                <p>
                    <img src="{{URL::asset('imagen/medios-de-pago.png')}}" class="img-fluid" alt="medios_pago">
                </p>
            </div>
            <div class="col-md-4">
                <p>¡Registrate o actualiza tus datos!</p>
                <p>Te damos la bienvenida registrado y/o actualizando tus datos, recibe 10% de descuento en tu proxima compra redimelo unicamente en nuestra tienda online. </p>
                <p>Y ademas disfruta 25% de desceunto en tu compra en el mes de cumpleaños.</p>
                <p>'Los descuentos de registro/actualizacion y cumpleaños no son acumulabres. <b>*Aplica terminos y condiciones.</b></p>
                <p>'Aplica para productos sin descuento o ful price.</p>
            </div>

            <div class="col-md-1"></div>
        </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="{{URL::asset('js/jquery.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.js')}}"></script>
<script src="{{URL::asset('js/notyJs.js')}}"></script>
<script src="{{URL::asset('js/jquery.validationEngine.js')}}"></script>
<script src="{{URL::asset('js/jquery.validationEngine-es.js')}}"></script>
<script src="{{URL::asset('js/jquery.datetimepicker.js')}}"></script>
<script src="{{URL::asset('js/local.js')}}"></script>

@yield('footer')



</html>