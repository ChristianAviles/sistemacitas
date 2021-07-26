@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" >
            <h3>Listado de citas/llamadas <a href="citas/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('citas.search')
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Contacto</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($citas as $cit)
                        <tr>
                            <td>{{$cit->idcitas}}</td>
                            <td>{{$cit->cliente}}</td>
                            <td>{{$cit->contacto}}</td>                            
                            <td>{{$cit->telefono}}</td>
                            <td>{{$cit->celular}}</td>
                            <td>{{$cit->fecha}}</td>
                            <td>{{$cit->descripcion}}</td>
                            <td>
                                <!-- <a href="{{URL::action('CitasController@edit', $cit->idcitas)}}"><button class="btn btn-info">Editar</button></a> -->
                                <a href="" data-target="#modal-delete-{{$cit->idcitas}}" data-toggle="modal"></data-toggle>><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                    @include('citas.modal')
                    @endforeach
                </table>
                </div>
            </div>
            {{$citas->render()}}
        </div>
    </div>
@endsection