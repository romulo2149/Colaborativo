@extends('layouts.app')

@section('content')
<body>
<div class="spacing50"></div>
<div class="container">
<div class="container">
    <div class="row form-group product-chooser">
    
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-1">
    		<div id="divF" class="product-chooser-item" style="margin: 0 auto; display: inline-block;">
                <div style="margin-left: 43px;">
    			    <img src="{{asset('img/freelancer.png')}}" style="width:250px;height:250px;display:inline-block;margin:auto;" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile and Desktop">
                </div>
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
    				<span class="title"><h3 style="text-align:center;">Freelancer</h3></span>
    				<span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
    				<input type="radio" name="product" value="mobile_desktop" checked="checked">
    			</div>
    			<div class="clear"></div>
    		</div>
    	</div>
    	
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-1">
    		<div id="divC" class="product-chooser-item" style="margin: 0 auto; display: inline-block;">
                <div style="margin-left: 43px;">
    			    <img src="{{asset('img/cliente.svg')}}" style="width:250px;height:250px;display:inline-block;margin:auto;" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Mobile and Desktop">
                </div>
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title"><h3 style="text-align:center;">Cliente</h3></span>
    				<span class="description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span>
    				<input type="radio" name="product" value="desktop">
    			</div>
    			<div class="clear"></div>
    		</div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1">
            <!-- Freelancer -->
            <div id="divFR" style="margin: 0 auto; display: none;">
                <div class="panel panel-info">
                    <div class="panel-heading" style="height:60px">
                        <div class="panel-title pull-left"><h4 class="text-white">Registro de Freelancer</h4></div>
                        <div class="panel-title pull-right">
                            <button class="btn btn-default" id="volverF"><span class="glyphicon glyphicon-arrow-left"></span></button>
                        </div>
                    </div>  
                    <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="rol" value="Freelancer">
                        <div class="form-group">
                                <center><h4>Información de cuenta</h4></center>
                            </div>
                            <div class="spacing25"></div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 ">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label">{{ __('Contraseña') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label ">{{ __('Confirma Contraseña') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="spacing25"></div>
                            <div class="divider"></div>
                            <!-- info -->
                            <div class="form-group">
                                <center><h4>Información personal</h4></center>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label ">{{ __('Nombre') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Paterno -->
                        <div class="form-group row">
                                <label for="appF" class="col-md-3 control-label">Apellido Paterno:</label>
                                <div class="col-md-8">
                                    <input id="appF" type="text" class="form-control" name="apellido_paterno" required>
                                </div>
                            </div>
                            <!-- Materno -->
                            <div class="form-group row">
                                <label for="apmF" class="col-md-3 control-label">Apellido Materno:</label>
                                <div class="col-md-8">
                                    <input id="apmF" type="text" class="form-control" name="apellido_materno" required>
                                </div>
                            </div>
                            <!-- Fecha Nacimiento -->
                            <div class="form-group row">
                                <label for="fechaF" class="col-md-3 control-label">Fecha de Nacimiento:</label>
                                <div class="col-md-8">
                                    <input id="fechaF" type="date" class="form-control" name="fecha_nacimiento" required>
                                </div>
                            </div>
                            <div class="spacing25"></div>
                            <div class="divider"></div>
                            <!-- info -->
                            <div class="form-group">
                                <center><h4>Información de contacto</h4></center>
                            </div>
                            <div class="spacing25"></div>
                            <!-- Ciudad -->
                            <div class="form-group row">
                                <label for="ciudadF" class="col-md-3 control-label">Ciudad:</label>
                                <div class="col-md-8">
                                    <input id="ciudadF" type="text" class="form-control" name="ciudad_residencia" required>
                                </div>
                            </div>
                            <!-- Número de Celular -->
                            <div class="form-group row">
                                <label for="celularF" class="col-md-3 control-label">Número Celular:</label>
                                <div class="col-md-8">
                                    <input id="celularF" type="text" class="form-control" name="celular" required>
                                </div>
                            </div>
                            <!-- Número de Teléfono -->
                            <div class="form-group row">
                                <label for="telefonoF" class="col-md-3 control-label">Teléfono (opcional):</label>
                                <div class="col-md-8">
                                    <input id="telefonoF" type="text" class="form-control" name="telefono">
                                </div>
                            </div>
                            <div class="spacing25"></div>
                            <div class="divider"></div>
                            <div class="spacing25"></div>
                            <div class="form-group">
                            <center>
                                <p>Al confirmar su registro usted acepta los <a>Terminos y Condiciones</a> y <a>Politicas de Privacidad</a>.</p>
                            </center>
                             </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                            <center>
                                <button type="submit" class="btn tur text-white" style="width:80%">
                                    {{ __('Registrarse') }}
                                </button>
                                </center>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
</div>

            <!-- Cliente -->
            <div id="divCli" style="margin: 0 auto; display: none;">
                <div class="panel panel-info">
                    <div class="panel-heading" style="height:60px">
                        <div class="panel-title pull-left"><h4 class="text-white">Registro de Cliente</h4></div>
                        <div class="panel-title pull-right">
                            <button class="btn btn-default" id="volverF"><span class="glyphicon glyphicon-arrow-left"></span></button>
                        </div>
                    </div>  
                    <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="rol" value="Cliente">
                        <div class="form-group">
                                <center><h4>Información de cuenta</h4></center>
                            </div>
                            <div class="spacing25"></div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 ">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-8">
                                <input id="emailC" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="passwordC" class="col-md-3 col-form-label">{{ __('Contraseña') }}</label>

                            <div class="col-md-8">
                                <input id="passwordC" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label ">{{ __('Confirma Contraseña') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirmC" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="spacing25"></div>
                            <div class="divider"></div>
                            <!-- info -->
                            <div class="form-group">
                                <center><h4>Información personal</h4></center>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label ">{{ __('Nombre') }}</label>

                            <div class="col-md-8">
                                <input id="nameC" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Paterno -->
                        <div class="form-group row">
                                <label for="appF" class="col-md-3 control-label">Apellido Paterno:</label>
                                <div class="col-md-8">
                                    <input id="appC" type="text" class="form-control" name="apellido_paterno" required>
                                </div>
                            </div>
                            <!-- Materno -->
                            <div class="form-group row">
                                <label for="apmF" class="col-md-3 control-label">Apellido Materno:</label>
                                <div class="col-md-8">
                                    <input id="apmC" type="text" class="form-control" name="apellido_materno" required>
                                </div>
                            </div>
                            <!-- Fecha Nacimiento -->
                            <div class="form-group row">
                                <label for="fechaF" class="col-md-3 control-label">Fecha de Nacimiento:</label>
                                <div class="col-md-8">
                                    <input id="fechaC" type="date" class="form-control" name="fecha_nacimiento" required>
                                </div>
                            </div>
                            <div class="spacing25"></div>
                            <div class="divider"></div>
                            <!-- info -->
                            <div class="form-group">
                                <center><h4>Información de contacto</h4></center>
                            </div>
                            <div class="spacing25"></div>
                            <!-- Ciudad -->
                            <div class="form-group row">
                                <label for="ciudadC" class="col-md-3 control-label">Ciudad:</label>
                                <div class="col-md-8">
                                    <input id="ciudadC" type="text" class="form-control" name="ciudad_residencia" required>
                                </div>
                            </div>
                            <!-- Número de Celular -->
                            <div class="form-group row">
                                <label for="celularF" class="col-md-3 control-label">Número Celular:</label>
                                <div class="col-md-8">
                                    <input id="celularC" type="text" class="form-control" name="celular" required>
                                </div>
                            </div>
                            <!-- Número de Teléfono -->
                            <div class="form-group row">
                                <label for="telefonoF" class="col-md-3 control-label">Teléfono (opcional):</label>
                                <div class="col-md-8">
                                    <input id="telefonoC" type="text" class="form-control" name="telefono">
                                </div>
                            </div>
                            <div class="spacing25"></div>
                            <div class="divider"></div>
                            <div class="spacing25"></div>
                            <div class="form-group">
                            <center>
                                <p>Al confirmar su registro usted acepta los <a>Terminos y Condiciones</a> y <a>Politicas de Privacidad</a>.</p>
                            </center>
                             </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                            <center>
                                <button type="submit" class="btn tur text-white" style="width:80%">
                                    {{ __('Registrarse') }}
                                </button>
                                </center>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    	</div>
    	
    </div>
</div>

</div>
 <!-- Scripts -->
 <script type="text/javascript"
    src="https://code.jquery.com/jquery-2.2.4.js"
    integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
    crossorigin="anonymous">
    </script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/1.0/zxcvbn.min.js"></script>
<script type="text/javascript" src="{{ asset('public/js/zxcvbn-bootstrap-strength-meter.js') }}"></script>
<script type="text/javascript">

</script>
<script type="text/javascript">

$(function(){
	$('div.product-chooser').not('.disabled').find('div.product-chooser-item').on('click', function(){
		$(this).parent().parent().find('div.product-chooser-item').removeClass('selected');
		$(this).addClass('selected');
		$(this).find('input[type="radio"]').prop("checked", true);
		
	});
});

$( "#divC" ).click(function() {
    $("#divF").slideUp("slow");
    $("#divC").slideUp("slow");
    $("#divCli").delay(1000).slideDown("slow");
});

$( "#divF" ).click(function() {
    $("#divF").slideUp("slow");
    $("#divC").slideUp("slow");
    $("#divFR").delay(1000).slideDown("slow");
});

$( "#volverF" ).click(function() {
    $("#divFR").slideUp("slow");
    $("#divF").delay(1000).slideDown("slow");
    $("#divC").delay(1000).slideDown("slow");
});

$( "#volverC" ).click(function() {
    $("#divCL").slideUp("slow");
    $("#divF").delay(1000).slideDown("slow");
    $("#divC").delay(1000).slideDown("slow");
});

</script>

</body>
@endsection