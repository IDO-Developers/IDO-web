@extends('layouts.app')

@section('content')


    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                     @include('Alerts.success')


                    <body style="background-color:#f4f4f4;">

                    </body>


                    <div class="card-header   navbar-brand bg-white">{{ __('Editar Usuario') }}  </div>


                    </body>
                    <div class="card-body   " ; >

                            <h6>Editar a: {{$user[0]['name']}}</h6>





                            <form action="{{route('usuarios.update',$user[0]['id'])}}" method="Post">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="RNE_Empleado">RNE Empleado</label>
                                    <input type="text" class="form-control  @error('RNE_Alumno') is-invalid @enderror" name="RNE_Empleado"  value='{{$user[0]['RNE_Empleado']}}'id="RNE_Empleado" placeholder="Esriba la identidad" required autocomplete="RNE_Alumno" autofocus>

                                    @error('RNE_Alumno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="name">Nombre de usuario</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value='{{$user[0]['name']}}' placeholder="Esriba el nombre" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Nombre_Rol">Rol</label>
                                    <select id="Id_Rol" type="text"
                                            class="form-control @error('Id_Rol') is-invalid @enderror"
                                            name="Id_Rol"autofocus>



                                        <option value=""></option>
                                        @foreach(Auth::user()->userRol() as $roles)

                                            @if($roles->Nombre_Rol == $user[0]['Nombre_Rol'])
                                                    <option value="{{$roles }}" {{ ( $roles->Nombre_Rol) ? 'selected' : '' }}> {{$user[0]['Nombre_Rol']}} </option>

                                              @else
                                                    <option value="{{$roles}}">{{$roles->Nombre_Rol}}</option>
v
                                                @endif
                                         @endforeach
                                    </select>


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
