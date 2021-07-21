@extends('layouts.admin')
@section('contenido')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="{{asset('js/gijgo.min.js')}}"></script>
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       <h3>Nueva Cita</h3>
        @if (count($errors)>0)
           
        <div class="alert alert-danger">
           <ul>
            @foreach ($errors->all() as $error)        
            <li>{{$error}}</li>
         @endforeach

           </ul>
         </div>
       @endif
    </div>
   </div>


       {!!Form::open(array('url'=>'/citas', 'method'=>'POST', 'autocomplete'=>'off'))!!}
       {{Form::token()}}

       <div class="form-group">
           <label >Cliente</label>
           <select name="idclientes" class="form-control">
            @foreach($clientes as $cli)
                <option value="{{$cli->idclientes}}">{{$cli->nombre}}</option>
            @endforeach

           </select>
       </div>

       <div class="form-group">
           <label for="fecha">Fecha</label>
           <input type="text" class="form-control" name="fecha" id="datepicker">
           <script>
            $('#datepicker').datetimepicker({
            uiLibrary: 'bootstrap'
            });
            </script>
       </div>

       <div class="form-group">
           <label for="descripcion">Descripcion</label>
           <input type="text" name="descripcion" class="form-control" placeholder="Descripcion...">
       </div>
       <div class="form-group">
           <button class="btn btn-primary" type="submit">Guardar</button>
           <button class="btn btn-danger" type="reset">Cancelar</button>
       </div>

       

       {!!Form::close()!!}
   </div>
@endsection
