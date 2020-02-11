<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGrupoRequest;
use App\Http\Requests\UpdateGrupoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use   App\Grupo;

class GrupoController extends Controller
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


            $grupos = DB::table("Grupos")
                ->leftJoin("Modalidades", "Modalidades.id", "=", "Grupos.Modalidad")
                ->leftJoin("Modulos", "Modulos.id", "=", "Grupos.Modulo")

                ->select("Grupos.*", "Modulos.*", "Modalidades.*")
                ->where('Grado','LIKE','%'.$query.'%')->get();


        return view('grupos.index',['grupos'=> $grupos,'search'=>$query]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/grupos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGrupoRequest $request)
    {
         $grupo = new Grupo();

        $grupo->Modalidad = $request->Modalidad;
        $grupo->Jornada = $request->Jornada;
        $grupo->Grado = $request->Grado;
        $grupo->Grupo = $request->Grupo;
        $grupo->Modulo = $request->Modulo;
        $grupo->Estado_Grupo = $request->Estado_Grupo;
        $grupo->Num_Hombres = $request->Num_Hombres;
        $grupo->Num_Mujeres = $request->Num_Mujeres;




        $grupo->save();

        return redirect('/grupos');
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
       // $prueb =  Grupo::where('Id_Grupo','=',$id)->get();

        $grupos = DB::table("Grupos")
            ->leftJoin("Modalidades", "Modalidades.id", "=", "Grupos.Modalidad")
            ->leftJoin("Modulos", "Modulos.id", "=", "Grupos.Modulo")

            ->select("Grupos.*", "Modulos.*", "Modalidades.*")
            ->where('Grupos.Id_Grupo','=',$id)->get();
        $result = json_decode($grupos, true);
        return view('grupos.edit',['grupo'=>$result]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGrupoRequest $request, $id)
    {
        Grupo::where('Id_Grupo',$id)->update(['Modalidad'=>$request->Modalidad,'Jornada'=>$request->Jornada,'Grado'=>$request->Grado,'Grupo'=>$request->Grupo
            ,'Modulo'=>$request->Modulo ,'Estado_Grupo'=>$request->Estado_Grupo,'Num_Hombres'=>$request->Num_Hombres,'Num_Mujeres'=>$request->Num_Mujeres]);


        return redirect('/grupos');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Grupo::where('Id_grupo','=',$id);
        $usuario->delete();
        return redirect('/grupos');
    }
}
