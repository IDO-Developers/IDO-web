@extends('layouts.main_prematricula')

@section('content')


    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                    @include('Alerts.success')


                    <body style="background-color:#f4f4f4;">

                    </body>


                    <div class="card-header   navbar-brand bg-white">{{ __('Datos del Alumno') }}  </div>


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

                            <div id="imagePreview">

                            </div>



                            <div class="form-group">
                                <label for="RNE_Alumno"> Número de identidad del alumno</label>
                                <input type="text" name="RNE_Alumno" placeholder="@ejemplo 0801200318241"class="form-control @error('RNE_Alumno') is-invalid @enderror " minlength="13" maxlength="13" required pattern="[0-9]+"
                                       title="formato: 0801200318241">
                                @error('RNE_Alumno')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Nombres">Nombres </label>
                                <input type="text" max="13" min="13" class="form-control @error('Nombres') is-invalid @enderror" name="Nombres" id="Nombres" placeholder="Esriba sus primeros dos nombres"  required autocomplete="Nombres" autofocus>
                                @error('Nombres')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Apellidos">Apellidos </label>
                                <input type="text" class="form-control @error('Apellidos') is-invalid @enderror" name="Apellidos" id="Apellidos" placeholder="Escriba sus Apellidos"  required autocomplete="Apellidos" autofocus>
                                @error('Apellidos')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="Sexo" >{{ __('Sexo')}}</label>



                                <select id="listaSexo" type="text"
                                        class="form-control @error('Sexo') is-invalid @enderror"
                                        name="Sexo"autofocus>


                                    <option value=""></option>
                                    <option value="M">{{'Masculino'}}</option>
                                    <option value="F">{{'Femenino'}}</option>


                                </select>

                                @error('Sexo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="Fecha_Nacimiento">Fecha de nacimiento </label>
                                <input type="date" class="form-control @error('Fecha_Nacimiento') is-invalid @enderror" name="Fecha_Nacimiento" id="Fecha_Nacimiento"   required autocomplete="Fecha_Nacimiento" autofocus>
                                @error('Fecha_Nacimiento')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>
                            <!-- div donde mostraremos el resultado -->
                            <div id="result"></div>

                            <div class="form-group">
                                <label for="Edad">Edad </label>
                                <input type="text" class="form-control @error('Edad') is-invalid @enderror" readonly="readonly" name="Edad" id="Edad"   required autocomplete="Edad" autofocus>
                                @error('Edad')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="Discapacidad" >{{ __('Discapacidad')}}</label>



                                <select id="listaDiscapacidad" type="text"
                                        class="form-control @error('Discapacidad') is-invalid @enderror"
                                        name="Discapacidad"autofocus>


                                    <option value=""></option>
                                    <option value="Visual">{{'Visual'}}</option>
                                    <option value="Física">{{'Física'}}</option>
                                    <option value="Auditiva">{{'Audítiva'}}</option>
                                    <option value="Otra">{{'Otra'}}</option>




                                </select>

                                @error('Discapacidad')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Direccion">Dirección </label>
                                <input type="text" class="form-control @error('Direccion') is-invalid @enderror" name=""  placeholder="@ejemplo Colonia cofradia Septima calle contigo a iglesia ayuno y oración" id="Direccion"   required autocomplete="Direccion" autofocus>
                                @error('Direccion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Distancia_Vivienda">Distancia del domicilio </label>
                                <input type="text" class="form-control @error('Distancia_Vivienda') is-invalid @enderror" name=""  placeholder="@ejemplo 2 km" id="Distancia_Vivienda"   required autocomplete="Distancia_Vivienda" autofocus>
                                @error('Distancia_Vivienda')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary">Siguiente</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection
