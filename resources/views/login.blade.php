@extends('main')

@section('title','Varificacion de ingreso')

@section('header')

@endsection

@section('content')

<div class="text-center">


    <p text-center>Ingersa tu correo para validarte en nuestra base de datos y continuar con el proceso.</p>

    <form name="frmValidateUser" id="frmValidateUser" method="POST" enctype="multipart/form-data" onKeyPress="return disableEnterKey(event)" onsubmit="return false;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control validate[required,custom[email]]" name="email" id="email" placeholder="name@example.com" autocomplete="off">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-dark" type="submit"> ENVIAR </button>
            </div>
        </div>
    </form>
</div>

@endsection





@section('footer')

@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
        $("#frmValidateUser").validationEngine('attach', {
            onValidationComplete: function(form, status) {
                if (status === true) {
                    sendInformationToValidate();
                } else {
                    callForNecessaryInputs();
                    return;
                }
            }
        });
    })

    function sendInformationToValidate() {
        $.ajax({
            type: "POST",
            url: "/totto/frmValidateUser",
            dataType: 'text',
            data: $("#frmValidateUser").serialize(),
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
                    var msg = "<center><p><i class='fas fa-check-circle fa-3x'></i> <br><br>" + msg +"</p></center>";
                    new Noty({
                        text: msg,
                        layout: 'center',
                        theme: 'mint',
                        killer: true,
                        progressBar: true,
                        timeout: 1500,
                        callbacks: {
                            afterClose: function() {
                                location.href = "./totto/sing_in";
                            },
                        }
                    }).show();
                } else {
                    var msg = "<center><p><i class='fas fa-check-circle fa-3x'></i> <br><br>" + msg +"</p></center>";
                    new Noty({
                        text: msg,
                        layout: 'center',
                        theme: 'mint',
                        killer: true,
                        progressBar: true,
                        timeout: 1500,
                        callbacks: {
                            afterClose: function() {
                                location.href = "./totto/edit_profile";
                            },
                        }
                    }).show();
                }
            }
        });
    }
</script>