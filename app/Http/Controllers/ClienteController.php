<?php

namespace sistemacitas\Http\Controllers;

use Illuminate\Http\Request;

use sistemacitas\Http\Requests;
use sistemacitas\Cliente;
use Illuminate\Support\Facades\Redirect;
use sistemacitas\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $cliente=DB::table('clientes')->where('nombre', 'LIKE', '%' .$query. '%')
            ->where ('estado','=','1')
            ->orderBy ('idclientes', 'desc')
            ->paginate(7);
            return view('cliente.index', ["clientes"=>$cliente,"searchText"=>$query]);
        }

    }

    public function create()
    {
        return view("cliente.create");
    }

    public function store(ClienteFormRequest $request)
    {
        $cliente=new Cliente;
        $cliente->nombre=$request->get('nombre');
        $cliente->contacto=$request->get('contacto');
        $cliente->celular=$request->get('celular');
        $cliente->telefono=$request->get('telefono');
        $cliente->direccion=$request->get('direccion');
        $cliente->email=$request->get('email');
        $cliente->kilometraje=$request->get('kilometraje');
        $cliente->estado='1';
        $cliente->save();

        return Redirect::to('cliente');
    
        
    }

    public function show($id)
    {
        return view("cliente.show", ["cliente"=>Cliente::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("cliente.edit", ["cliente"=>Cliente::findOrFail($id)]);
    }

    public function update(ClienteFormRequest $request, $id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->nombre=$request->get('nombre');
        $cliente->contacto=$request->get('contacto');
        $cliente->celular=$request->get('celular');
        $cliente->telefono=$request->get('telefono');
        $cliente->direccion=$request->get('direccion');
        $cliente->email=$request->get('email');
        $cliente->kilometraje=$request->get('kilometraje');

        $cliente->update();
        return Redirect::to('cliente');

    }

    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->estado='0';
        $cliente->update();
        return Redirect::to('cliente');
    }
}
