<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuloRequest;
use App\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query =trim($request->get('search'));
            $modulos = Modulo::where('Nombre_Modulo','LIKE','%'.$query.'%')->get();


            return view('modulos.index',['modulos'=> $modulos,'search'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/modulos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuloRequest $request)
    {
        $modulo= new Modulo();

        $modulo->Nombre_Modulo = $request->Nombre_Modulo;


        $modulo->save();

        return redirect('/modulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('modulos.edit',['modulo'=>Modulo::findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuloRequest $request, $id)
    {
        $modulo =  Modulo::findOrFail($id);

        $modulo->Nombre_Modulo = $request->get('Nombre_Modulo');


        $modulo->update();

        return redirect('/modulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
