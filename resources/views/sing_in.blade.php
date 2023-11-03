@extends('main')

@section('title','Varificacion de ingreso')

@section('header')




@endsection

@section('content')


<form name="frmSingIn" id="frmSingIn" method="POST" enctype="multipart/form-data" onKeyPress="return disableEnterKey(event)" onsubmit="return false;">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control validate[required,custom[email]]" value="{!! $data['email'] !!}" disabled>
                    <label for="email">Email*</label>
                </div>
            </div>
            <div class="col-md-12" style="display:none">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control validate[required,custom[email]]" name="email" id="email" placeholder="name@example.com" value="{!! $data['email'] !!}">
                    <label for="email">Email*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control validate[required, minSize[4], maxSize[10]]" name="identification" id="identification" placeholder="identification" autocomplete="off">
                    <label for="identification">Cédula/Identificación*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control validate[required, minSize[3], maxSize[30]]" name="first_name" id="first_name" placeholder="Nombre" autocomplete="off">
                    <label for="first_name">Nombre*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control validate[required, minSize[3], maxSize[30]]" name="last_name" id="last_name" placeholder="Apellido" autocomplete="off">
                    <label for="last_name">Apellido*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="departamento" name="departamento" aria-label="- Seleccione una opcion - " onchange="getDepartamento(this.value)">
                        <option selected> - Seleccione una opcion -</option>
                    </select>
                    <label for="departamento">Departamento *</label>
                </div>
            </div>
            <div class="col-md-12" style="display:none" id="municioContainer">
                <div class="form-floating mb-3">
                    <select class="form-select" id="municipio" name="municipio" aria-label="- Seleccione una opcion - " >
                        <option selected> - Seleccione una opcion -</option>
                    </select>
                    <label for="municipio">municipio *</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control validate[required, minSize[10], maxSize[10]]" name="phone" id="phone" placeholder="Número Móvil" autocomplete="off">
                    <label for="phone">Número Móvil*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control validate[required]" name="birth_date" id="birth_date" placeholder="YYYY-MM-DD" autocomplete="off">
                    <label for="birth_date">Fecha Nacimiento (año/mm/dd)*</label>
                </div>
            </div>


            <div class="col-md-12 text-start">
                <label class="form-group has-float-label"> ¿Tiene Hijos ? </label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hijos" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Si</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hijos" id="inlineRadio2" value="0">
                    <label class="form-check-label" for="inlineRadio2">No</label>
                </div>
            </div>
            <br>
            <div class="col-md-12 text-start">
                <label class="form-group has-float-label"> Género </label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="inlineRadioGenero1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="inlineRadioGenero2" value="0">
                    <label class="form-check-label" for="inlineRadio2">Femenino</label>
                </div>
            </div>
            <br>
            <div class="form-check text-start">
                <input class="form-check-input" type="checkbox" value="1" id="tyc">
                <label class="form-check-label" for="flexCheckDefault">
                    <u>Acepto los tyc para la actualización de datos</u>
                </label>
            </div>
            <div class="form-check text-start">
                <input class="form-check-input" type="checkbox" value="1" id="datosP">
                <label class="form-check-label" for="flexCheckDefault">
                    <u>Autorizo el tratamiento de mis datos personales</u>
                </label>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-dark" type="submit"> ENVIAR </button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
        
    </div>

</form>

@endsection

@section('footer')

@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

<script>
    function disableEnterKey(e) {
        var key;
        if (window.event) {
            key = window.event.keyCode;
        } else {
            key = e.which;
        }
        if (key == 13) {
            return false;
        } else {
            return true;
        }
    }     

    $.ajax({
        
        url:"https://www.datos.gov.co/resource/4mwt-69km.json",
        type: "GET",
        success: function(opciones){
            let data = new Set()
            opciones.map(function(opcion) {
                data.add(opcion.departamento)
            })
            Array.from(data).map(function(data) {
                $('#departamento').append(new Option(data, data));
            });
        }
    })

    function getDepartamento(valor){

        let select_item = document.getElementById('municipio');
        let options = select_item.getElementsByTagName('option');

        for (var i=options.length; i--;) {
            select_item.removeChild(options[i]);
        }

        $.ajax({
        url:"https://www.datos.gov.co/resource/4mwt-69km.json",
        type: "GET",
        success: function(opciones){
            let data = new Set();
            opciones.map(function(opcion) {
                if(opcion.departamento == valor){
                    data.add(opcion.municipio)
                }
            })
            Array.from(data).map(function(data) {
                $('#municipio').append(new Option(data, data));
            });
            $('#municioContainer').show();
        }
        })
    }

    $(document).ready(function() {

        $("#frmSingIn").validationEngine('attach', {
           
            onValidationComplete: function(form, status) {
                if (status === true) {
                    sendInformationRegister();
                } else {
                    callForNecessaryInputs();
                    return;
                }
            }

        });

        $('#birth_date').datetimepicker({
            format: "Y-m-d",
            language: 'es',
            startDate:'+1950/01/02',
            maxDate:'+1950/01/02',
            timepicker: false,
            onChangeDateTime: function(ct, $input) {
                console.log('onChange: ' + $input.val());
            },
            onClose: function(ct, $input) {
                console.log('close.');
            },
            onShow: function(ct, $input) {
                console.log('show.');
            },
        });
    })


    function sendInformationRegister(){

        const checkedTyc = document.querySelector('#tyc:checked') !== null;
        const checkedDatosP = document.querySelector('#datosP:checked') !== null;

        if(checkedTyc == false || checkedDatosP == false ){
            var msg = "<center><p><i class='fas fa-check-circle fa-3x'></i> <br> Debe aceptar terminos y condiciones y tratamiento de datos </p></center>";
            var layout='center';
            var timeout=1500;
            var type='error';
            callNotyTime(type,msg,layout,timeout);
            return;
        }

        $.ajax({
            type: "POST",
            url: "/totto/sing_in",
            dataType: 'text',
            data: $("#frmSingIn").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                callNotyLoadProcess();
            },
            success: function(r){
                var datUsr=r.split("|");
                var valor=datUsr[1];
                var msg=datUsr[2];
                if(valor == 0) {
                    var msg = "<center><p><i class='fas fa-check-circle fa-3x'></i> <br>" + msg +"</p></center>";
                    var layout='center';
                    var timeout=1500;
                    var type='error';
                    callNotyTime(type,msg,layout,timeout);
                }else{
                    var msg="<center><p><i class='fas fa-check-circle fa-3x'></i> <br>" +msg+ "</p></center>";
                    new Noty({
                        text: msg,
                        layout: 'center',
                        theme: 'mint',
                        killer:true,
                        progressBar:true,
                        timeout:1500,
                        callbacks: {
                            afterClose: function() {
                                location.href = "/";
                            },
                        }
                    }).show();
                }
            }
        });
    }

</script>