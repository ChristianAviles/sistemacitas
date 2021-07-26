@extends('layouts.admin')
@section('contenido')
   <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"></div>
       <h3>Editar Cliente: {{$cliente->nombre}}</h3>
        @if (count($errors)>0)
           
        <div class="alert alert-danger">
           <ul>
            @foreach ($errors->all() as $error)        
            <li>{{$error}}</li>
         @endforeach

           </ul>
         </div>
       @endif

       {!!Form::model($cliente, ['method'=>'HEAD', 'route'=>['cliente.update', $cliente->idclienteS]])!!}
       {{Form::token()}}
       <div class="form-group">
           <label for="nombre">Nombre</label>
           <input type="text" name="nombre" class="form-control" value="{{$cliente->nombre}}" placeholder="Nombre...">
       </div>
       <div class="form-group">
           <label for="contacto">Contacto</label>
           <input type="text" name="contacto" class="form-control" value="{{$cliente->contacto}}" placeholder="Contacto...">
       </div>
       <div class="form-group">
           <label for="email">Email</label>
           <input type="text" name="email" class="form-control" value="{{$cliente->email}}" placeholder="Email...">
       </div>
       <div class="form-group">
           <label for="nombre">Telefono</label>
           <input type="text" name="telefono" class="form-control" value="{{$cliente->telefono}}" placeholder="Telefono...">
       </div>
       <div class="form-group">
           <label for="nombre">Celular</label>
           <input type="text" name="celular" class="form-control" value="{{$cliente->celular}}" placeholder="Celular...">
       </div>
       <div class="form-group">
           <label for="nombre">Direccion</label>
           <input type="text" name="direccion" class="form-control" value="{{$cliente->direccion}}" placeholder="Direccion...">
       </div>
       <div class="form-group">
           <label for="nombre">Kilometraje</label>
           <input type="text" name="kilometraje" class="form-control" value="{{$cliente->kilometraje}}" placeholder="Kilometraje...">
       </div>
       <div class="form-group">
           
           <button class="btn btn-danger" type="reset">Cancelar</button>
       </div>

       {!!Form::close()!!}
   </div>
@endsection
