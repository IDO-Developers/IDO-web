<?php

namespace App\Http\Controllers;


use App\Http\Requests\AlumnoRequest;
use App\Http\Requests\MatriculaCreateRequest;
use App\Matricula;
use App\Prematricula;
use App\Grupo;
use App\Registro_Alumno;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Error;
use Session;

use Redirect;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Whoops\Exception\ErrorException;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signup(Request $request)
    {



   try {




       $obj = json_decode($request->Grupo);



       if($obj =='' || $obj == null){


           Session::flash('message-error', 'Hubo un error al realizar la matricula');
           return redirect('home');

       }else {
           $rne_Alumno =Auth::user()->RNE_Alumno;


           $comprobarMatricula = Matricula::where('RNE_Alumno', '=', $rne_Alumno)->count();

           if($comprobarMatricula >0){

               $registroExistente = Matricula::where('RNE_Alumno', '=', $rne_Alumno)->value('Id_Grupo');


               if ($registroExistente != null || $registroExistente != "") {

                   Session::flash('message-error', 'Usted ya está matriculado');
                   return redirect('home');


               } else {


                   $idGrupo = Grupo::where('Modalidad', '=', $obj->{'Modalidad'})->where('Grado', '=', $request->Grado)->where('Jornada', '=', $request->Jornada)->where('Modulo', '=', $obj->{'Modulo'})->where('Grupo', '=', $obj->{'Grupo'})->value('Id_Grupo');

                   if ($idGrupo == null) {

                       Session::flash('message-error', 'Hubo un error al realizar la matricula');
                       return redirect('/home');

                   } else {
                     $sexo =Auth::user()->getGradoAttribute()[0]['Sexo'];
                       $contarRegistrosMatricula= DB::table("Matriculas")
                           ->leftJoin("Registro__Alumnos","Registro__Alumnos.RNE_Alumno","=","Matriculas.RNE_Alumno")
                           ->leftJoin("Grupos","Grupos.Id_Grupo","=","Matriculas.Id_grupo")

                           ->select("Matriculas.*")
                           ->where("Registro__Alumnos.Sexo","=", $sexo)
                           ->where("Grupos.Id_Grupo","=",$obj->{'Id_Grupo'})

                           ->count();



                       if($sexo =='M'){

                           $numAlmunos = Grupo::where('Id_Grupo', '=', $idGrupo)->value('Num_Hombres');


                       }else{
                           $numAlmunos = Grupo::where('Id_Grupo', '=', $idGrupo)->value('Num_Mujeres');

                       }



                       if ($contarRegistrosMatricula < $numAlmunos){


                           Session::flash('message', 'Matriculado con exito no necesita hacer otra acción');


                           return redirect('/home');

                       }else{

                           if($sexo =='M'){

                               Session::flash('message-error', 'Ya no hay cupos para varones en este grupo');


                           }else{
                               Session::flash('message-error', 'Ya no hay cupos para mujeres en este grupo');

                           }
                            return redirect('/home');


                       }


                   }


               }


           }else{
               Session::flash('message-error', 'Ud no puede matricularse, acuda a nuestras istalaciones para resolver el problema');
               return redirect('/home');

           }




       }
   }catch (Exception $e){
       Session::flash('message-error', 'Hubo un error al realizar la matrículas');

   }catch (Error $e){
       Session::flash('message-error', 'Hubo un error al realizar la matrículas');

   }









    }
    public function iniciar(Request $request)
    {
        $request->validate([
            'RNE_Alumno'       => 'required|string',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);



        $credentials = request(['RNE_Alumno', 'password']);
        if (!Auth::attempt($credentials)) {


            Session::flash('message-error','Identidad o contraseña incorrecta');

            return redirect('/login');
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();




           if(Auth::user()->Id_Rol==1){
               return redirect('/home');


           }else {
               return redirect('/home');
           }

    }





    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' =>
            'Successfully logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

     public function lista()
     {
         $posts = Matricula::all();
         return response()->json([
             'message' => $posts], 201);
     }




}
