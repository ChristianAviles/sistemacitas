@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" >
            <h3>Listado de clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('cliente.search') 
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Direccion</th>
                        <th>Kilometraje</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($clientes as $cli)
                        <tr>
                            <td>{{$cli->idclientes}}</td>
                            <td>{{$cli->nombre}}</td>
                            <td>{{$cli->contacto}}</td>
                            <td>{{$cli->email}}</td>
                            <td>{{$cli->telefono}}</td>
                            <td>{{$cli->celular}}</td>
                            <td>{{$cli->direccion}}</td>
                            <td>{{$cli->kilometraje}}</td>
                            <td>
                                <a href="{{URL::action('ClienteController@edit', $cli->idclientes)}}"><button class="btn btn-info">Editar</button></a>
                                <a href="" data-target="#modal-delete-{{$cli->idclientes}}" data-toggle="modal"></data-toggle>><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                    @include('cliente.modal')
                    @endforeach
                </table>
                </div>
            </div>
            {{$clientes->render()}}
        </div>
    </div>
@endsection