@extends('layouts.app')

@section('content')

@if($datosContrato)

    @foreach($datosContrato as $dato)
    <form action="{{route('subirContrato')}}" method="post">
    {{ csrf_field() }}  
        <input type="hidden" name="solicitud" class="form-control" value="{{$dato->id_solicitud}}">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                <br>
                    <div class="panel panel-default">
                        <div class="panel-heading"><p class="text-white">Contrato<p class="text-white"></div>
                        <div class="panel-body">
                           <div style="display:flex; height:70px; width:100%; position:relative;" id="header"><img class="logo" src="{{ asset('img/logo.png')}}" alt=""><h1>Cloudbucket</h1></div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="spacing50"></div>
                                        Contrato entre partes para la realización del proyecto tecnológico <b>{{$dato->nombre}}</b>.
                                    </div>
                                </div>
                                <div class="spacing50"></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="form-group">Presupuesto:</label>
                                        <input type="text" name="pago" class="form-control" value="{{$dato->pago}}">
                                        <br>
                                        <label for="" class="form-group">Penalización:</label>
                                        <div style="display:flex;"><input name="penalizacion" type="text" style="width:50%;" class="form-control" placeholder="Porcentaje"> <p style="align:center; padding-top:7px;">%</p></div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="" class="form-group">Fecha de Entrega:</label>
                                        <input type="date" name="fecha_entrega" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="spacing50"></div>
                                    <div class="col-md-6">
                                        <label for="" class="form-group">Firma del Freelancer:</label>
                                        <input type="text" class="form-control" placeholder="Firma Aquí" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-group">Firma del Cliente:</label>
                                        <input type="text" name="firma_cliente" class="form-control" placeholder="Firma Aquí">
                                    </div>
                                </div>
                                <div class="row">
                                <div class="spacing50"></div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <input type="submit" class="form-control btn btn-info" value="Enviar Contrato">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach

@endif


@endsection