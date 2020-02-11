<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserFormRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('auth');
    }


    public function index(Request $request)
    {

         if($request){
             $query =trim($request->get('search'));

             $users = DB::table("users")
                 ->leftJoin("Roles", "Roles.Id_Rol", "=", "users.Id_Rol")
                 ->select("users.*", "Roles.*")
                 ->where('name','LIKE','%'.$query.'%')
                 ->orwhere('RNE_Empleado','LIKE','%'.$query.'%')->orderBy('id','asc')->get();



             return view('usuarios.index',['users'=> $users,'search'=>$query]);

         }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/usuarios.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {



    $obj = json_decode($request->Id_Rol);
    $usuario = new User();

    $usuario->RNE_Empleado = $request->RNE_Empleado;
    $usuario->name = $request->name;
    $usuario->password = bcrypt($request->password);
    $usuario->Id_Rol = $obj->{'Id_Rol'};

    $usuario->save();

        return redirect('/usuarios');





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

        $users = DB::table("users")
            ->leftJoin("Roles", "Roles.Id_Rol", "=", "users.Id_Rol")
            ->select("users.*", "Roles.*")
            ->where('users.id','=',$id)->get();

        $result = json_decode($users, true);

        return view('usuarios.edit',['user'=>$result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {

        try{
        $obj = json_decode($request->Id_Rol);
        $usuario =  User::findOrFail($id);

        $usuario->RNE_Empleado = $request->get('RNE_Empleado');
        $usuario->name = $request->get('name');
         $usuario->Id_Rol = $obj->{'Id_Rol'};

        $usuario->update();

        return redirect('/usuarios');

    }catch (QueryException $e){
Session::flash('message-error', 'Este RNE Empleado ya existe en los registros');

            return redirect('/usuarios');

}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
