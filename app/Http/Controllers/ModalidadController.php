<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModalidadRequest;
use App\Modalidade;
use Illuminate\Http\Request;

class ModalidadController extends Controller
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
            $modalidades = Modalidade::where('Nombre_Modalidad','LIKE','%'.$query.'%')->get();


            return view('modalidades.index',['modalidades'=> $modalidades,'search'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/modalidades.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModalidadRequest $request)
    {
         $modalidad = new Modalidade();

        $modalidad->Nombre_Modalidad = $request->Nombre_Modalidad;


        $modalidad->save();

        return redirect('/modalidades');
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
        return view('modalidades.edit',['modalidad'=>Modalidade::findOrFail($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModalidadRequest $request, $id)
    {
         $modalidad =  Modalidade::findOrFail($id);

        $modalidad->Nombre_Modalidad = $request->get('Nombre_Modalidad');


        $modalidad->update();

        return redirect('/modalidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modalidad = Modalidade::findOrFail($id);
        $modalidad->delete();
        return redirect('/modalidades');
    }
}
