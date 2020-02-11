@extends('layouts.bar_login')

@section('content')

    <body class="body" id="imagenBg"  background="{{ asset('dist/img/fotoIDO.jpg')}}" >



        <div class="login-box" >

            <div class="login-logo">

            </div>
            <!-- /.login-logo -->
            <div class="card m-md-4 " >

                <div class="card-body login-card-body">

                    <p class="login-box-msg">

                        Inicia sesión para continuar</p>

                    <form method="POST" action="{{ route('/iniciar') }}">
                        @csrf

                        <div class="input-group mb-2">
                            <input id="RNE_Alumno" placeholder="Ingerese su identidad" type="text" class="form-control @error('RNE_Alumno') is-invalid @enderror" name="RNE_Alumno" value="{{ old('RNE_Alumno') }} " required autocomplete="RNE_Alumno" autofocus >                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            @error('RNE_Alumno')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                         </div>

                        <div class="input-group mb-2">
                            <input id="password" placeholder="Ingerese su password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value=""   autofocus >
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">


                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>



                            </div>
                        </div>
                    </form>



                    <!--      <div class="social-auth-links text-center mb-3">
                            <p>- OR -</p>
                            <a href="#" class="btn btn-block btn-primary">
                                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                            </a>
                        </div>
                        /.social-auth-links -->


                </div>
            @include('Alerts.errors')
            <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
    </div>
    </body>

    <style>
        .card{
            height: 250px;
            /*IMPORTANTE*/
            display: flex;
            left: 500px;
            top: 120px;
            justify-content: center;
            align-items: center;
        }

        .body{
             background-size:100% 100%;
        }

    </style>
    <script>


    </script>


@endsection