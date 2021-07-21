<?php

namespace sistemacitas\Http\Controllers;

use Illuminate\Http\Request;

use sistemacitas\Http\Requests;
use sistemacitas\Citas;
use Illuminate\Support\Facades\Redirect;
use sistemacitas\Http\Requests\CitasFormRequest;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $citas=DB::table('citas as ct')
            ->join('clientes as cl', 'ct.idclientes', '=', 'cl.idclientes')
            ->select('ct.idcitas',  'cl.nombre as cliente',  'cl.contacto', 'cl.email',
            'cl.telefono', 'cl.celular' , 'cl.direccion' , 'cl.kilometraje' ,'ct.fecha', 'ct.descripcion', 'ct.estado')
            ->where('cl.nombre', 'LIKE', '%' .$query. '%')
            ->where('ct.estado', '=','1')
            ->orderBy ('ct.idcitas', 'desc')
            ->paginate(5);
            return view('citas.index', ["citas"=>$citas,"searchText"=>$query]);
        }

    }

    public function create()
    {
        $clientes=DB::table('clientes')->where ('estado', '=', '1')->get();
        return view("citas.create", ["clientes"=>$clientes]);
    }

    public function store(CitasFormRequest $request)
    {
        $citas=new Citas;
        $citas->idclientes=$request->get('idclientes');
        $citas->fecha=$request->get('fecha');
        $citas->descripcion=$request->get('descripcion');
        $citas->estado='1';
        $citas->save();

        return Redirect::to('citas');
    
        
    }

    public function show($id)
    {
        return view("citas.show", ["citas"=>Citas::findOrFail($id)]);
    }

    public function edit($id)
    {
        $citas=Citas::FindOrFail($id);
        $citas=DB::table('citas')->where ('estado', '=', '1')->get();
        return view("citas.edit", ["citas"=>$citas, "cliente"=>$citas]);
    }

    public function update(CitasFormRequest $request, $id)
    {
        $citas=Citas::findOrFail($id);
        $citas->nombre=$request->get('idclientes');
        $citas->contacto=$request->get('fecha');
        $citas->celular=$request->get('descripcion');
        $citas->estado='1';

        $citas->update();
        return Redirect::to('citas');

    }

    public function destroy($id)
    {
        $citas=Citas::findOrFail($id);
        $citas->estado='0';
        $citas->update();
        return Redirect::to('citas');
    }
}
