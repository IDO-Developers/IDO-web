@extends('layouts.app')

@section('content')


    @section("styles")
        <link href= "{{asset('js/bootstrap-fileinput/css/fileinput.css/fileinput.min.css')}} " rel="stylesheet" type="text/css"/>
     @endsection

     @section("scriptsPlugins")

    <script src="{{asset('js/bootstrap-fileinput/js/fileinput.js/fileinput.min.js')}} " type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-fileinput/themes/fas/theme.js/theme.min.js')}} " type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-fileinput/js/locales/es.js')}} " type="text/javascript"></script>

    @endsection

@section("scripts")

@endsection



<div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                    @include('Alerts.errors')
                    @include('Alerts.success')


                    <body style="background-color:#f4f4f4;">

                    </body>


                    <div class="card-header   navbar-brand bg-white">{{ __('Registrar Grupo') }}  </div>


                    </body>
                    <div class="card-body   " ; >

                        <form action="/grupos" method="Post">
                            @csrf

                            <div class="form-group ">
                                <label for="foto"  class="col-lg-3 control-label">{{ __('Modalidad')}}</label>

                                <input id="foto"  type="file"      name="foto_up"   >



                            </div>






                            <div class="form-group ">
                                <label for="Modalidad" >{{ __('Modalidad')}}</label>



                                    <select id="listaModalidad" type="text"
                                            class="form-control @error('Modalidad') is-invalid @enderror"
                                            name="Modalidad"autofocus>


                                        <option value=""></option>
                                        @foreach(Auth::user()->getModalidades() as $group)
                                            <option value="{{$group->id}}">{{$group->Nombre_Modalidad}}</option>
                                        @endforeach
                                    </select>

                                    @error('Modalidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                             </div>


                            <div class="form-group ">
                                <label for="Jornada" >{{ __('Jornada')}}</label>



                                    <select id="listaJornada" type="text"
                                            class="form-control @error('Jornada') is-invalid @enderror"
                                            name="Jornada"autofocus>


                                        <option value=""></option>
                                        <option value="Matutina">{{'Matutina'}}</option>
                                        <option value="Vespertina">{{'Vespertina'}}</option>
                                        <option value="Nocturna">{{'Nocturna'}}</option>
                                        <option value="Isemed">{{'Isemed'}}</option>

                                    </select>

                                    @error('Jornada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                             </div>

                            <div class="form-group ">
                                <label for="Grado"  >{{ __('Grado')}}</label>



                                    <select id="listaGrado" type="text"
                                            class="form-control @error('Grado') is-invalid @enderror"
                                            name="Grado"autofocus>


                                        <option value=""></option>
                                        <option value="{{'Septimo Grado'}}">{{'Septimo Grado'}}</option>
                                        <option value="{{'Octavo Grado'}}">{{'Octavo Grado'}}</option>
                                        <option value="{{'Noveno Grado'}}">{{'Noveno Grado'}}</option>
                                        <option value="{{'Decimo Grado'}}">{{'Decimo Grado'}}</option>
                                        <option value="{{'Undecimo Grado'}}">{{'Undecimo Grado'}}</option>
                                        <option value="{{'Duodecimo Grado'}}">{{'Duodecimo Grado'}}</option>

                                    </select>

                                    @error('Grado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                             </div>

                            <div class="form-group ">
                                <label for="Grupo"  >{{ __('Grupo')}}</label>

                                <input type="number" max="50" min="1" class="form-control  @error('Grupo') is-invalid @enderror"  name="Grupo" id="Grupo"   required autocomplete="Grupo" autofocus>

                                @error('Grupo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                             </div>

                            <div class="form-group ">
                                <label for="Modulo"  >{{ __('Módulo')}}</label>



                                    <select id="listaModulo" type="text"
                                            class="form-control @error('Modulo') is-invalid @enderror"
                                            name="Modulo"autofocus>


                                        <option value=""></option>
                                        @foreach(Auth::user()->getModulos() as $group)
                                            <option value="{{$group->id}}">{{$group->Nombre_Modulo}}</option>
                                        @endforeach
                                    </select>

                                    @error('Modulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                             </div>

                            <div class="form-group ">
                                <label for="Num_Hombres"  >{{ __('N-Hombres')}}</label>

                                <input type="number" max="50" min="1" class="form-control  @error('Num_Hombres') is-invalid @enderror"  name="Num_Hombres" id="Num_Hombres"   required autocomplete="Num_Hombres" autofocus>

                                @error('Num_Hombres')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="Num_Mujeres"  >{{ __('N-Mujeres')}}</label>

                                <input type="number" max="50" min="1" class="form-control  @error('Num_Mujeres') is-invalid @enderror"  name="Num_Mujeres" id="Num_Mujeres"   required autocomplete="Num_Mujeres" autofocus>

                                @error('Num_Mujeres')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>


                            <div class="form-group ">
                                <label for="Etado_Grupo"  >{{ __('Estado')}}</label>



                                    <select id="listaEstado" type="text"
                                            class="form-control @error('Estado_Grupo') is-invalid @enderror"
                                            name="Estado_Grupo"autofocus>


                                        <option value=""></option>
                                        <option value="Activo">{{'Activo'}}</option>
                                        <option value="Inactivo">{{'Inactivo'}}</option>
                                     </select>

                                    @error('Estado_Grupo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                             </div>



                            <div class="form-group row mb-0  ">
                                <div class="col-md-6 offset-md-4">

                                            <button id="Boton"  type="submit" class="btn btn-primary bg-dark">
                                                {{ __('Registro') }}
                                            </button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script  type="application/javascript" >

</script>
 @endsection
