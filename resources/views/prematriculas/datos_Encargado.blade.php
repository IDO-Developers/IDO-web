@extends('layouts.main_prematricula')

@section('content')


    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" >
                    @include('Alerts.success')


                    <body style="background-color:#f4f4f4;">

                    </body>


                    <div class="card-header   navbar-brand bg-white">{{ __('Datos del Encargado') }}  </div>


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


                        <form  action="{{route('prematriculas.edit','1')}}" method="Post">
                            @method('PATCH')
                            @csrf

                            <div id="imagePreview">

                            </div>





                            <div class="form-group">
                                <label for="Nombres">Nombres </label>
                                <input type="text"  class="form-control @error('Nombres') is-invalid @enderror" name="Nombres" id="Nombres" placeholder="Esriba sus primeros dos nombres"  required autocomplete="Nombres" autofocus >
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
                                <label for="RNE_Alumno"> Número de identidad del encargado</label>
                                <input type="number"  class="form-control  @error('RNE_Alumno') is-invalid @enderror"  name="RNE_Alumno" id="RNE_Alumno" placeholder="@ejemplo 0801200318241"  required autocomplete="RNE_Alumno" autofocus>

                                @error('RNE_Alumno')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Telefono">Teléfono </label>
                                <input type="text" class="form-control @error('Telefono') is-invalid @enderror" name="Telefono" id="Apellidos" placeholder="@ejemplo 98422701"  required autocomplete="Telefono" autofocus>
                                @error('Telefono')
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



                            <div class="form-group">
                                <label for="Ocupacion">Ocupación </label>
                                <input type="text" class="form-control @error('Ocupacion') is-invalid @enderror" name=""  placeholder="Escriba su ocupación" id="Ocupacion"   required autocomplete="Ocupacion" autofocus>
                                @error('Ocupacion')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="Estado_Trabajo"  >{{ __('Estado Trabajo')}}</label>



                                <select id="listaTrabajo" type="text"
                                        class="form-control @error('Estado_Trabajo') is-invalid @enderror"

                                        name="Estado_Trabajo"autofocus required>


                                    <option value=""></option>
                                    <option value="Activo">{{'Activo'}}</option>
                                    <option value="Inactivo">{{'Inactivo'}}</option>
                                </select>

                                @error('Estado_Trabajo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Salario">Salario </label>
                                <input type="number"  class="form-control @error('Salario') is-invalid @enderror" name="Salario"  placeholder="Escriba su ocupación" id="Salario"   required autocomplete="Salario" autofocus>
                                @error('Salario')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>

                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="Nivel_Academico" >Nivel Académico</label>



                                <select id="listaNivel" type="text"
                                        class="form-control @error('Nivel_Academico') is-invalid @enderror"
                                        name="Nivel_Academico"autofocus>


                                    <option value=""></option>
                                    <option value="Ninguno">{{'Ninguno'}}</option>

                                    <option value="Primaria">{{'Primaria'}}</option>

                                    <option value="Secundaria">{{'Secundaria'}}</option>
                                    <option value="Licenciatura">{{'Licenciatura'}}</option>
                                    <option value="Doctorado">{{'Doctorado'}}</option>



                                </select>

                                @error('Nivel_Academico')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-primary">Guardar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script type="text/javascript">
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

            }else{
                document.getElementById("result").innerHTML="La fecha "+fecha+" es incorrecta";
            }
        });
    </script>

@endsection
