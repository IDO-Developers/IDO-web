@extends('layouts.main')

@section('content')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    @include('Alerts.errors')
                    @include('Alerts.success')


                    <body style="background-color:#f4f4f4;">

                    </body>

                    @if(Auth::user()->comprobarMatricula() == 'true')

                        <div class="card-header   navbar-brand bg-white">{{ __('Detalle de Matricula') }}  </div>
                    @else
                        <div class="card-header   navbar-brand bg-white">{{ __('Registro') }}  </div>

                        @endif

                        </body>
                        <div class="card-body   " ; >

                            <form method="POST" action="{{route('/signup')}}">
                                @csrf


                                <div class="form-group row " >

                                    <label for="RNE_Alumno" class="col-md-4 col-form-label text-md-right " >{{ __('Identidad') }} </label>

                                    <div class="col-md-6">

                                        <input id="RNE_Alumno"  readonly=»readonly» type="text" class=" form-control @error('RNE_Alumno') is-invalid @enderror"  name="RNE_Alumno" value="{{ old('RNE_Alumno',Auth::user()->getRNEAttribute())}}" required autocomplete="RNE_Alumno" autofocus >

                                        @error('RNE_Alumno')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="Sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }} </label>

                                    <div class="col-md-6">

                                        <input id="Sexo" type="text" readonly=»readonly» class="form-control @error('Sexo') is-invalid @enderror" name="Sexo" value="{{ old('Sexo',Auth::user()->getDatosRegistro()[0]['Sexo'])}}" required autocomplete="Sexo" autofocus >

                                        @error('Sexo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="Centro" class="col-md-4 col-form-label text-md-right">{{ __('Centro ') }} </label>

                                    <div class="col-md-6">

                                        <input id="Centro" readonly=»readonly» type="text" class="form-control @error('Centro') is-invalid @enderror" name="Centro" value="{{ old('Centro',Auth::user()->getGradoAttribute())}}" required autocomplete="Centro" autofocus >

                                        @error('Centro')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Grado" class="col-md-4 col-form-label text-md-right">{{ __('Grado') }}</label>

                                    <div class="col-md-6">
                                        <input  id="Grado" readonly="readonly"
                                                type="text" class="form-control @error('Grado') is-invalid @enderror"  name="Grado" value="{{ old('Grado',Auth::user()->filaGrupos()[0]['Grado'])}}" required autocomplete="Grado" autofocus>





                                        @error('Grado')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="Grupo" class="col-md-4 col-form-label text-md-right">{{ __('Número de grupo')}}</label>

                                    <div class="col-md-6">

                                        @if(Auth::user()->comprobarMatricula() == 'true')
                                            <input id="Grupo" readonly=»readonly» type="text" class="form-control @error('Grupo') is-invalid @enderror" name="Grupo" value="{{ old('Grupo',Auth::user()->filaGrupos()[0]['Grupo'])}}" required autocomplete="Grupo" autofocus>

                                        @else

                                            @if(Auth::user()->filaGrupos()[0]['Grado'] =='Septimo Grado'|| Auth::user()->filaGrupos()[0]['Grado'] =='Decimo Grado' )
                                                <select id="listaGrupo" type="text"
                                                        class="form-control @error('Grupo') is-invalid @enderror"
                                                        name="Grupo"autofocus>


                                                    <option value=""></option>
                                                    @foreach(Auth::user()->filaGrupos() as $group)
                                                        <option value="{{json_encode($group,TRUE)}}">{{$group['Grupo']}}</option>
                                                    @endforeach
                                                </select>

                                            @else
                                                <input id="Grupo" readonly=»readonly» type="text" class="form-control @error('Grupo') is-invalid @enderror" name="Grupo" value="{{ old('Grupo',Auth::user()->filaGrupos()[0]['Grupo'])}}" required autocomplete="Grupo" autofocus>


                                            @endif
                                        @endif

                                        @error('Grupo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Modalidad" class="col-md-4 col-form-label text-md-right">{{ __('Modalidad') }}</label>

                                    <div class="col-md-6">

                                        @if(Auth::user()->comprobarMatricula() == 'true')
                                            <input id="Modalidad" readonly=»readonly» type="text" class="form-control @error('Modalidad') is-invalid @enderror" name="Modalidad" value="{{ old('Modalidad',Auth::user()->filaGrupos()[0]['Nombre_Modalidad'])}}" required autocomplete="Modalidad" autofocus>

                                        @else

                                            @if(Auth::user()->filaGrupos()[0]['Grado'] =='Octavo Grado'||Auth::user()->filaGrupos()[0]['Grado'] =='Noveno Grado'
                                                 ||Auth::user()->filaGrupos()[0]['Grado'] =='Undecimo Grado'||Auth::user()->filaGrupos()[0]['Grado'] =='Duodecimo Grado')
                                                <input id="Modalidad" readonly=»readonly» type="text" class="form-control @error('Modalidad') is-invalid @enderror" name="Modalidad" value="{{ old('Modalidad',Auth::user()->filaGrupos()[0]['Nombre_Modalidad'])}}" required autocomplete="Modalidad" autofocus>

                                            @endif

                                            @if(Auth::user()->filaGrupos()[0]['Grado'] !='Octavo Grado'&& Auth::user()->filaGrupos()[0]['Grado'] !='Noveno Grado'
                                          &&Auth::user()->filaGrupos()[0]['Grado'] !='Undecimo Grado'&&Auth::user()->filaGrupos()[0]['Grado'] !='Duodecimo Grado')
                                                <input id="Modalidad" readonly=»readonly» type="text" class="form-control @error('Modalidad') is-invalid @enderror" name="Modalidad" value="{{ old('Modalidad')}}" required autocomplete="Modalidad" autofocus>

                                            @endif
                                        @endif

                                        @error('Modalidad')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="Modulo" class="col-md-4 col-form-label text-md-right">{{ __('Módulo') }}</label>

                                    <div class="col-md-6">

                                        @if(Auth::user()->comprobarMatricula() == 'true')
                                            <input id="Modulo"   readonly=»readonly» type="text" class="form-control @error('Modulo') is-invalid @enderror" name="Modulo" value="{{ old('Modulo',Auth::user()->filaGrupos()[0]['Nombre_Modulo']) }}" required autocomplete="Modulo" autofocus>

                                        @else

                                            @if(Auth::user()->filaGrupos()[0]['Grado'] !='Septimo Grado'&& Auth::user()->filaGrupos()[0]['Grado'] !='Decimo Grado'
                                           )
                                                <input id="Modulo"   readonly=»readonly» type="text" class="form-control @error('Modulo') is-invalid @enderror" name="Modulo" value="{{ old('Modulo',Auth::user()->filaGrupos()[0]['Nombre_Modulo']) }}" required autocomplete="Modulo" autofocus>


                                            @else
                                                <input id="Modulo"   readonly=»readonly» type="text" class="form-control @error('Modulo') is-invalid @enderror" name="Modulo" value="{{ old('Modulo' ) }}" required autocomplete="Modulo" autofocus>

                                            @endif
                                        @endif





                                        @error('Módulo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Jornada" class="col-md-4 col-form-label text-md-right">{{ __('Jornada') }}</label>

                                    <div class="col-md-6">

                                        @if(Auth::user()->comprobarMatricula() == 'true')
                                            <input  id="Jornada" type="text" readonly=»readonly» class="form-control @error('name') is-invalid @enderror" name="Jornada" value="{{ old('Jornada',Auth::user()->filaGrupos()[0]['Jornada']) }}" required autocomplete="Jornada" autofocus>

                                        @else


                                            @if(Auth::user()->filaGrupos()[0]['Grado'] !='Septimo Grado'&& Auth::user()->filaGrupos()[0]['Grado'] !='Decimo Grado'
                                            )
                                                <input  id="Jornada" type="text" readonly=»readonly» class="form-control @error('name') is-invalid @enderror" name="Jornada" value="{{ old('Jornada',Auth::user()->filaGrupos()[0]['Jornada']) }}" required autocomplete="Jornada" autofocus>


                                            @else
                                                <input  id="Jornada" type="text" readonly=»readonly» class="form-control @error('name') is-invalid @enderror" name="Jornada" value="{{ old('Jornada') }}" required autocomplete="Jornada" autofocus>

                                            @endif
                                        @endif







                                        @error('Jornada')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-0  ">
                                    <div class="col-md-6 offset-md-4">

                                        @if(Auth::user()->comprobarMatricula() == 'true')

                                        @else

                                            @if(Auth::user()->filaGrupos()[0]['Grado'] !='Septimo Grado'&& Auth::user()->filaGrupos()[0]['Grado'] !='Decimo Grado'
         )


                                            @else


                                                <button id="Boton" disabled type="submit" class="btn btn-primary bg-dark">
                                                    {{ __('Registro') }}
                                                </button>

                                            @endif
                                        @endif




                                    </div>
                                </div>

                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
