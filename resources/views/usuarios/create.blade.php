@extends('layouts.app')

@section('content')


    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                     @include('Alerts.success')


                    <body style="background-color:#f4f4f4;">

                    </body>


                    <div class="card-header   navbar-brand bg-white">{{ __('Registrar Grupo') }}  </div>


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


                        <form  action="/usuarios" method="Post">
                            @csrf
                            <div class="form-group">

                             <div id="imagePreview">

                            </div>





                                    <input id="imagen"  type="file"   class="from-control  "  name="imagen"  >


                             </div>

                            <div class="form-group">
                                <label for="RNE_Empleado">RNE Empleado</label>
                                <input type="text" name="RNE_Empleado" placeholder="@ejemplo 0801200318241"class="form-control @error('RNE_Empleado') is-invalid @enderror " minlength="13" maxlength="13" required pattern="[0-9]+"
                                       title="formato: 0801200318241">
                                @error('RNE_Empleado')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>




                            <div class="form-group">
                                <label for="name">Nombre de usuario</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Esriba el nombre" maxlength="17" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Id_Rol">Rol</label>
                                <select id="listaRol" type="text"
                                        class="form-control @error('Id_Rol') is-invalid @enderror"
                                        name="Id_Rol"autofocus>

                                    <option value=""></option>
                                    @foreach(Auth::user()->userRol() as $roles)
                                        <option value="{{$roles}}">{{$roles->Nombre_Rol}}</option>
                                    @endforeach

                                    @error('Id_Rol')
                                    <span class="invalid-feedback " role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                    @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" class="form-control @error('name') is-invalid @enderror" name="password" id="password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback " role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Password">

                                @error('password_confirmation')
                                <span class="invalid-feedback " role="alert">
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
<style media="screen">
    #uploadForm,
    #imagePreview{
        width: 150px;
        margin:  auto;
    }

    img{
       max-width: 150px;
        height: 150px;
    }


</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        (function() {
            function filePreview(input){

                if(input.files && input.files[0]){

                    var reader = new FileReader();

                    reader.onload = function(e) {

                        $('#imagePreview').html("<img src='"+e.target.result+"'/>");
                        
                    };
                    reader.readAsDataURL(input.files[0]);
                }

            }
            $('#imagen').change(function (){
                filePreview(this)
            });
                

        })();



    </script>
@endsection
