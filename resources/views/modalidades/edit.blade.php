@extends('layouts.app')

@section('content')


    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                    @include('Alerts.success')


                    <body style="background-color:#f4f4f4;">

                    </body>


                    <div class="card-header   navbar-brand bg-white">{{ __('Editar Modalidad') }}  </div>


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


                            <form action="{{route('modalidades.update',$modalidad->id)}}" method="Post">
                            @csrf
                                @method('PATCH')

                                <div class="form-group">
                                <label for="Nombre_Modalidad">Modalidad</label>
                                <input type="text" class="form-control  @error('Nombre_Modalidad') is-invalid @enderror" value='{{$modalidad->Nombre_Modalidad}}' name="Nombre_Modalidad" id="Nombre_Modalidad" placeholder="Esriba la modalidad"  required autocomplete="Nombre_Modalidad" autofocus>

                                @error('Nombre_Modalidad')
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
