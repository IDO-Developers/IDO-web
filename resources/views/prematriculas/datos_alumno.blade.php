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


                        <form  action="/prematriculas" method="Post">
                            @csrf





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

                            <div class="form-group">
                                <label for="RNE_Alumno"> Número de identidad del alumno</label>
                                <input type="text" name="RNE_Alumno" placeholder="@ejemplo 0801200318241"class="form-control @error('RNE_Alumno') is-invalid @enderror " minlength="13" maxlength="13" required pattern="[0-9]+"
                                       autofocus    title="formato: 0801200318241">
                                @error('RNE_Alumno')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="Sexo" >{{ __('Sexo')}}</label>



                                <select id="listaSexo" type="text"
                                        class="form-control @error('Sexo') is-invalid @enderror"
                                        name="Sexo"autofocus required>


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
                                <input type="text" readonly class="form-control @error('Edad') is-invalid @enderror"   name="Edad" id="Edad"   required autocomplete="Edad" autofocus>
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
                                        name="Discapacidad"autofocus required>


                                    <option value=""></option>
                                    <option value="Ninguna">{{'Ninguna'}}</option>

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
                                <input type="text" class="form-control @error('Direccion') is-invalid @enderror" name="Direccion"  placeholder="@ejemplo Danli el Paraiso Colonia cofradia Septima calle contigo a iglesia ayuno y oración" id="Direccion"   required autocomplete="Direccion" autofocus>
                                @error('Direccion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Distancia_Vivienda">Distancia del domicilio </label>
                                <input type="text" class="form-control @error('Distancia_Vivienda') is-invalid @enderror" name="Distancia_Vivienda"  placeholder="@ejemplo 2 km" id="Distancia_Vivienda"   required autocomplete="Distancia_Vivienda" autofocus>
                                @error('Distancia_Vivienda')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">

                                 <label for="Centro_Procedencia">Centro de Procedencia </label>
                                <input type="text" class="form-control @error('Centro_Procedencia') is-invalid @enderror" name="Centro_Procedencia"  placeholder="@ejemplo C.E.B Jose Trinidad Reyes" id="Centro_Procedencia"   required autocomplete="Centro_Procedencia" autofocus>
                                @error('Centro_Procedencia')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>



                            <button  name="siguiente" id="siguiente" type="submit" class="btn btn-primary">Siguiente</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>

    <script  >


        /**
         * Funcion que devuelve true o false dependiendo de si la fecha es correcta.
         * Tiene que recibir el dia, mes y año
         */
        function isValidDate(day,month,year)
        {
            var dteDate;

            // En javascript, el mes empieza en la posicion 0 y termina en la 11
            //   siendo 0 el mes de enero
            // Por esta razon, tenemos que restar 1 al mes
            month=month-1;
            // Establecemos un objeto Data con los valore recibidos
            // Los parametros son: año, mes, dia, hora, minuto y segundos
            // getDate(); devuelve el dia como un entero entre 1 y 31
            // getDay(); devuelve un num del 0 al 6 indicando siel dia es lunes,
            //   martes, miercoles ...
            // getHours(); Devuelve la hora
            // getMinutes(); Devuelve los minutos
            // getMonth(); devuelve el mes como un numero de 0 a 11
            // getTime(); Devuelve el tiempo transcurrido en milisegundos desde el 1
            //   de enero de 1970 hasta el momento definido en el objeto date
            // setTime(); Establece una fecha pasandole en milisegundos el valor de esta.
            // getYear(); devuelve el año
            // getFullYear(); devuelve el año
            dteDate=new Date(year,month,day);

            //Devuelva true o false...
            return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
        }

        /**
         * Funcion para validar una fecha
         * Tiene que recibir:
         *  La fecha en formato ingles yyyy-mm-dd
         * Devuelve:
         *  true-Fecha correcta
         *  false-Fecha Incorrecta
         */
        function validate_fecha(fecha)
        {
            var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");

            if(fecha.search(patron)==0)
            {
                var values=fecha.split("-");
                if(isValidDate(values[2],values[1],values[0]))
                {
                    return true;
                }
            }
            return false;
        }

        /**
         * Esta función calcula la edad de una persona y los meses
         * La fecha la tiene que tener el formato yyyy-mm-dd que es
         * metodo que por defecto lo devuelve el <input type="date">
         */
        let grupo = document.getElementById("Fecha_Nacimiento");
        grupo.addEventListener("change",function () {
            var fecha=document.getElementById("Fecha_Nacimiento").value;
            if(validate_fecha(fecha)==true)
            {
                // Si la fecha es correcta, calculamos la edad
                var values=fecha.split("-");
                var dia = values[2];
                var mes = values[1];
                var ano = values[0];

                // cogemos los valores actuales
                var fecha_hoy = new Date();
                var ahora_ano = fecha_hoy.getYear();
                var ahora_mes = fecha_hoy.getMonth()+1;
                var ahora_dia = fecha_hoy.getDate();

                // realizamos el calculo
                var edad = (ahora_ano + 1900) - ano;
                if ( ahora_mes < mes )
                {
                    edad--;
                }
                if ((mes == ahora_mes) && (ahora_dia < dia))
                {
                    edad--;
                }
                if (edad > 1900)
                {
                    edad -= 1900;
                }

                // calculamos los meses
                var meses=0;
                if(ahora_mes>mes)
                    meses=ahora_mes-mes;
                if(ahora_mes<mes)
                    meses=12-(mes-ahora_mes);
                if(ahora_mes==mes && dia>ahora_dia)
                    meses=11;

                // calculamos los dias
                var dias=0;
                if(ahora_dia>dia)
                    dias=ahora_dia-dia;
                if(ahora_dia<dia)
                {
                    ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
                    dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
                }
                document.getElementById("Edad").value=edad;
                if(edad <11){
                    document.getElementById("Edad").value="";

                }

            }else{
                document.getElementById("Edad").value="";

            }
        });
    </script>

@endsection
