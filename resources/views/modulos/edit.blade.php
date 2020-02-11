@extends('layouts.app')

@section('content')


    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                    @include('Alerts.success')


                    <body style="background-color:#f4f4f4;">

                    </body>


                    <div class="card-header   navbar-brand bg-white">{{ __('Editar Módulo') }}  </div>


                    </body>
                    <div class="card-body   " ; >

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form action="{{route('modulos.update',$modulo->id)}}" method="Post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="Nombre_Modulo">Módulo</label>
                                <input type="text" class="form-control  @error('Nombre_Modulo') is-invalid @enderror" value='{{$modulo->Nombre_Modulo}}' name="Nombre_Modulo" id="Nombre_Modulo" placeholder="Escriba el módulo"  required autocomplete="Nombre_Modulo" autofocus>

                                @error('Nombre_Modulo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
