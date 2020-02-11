<?php

namespace App;

use http\Env\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

use Session;

use Redirect;

use App\Notifications\PasswordResetRequest;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */

    protected $fillable = [
        'RNE_Alumno','name', 'email', 'password','avatar'
    ];
    protected $appends=['RNE'];
    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function getGradoAttribute(){

        $centroPrematricula= DB::table("Prematriculas")
            ->leftJoin("Registro__Alumnos","Registro__Alumnos.RNE_Alumno","=","Prematriculas.RNE_Alumno")
              ->select( "Registro__Alumnos.*","Prematriculas.*")
            ->where("Prematriculas.RNE_Alumno","=",$this->RNE_Alumno)->get();

        $result = json_decode($centroPrematricula, true);



        return $result;
     }



    public function filaGrupos()
    {

        $matriculado = Matricula::where('RNE_Alumno', '=', $this->RNE_Alumno)->pluck('Id_Grupo')->first();


        if($matriculado != null ||$matriculado !=''){

            $grupos = DB::table("Grupos")
                 ->leftJoin("Modalidades", "Modalidades.id", "=", "Grupos.Modalidad")
                ->leftJoin("Modulos", "Modulos.id", "=", "Grupos.Modulo")
                ->select("Grupos.*", "Modulos.*", "Modalidades.*")
                ->where('Grupos.Id_Grupo', '=', $matriculado)
               ->get();
            $result = json_decode($grupos, true);
            return $result;

        }else {


            $gradoPrematricula = DB::table("Grupos")
                ->leftJoin("Prematriculas", "Prematriculas.Id_Grupo", "=", "Grupos.Id_Grupo")
                ->select("Grupos.*")
                ->where("Prematriculas.RNE_Alumno", "=", $this->RNE_Alumno)->pluck('Grado')->first();

            $idGrupo = DB::table("Grupos")
                ->leftJoin("Prematriculas", "Prematriculas.Id_Grupo", "=", "Grupos.Id_Grupo")
                ->select("Grupos.*")
                ->where("Prematriculas.RNE_Alumno", "=", $this->RNE_Alumno)->pluck('Id_Grupo')->first();

            if ($gradoPrematricula == 'Octavo Grado' || $gradoPrematricula == 'Noveno Grado' || $gradoPrematricula == 'Undecimo Grado'
                || $gradoPrematricula == 'Duodecimo Grado') {
                $grupos = DB::table("Grupos")
                    ->leftJoin("Modalidades", "Modalidades.id", "=", "Grupos.Modalidad")
                    ->leftJoin("Modulos", "Modulos.id", "=", "Grupos.Modulo")

                    ->select("Grupos.*", "Modulos.*", "Modalidades.*")
                    ->where('Grupos.Id_Grupo','=',$idGrupo)->get();
                $result = json_decode($grupos, true);

                return $result;

            } else {


                $filaGrupos = DB::table("Prematriculas")
                    ->leftJoin("Grupos", "Prematriculas.Id_Grupo", "=", "Grupos.Id_Grupo")
                    ->select("Grupos.*")
                    ->where("Prematriculas.RNE_Alumno", "=", $this->RNE_Alumno)->pluck('Grado')->first();


                $filaModalidad = DB::table("Prematriculas")
                    ->leftJoin("Grupos", "Prematriculas.Id_Grupo", "=", "Grupos.Id_Grupo")
                    ->select("Grupos.*")
                    ->where("Prematriculas.RNE_Alumno", "=", $this->RNE_Alumno)->pluck('Modalidad')->first();


                $grupos = DB::table("Grupos")
                    ->leftJoin("Modalidades", "Modalidades.id", "=", "Grupos.Modalidad")
                    ->leftJoin("Modulos", "Modulos.id", "=", "Grupos.Modulo")
                    ->select("Grupos.*", "Modulos.*", "Modalidades.*")
                    ->where('Grupos.Grado', '=', $filaGrupos)->where('Grupos.Modalidad', '=', $filaModalidad)->where('Grupos.Jornada', '!=', 'Isemed')
                    ->where('Grupos.Jornada', '!=', null)->get();



                $result = json_decode($grupos, true);

                return $result;
            }
        }
    }

        public function comprobarMatricula(){

            $matriculado = Matricula::where('RNE_Alumno', '=', $this->RNE_Alumno)->pluck('Id_Grupo')->first();

            if($matriculado ==null ||$matriculado =="" ){
                return 'falso';
            }else{
                return 'true';
            }




        }

    public function userRol(){

        $rol = Role::all();
        return $rol;
    }
    public function getGrupos(){

        $grupos = Grupo::where('Jornada','!=', null)->orwhere('Jornada','!=', '')->where('Grupo','!=', null)->orwhere('Grupo','!=', '')->
        where('Modulo','!=', null)->orwhere('Modulo','!=', '')->where('Jornada','!=', 'Isemed')->get();


        return $grupos;
    }
    public function getModalidades(){

        $modalidad = Modalidade::all();
        return $modalidad;
    }

    public function getModulos(){

        $modulo = Modulo::all();
        return $modulo;
    }




}
