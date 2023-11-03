@extends('main')

@section('title','Varificacion de ingreso')

@section('header')

@endsection

@section('content')


<form name="frm_edit_profile" id="frm_edit_profile" method="POST" enctype="multipart/form-data" onKeyPress="return disableEnterKey(event)" onsubmit="return false;">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control validate[required,custom[email]]" value="{!! $data['user']->email !!}" disabled>
                    <label for="email">Email*</label>
                </div>
            </div>
            <div class="col-md-12" style="display:none">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control validate[required,custom[email]]" name="email" id="email" placeholder="name@example.com" value="{!! $data['user']->email !!}">
                    <label for="email">Email*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" value="{!! $data['user']->document !!}" disabled>
                    <label for="identification">Cédula/Identificación*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{!! $data['user']->name !!}" disabled>
                    <label for="first_name">Nombre*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{!! $data['user']->last_name !!}" disabled>
                    <label for="last_name">Apellido*</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{!! $data['user']->deparment !!}" disabled>
                    <label for="last_name">Departamento</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{!! $data['user']->city !!}" disabled>
                    <label for="last_name">Municipio</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{!! $data['user']->phone !!}" disabled>
                    <label for="last_name">Número Móvil</label>
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control validate[required]" name="birth_date" id="birth_date" placeholder="YYYY-MM-DD" value="{!! $data['user']->birth_date !!}" autocomplete="off">
                    <label for="birth_date">Fecha Nacimiento (año/mm/dd)*</label>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{{ $data['user']->have_children == 0 ? 'No' : 'Si' }}" disabled>
                    <label for="last_name"> ¿ Tiene Hijos ? </label>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{{ $data['user']->gener == 0 ? 'No' : 'Si' }}" disabled>
                    <label for="last_name">Género </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-dark" type="submit"> ACTUALIZAR </button>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet" />
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

    $(document).ready(function() {

        $("#frm_edit_profile").validationEngine('attach', {
            onValidationComplete: function(form, status) {
                if (status === true) {
                    sendInformationUpdate();
                } else {
                    callForNecessaryInputs();
                    return;
                }
            }
        });

        $('#birth_date').datetimepicker({
            format: "Y-m-d",
            language: 'es',
            startDate: '+1950/01/02',
            maxDate: '+1950/01/02',
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


    function sendInformationUpdate() {
        $.ajax({
            type: "POST",
            url: "/totto/edit_profile",
            dataType: 'text',
            data: $("#frm_edit_profile").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                callNotyLoadProcess();
            },
            success: function(r) {
                var datUsr = r.split("|");
                var valor = datUsr[1];
                var msg = datUsr[2];
                if (valor == 0) {
                    var msg = "<center><p><i class='fas fa-check-circle fa-3x'></i> <br>" + msg + "</p></center>";
                    var layout = 'center';
                    var timeout = 1500;
                    var type = 'error';
                    callNotyTime(type, msg, layout, timeout);
                } else {
                    var msg = "<center><p><i class='fas fa-check-circle fa-3x'></i> <br>" + msg+ "</p></center>";
                    new Noty({
                        text: msg,
                        layout: 'center',
                        theme: 'mint',
                        killer: true,
                        progressBar: true,
                        timeout: 1500,
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