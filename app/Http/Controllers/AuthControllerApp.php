<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Matricula;
use App\Registro_Alumno;
use App\Grupo;
use Illuminate\Support\Facades\DB;



use Carbon\Carbon;

use Session;

use Redirect;



class AuthControllerApp extends Controller
{
    public function iniciarApp(Request $request)
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

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                ->toDateTimeString(),
        ]);






    }

    public function signupAppMatricula(Request $request)
    {
        try {
                $comprobarMatricula = Matricula::where('RNE_Alumno', '=', $request->RNE_Alumno)->count();

                if($comprobarMatricula >0){

                    $registroExistente = Matricula::where('RNE_Alumno', '=', $request->RNE_Alumno)->value('Id_Grupo');


                    if ($registroExistente != null || $registroExistente != "") {

                        return response()->json([
                            'message' => 'Usted ya está matriculado'], 402);


                    } else {


                        $idGrupo = Grupo::where('Modalidad', '=', $request->Modalidad)->where('Grado', '=', $request->Grado)->where('Jornada', '=', $request->Jornada)->where('Modulo', '=', $request->Modulo)->where('Grupo', '=', $request->Grupo)->value('Id_Grupo');

                        if ($idGrupo == null) {

                            return response()->json([
                                'message' => 'Hubo un error al realizar la matricula'], 402);

                        } else {

                            $contarRegistrosMatricula= DB::table("Matriculas")
                                ->leftJoin("Registro__Alumnos","Registro__Alumnos.RNE_Alumno","=","Matriculas.RNE_Alumno")
                                ->leftJoin("Grupos","Grupos.Id_Grupo","=","Matriculas.Id_grupo")

                                ->select("Matriculas.*")
                                ->where("Registro__Alumnos.Sexo","=",$request->Sexo)
                                ->where("Grupos.Id_Grupo","=",$request->Id_Grupo)

                                ->count();

                            if ($contarRegistrosMatricula < 2){
                                $app = Matricula::where('RNE_Alumno', '=', $request->RNE_Alumno)->update(["Id_Grupo" => $idGrupo]);


                                return response()->json([
                                    'message' => 'Matriculado con exito no necesita hacer otra acción.'], 201);

                            }else{
                                return response()->json([
                                    'message' => 'Ya no hay cupos en este grupo.'], 402);


                            }
                        }
                    }
                }else{
                    Session::flash('message-error', 'Ud no puede matricularse, acuda a nuestras istalaciones para resolver el problema');
                    return redirect('/home');

                }
        }catch (Exception $e){
            Session::flash('message-error', 'Hubo un error al realizar la matrículas');

        }catch (Error $e){
            Session::flash('message-error', 'Hubo un error al realizar la matrículas');

        }


    }


    public function infoAlumno(Request $request){

        $centroPrematricula= DB::table("Prematriculas")
            ->leftJoin("Registro__Alumnos","Registro__Alumnos.RNE_Alumno","=","Prematriculas.RNE_Alumno")
            ->select( "Registro__Alumnos.*","Prematriculas.*")
            ->where("Prematriculas.RNE_Alumno","=",$request->RNE_Alumno)->get();


        return response()->json([
            'infoAlumno' => $centroPrematricula]);
    }



    public function filaGrupos(Request $request)
    {

        $matriculado = Matricula::where('RNE_Alumno', '=', $request->RNE_Alumno)->pluck('Id_Grupo')->first();


        if($matriculado != null ||$matriculado !=''){

            $grupos = DB::table("Grupos")
                ->leftJoin("Modalidades", "Modalidades.id", "=", "Grupos.Modalidad")
                ->leftJoin("Modulos", "Modulos.id", "=", "Grupos.Modulo")
                ->select("Grupos.*", "Modulos.*", "Modalidades.*")
                ->where('Grupos.Id_Grupo', '=', $matriculado)
                ->get();
            return response()->json([
                'filaGrupos' => $grupos]);

        }else {


            $gradoPrematricula = DB::table("Grupos")
                ->leftJoin("Prematriculas", "Prematriculas.Id_Grupo", "=", "Grupos.Id_Grupo")
                ->select("Grupos.*")
                ->where("Prematriculas.RNE_Alumno", "=", $request->RNE_Alumno)->pluck('Grado')->first();

            $idGrupo = DB::table("Grupos")
                ->leftJoin("Prematriculas", "Prematriculas.Id_Grupo", "=", "Grupos.Id_Grupo")
                ->select("Grupos.*")
                ->where("Prematriculas.RNE_Alumno", "=",$request->RNE_Alumno)->pluck('Id_Grupo')->first();

            if ($gradoPrematricula == 'Octavo Grado' || $gradoPrematricula == 'Noveno Grado' || $gradoPrematricula == 'Undecimo Grado'
                || $gradoPrematricula == 'Duodecimo Grado') {
                $grupos = DB::table("Grupos")
                    ->leftJoin("Modalidades", "Modalidades.id", "=", "Grupos.Modalidad")
                    ->leftJoin("Modulos", "Modulos.id", "=", "Grupos.Modulo")

                    ->select("Grupos.*", "Modulos.*", "Modalidades.*")
                    ->where('Grupos.Id_Grupo','=',$idGrupo)->get();
                return response()->json([
                    'filaGrupos' => $grupos]);


            } else {


                $filaGrupos = DB::table("Prematriculas")
                    ->leftJoin("Grupos", "Prematriculas.Id_Grupo", "=", "Grupos.Id_Grupo")
                    ->select("Grupos.*")
                    ->where("Prematriculas.RNE_Alumno", "=", $request->RNE_Alumno)->pluck('Grado')->first();

                $filaModalidad = DB::table("Prematriculas")
                    ->leftJoin("Grupos", "Prematriculas.Id_Grupo", "=", "Grupos.Id_Grupo")
                    ->select("Grupos.*")
                    ->where("Prematriculas.RNE_Alumno", "=",$request->RNE_Alumno)->pluck('Modalidad')->first();


                $grupos = DB::table("Grupos")
                    ->leftJoin("Modalidades", "Modalidades.id", "=", "Grupos.Modalidad")
                    ->leftJoin("Modulos", "Modulos.id", "=", "Grupos.Modulo")
                    ->select("Grupos.*", "Modulos.*", "Modalidades.*")
                    ->where('Grupos.Grado', '=', $filaGrupos)->where('Grupos.Modalidad', '=', $filaModalidad)->where('Grupos.Jornada', '!=', 'Isemed')
                    ->where('Grupos.Jornada', '!=', null)->get();



                return response()->json([
                    'filaGrupos' => $grupos]);

            }
        }
    }


    public function prematricular(Request $request)
    {

        $matriculado = Matricula::where('RNE_Alumno', '=', $request->RNE_Alumno)->pluck('Id_Grupo')->first();


        if ($matriculado != null || $matriculado != '') {

            $grupos = DB::table("Matriculas")
                ->leftJoin("Registro__Alumnos", "Registro__Alumnos.RNE_Alumno", "=", "Matriculas.RNE_Alumno")
                ->leftJoin("Grupos", "Grupos.Id_Grupo", "=", "Matriculas.Id_Grupo")
                ->leftJoin("Modalidades", "Modalidades.id", "=", "Grupos.Modalidad")
                ->leftJoin("Modulos", "Modulos.id", "=", "Grupos.Modulo")
                ->select("Grupos.*", "Modulos.*", "Modalidades.*","Registro__Alumnos.*")

                ->where('Grupos.Id_Grupo', '=', $matriculado)
                ->where('Registro__Alumnos.RNE_Alumno', '=', $request->RNE_Alumno)->get();


            return response()->json([
                'datos' => $grupos], 201);

        }else{
            return response()->json([
                'message' => 'Este Alumno no está matriculado'], 402);
        }
    }

}
