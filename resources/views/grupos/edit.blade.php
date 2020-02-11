@extends('layouts.app')

@section('content')


    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                     @include('Alerts.success')


                    <body style="background-color:#f4f4f4;">

                    </body>

                     <div class="card-header   navbar-brand bg-white">{{ __('Editar Grupo') }}  </div>

                     </body>
                    <div class="card-body   " ; >

                        <form action="{{route('grupos.update',$grupo[0]["Id_Grupo"])}}" method="Post">
                            @method('PATCH')
                            @csrf


                            <div class="form-group ">
                                <label for="Modalidad" >{{ __('Modalidad')}}</label>




                                <select  id="listaModalidad" type="text"
                                        class="form-control @error('Modalidad') is-invalid @enderror"
                                        name="Modalidad" autofocus

                                >


                                    <option value=""></option>

                                     @foreach(Auth::user()->getModalidades() as $group)

                                               @if( $group->Nombre_Modalidad == $grupo[0]["Nombre_Modalidad"])
                                            <option value="{{ $group->id}}" {{ ( $group->Nombre_Modalidad) ? 'selected' : '' }}> {{$grupo[0]["Nombre_Modalidad"]}} </option>
                                        @else
                                            <option value="{{$group->id}}">{{$group->Nombre_Modalidad}}</option>

                                        @endif

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
                                    @if($grupo[0]["Jornada"] =='Matutina')

                                        <option value="{{'Matutina'}}" {{ ('Matutina') ? 'selected' : '' }}> {{ $grupo[0]["Jornada"]}} </option>

                                    @else
                                        <option value="{{'Matutina'}}">{{'Matutina'}}</option>

                                    @endif
                                    @if($grupo[0]["Jornada"] =='Vespertina')

                                        <option value="{{'Vespertina'}}" {{ ('Vespertina') ? 'selected' : '' }}> {{ $grupo[0]["Jornada"]}} </option>

                                    @else
                                        <option value="{{'Vespertina'}}">{{'Vespertina'}}</option>

                                    @endif
                                    @if($grupo[0]["Jornada"] =='Nocturna')

                                        <option value="{{'Nocturna'}}" {{ ('Nocturna') ? 'selected' : '' }}> {{ $grupo[0]["Jornada"]}} </option>

                                    @else
                                        <option value="{{'Nocturna'}}">{{'Nocturna'}}</option>

                                    @endif

                                     @if($grupo[0]["Jornada"] =='Isemed')

                                        <option value="{{'Isemed'}}" {{ ('Isemed') ? 'selected' : '' }}> {{ $grupo[0]["Jornada"]}} </option>

                                    @else
                                        <option value="{{'Isemed'}}">{{'Isemed'}}</option>

                                    @endif


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
                                    <option value="{{$grupo[0]['Grado']}}"selected>{{$grupo[0]['Grado']}}</option>


                                         @if($grupo[0]["Modalidad"] =='Septimo Grado')

                                        <option value="{{'Septimo Grado'}}" {{ ('Septimo Grado') ? 'selected' : '' }}> {{ $grupo[0]["Grado"]}} </option>

                                    @else
                                        <option value="{{'Septimo Grado'}}">{{'Septimo Grado'}}</option>

                                    @endif
                                    @if($grupo[0]["Modalidad"] =='Octavo Grado')

                                        <option value="{{'Octavo Grado'}}" {{ ('Octavo Grado') ? 'selected' : '' }}> {{ $grupo[0]["Grado"]}} </option>

                                    @else
                                        <option value="{{'Octavo Grado'}}">{{'Octavo Grado'}}</option>

                                    @endif

                                    @if($grupo[0]["Modalidad"] =='Noveno Grado')

                                        <option value="{{'Noveno Grado'}}" {{ ('Noveno Grado') ? 'selected' : '' }}> {{ $grupo[0]["Grado"]}} </option>

                                    @else
                                        <option value="{{'Noveno Grado'}}">{{'Noveno Grado'}}</option>

                                    @endif
                                    @if($grupo[0]["Modalidad"] =='Decimo Grado')

                                        <option value="{{'Decimo Grado'}}" {{ ('Decimo Grado') ? 'selected' : '' }}> {{ $grupo[0]["Grado"]}} </option>

                                    @else
                                        <option value="{{'Decimo Grado'}}">{{'Decimo Grado'}}</option>

                                    @endif

                                    @if($grupo[0]["Modalidad"] =='Undecimo Grado')

                                        <option value="{{'Undecimo Grado'}}" {{ ('Undecimo Grado') ? 'selected' : '' }}> {{ $grupo[0]["Grado"]}} </option>

                                    @else
                                        <option value="{{'Undecimo Grado'}}">{{'Undecimo Grado'}}</option>

                                    @endif
                                    @if($grupo[0]["Modalidad"] =='Duodecimo Grado')

                                        <option value="{{'Duodecimo Grado'}}" {{ ('Duodecimo Grado') ? 'selected' : '' }}> {{ $grupo[0]["Grado"]}} </option>

                                    @else
                                        <option value="{{'Duodecimo Grado'}}">{{'Duodecimo Grado'}}</option>

                                    @endif

                                </select>

                                @error('Grado')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="Grupo"  >{{ __('Grupo')}}</label>

                                <input type="number" max="50" min="1" class="form-control  @error('Grupo') is-invalid @enderror"  name="Grupo" id="Grupo"  value="{{$grupo[0]["Grupo"]}}" required autocomplete="Grupo" autofocus>

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

                                        @if($group->Nombre_Modulo == $grupo[0]["Nombre_Modulo"])
                                            <option value="{{ $group->id}}" {{ ( $group->Nombre_Modulo) ? 'selected' : '' }}>{{$grupo[0]["Nombre_Modulo"]}} </option>
                                         @else
                                            <option value="{{$group->id}}">{{$group->Nombre_Modulo}}</option>
                                        @endif
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

                                <input type="number" max="50" min="1" class="form-control  @error('Num_Hombres') is-invalid @enderror"  value="{{$grupo[0]["Num_Hombres"]}}"  name="Num_Hombres" id="Num_Hombres"   required autocomplete="Num_Hombres" autofocus>

                                @error('Num_Hombres')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="Num_Mujeres"  >{{ __('N-Mujeres')}}</label>

                                <input type="number" max="50" min="1" class="form-control  @error('Num_Mujeres') is-invalid @enderror"  value="{{$grupo[0]["Num_Mujeres"]}}"  name="Num_Mujeres" id="Num_Mujeres"   required autocomplete="Num_Mujeres" autofocus>

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

                                    @if($grupo[0]["Estado_Grupo"] =='Activo')

                                        <option value="{{'Activo'}}" {{ ('Activo') ? 'selected' : '' }}> {{ $grupo[0]["Estado_Grupo"]}} </option>

                                    @else
                                        <option value="{{'Activo'}}">{{'Activo'}}</option>

                                    @endif

                                    @if($grupo[0]["Estado_Grupo"] =='Inactivo')

                                        <option value="{{'Inactivo'}}" {{ ('Inactivo') ? 'selected' : '' }}> {{ $grupo[0]["Estado_Grupo"]}} </option>

                                    @else
                                        <option value="{{'Inactivo'}}">{{'Inactivo'}}</option>

                                    @endif

                                </select>

                                @error('Estado_Grupo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="form-group row mb-0  ">
                                <div class="col-md-6 offset-md-4">



                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
