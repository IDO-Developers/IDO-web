@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Grupos <a href="grupos/create">  <button type="button" class="btn btn-success  float-right  margin-bottom">Agregar Grupo</button> </a> </h2>
        @if($search)
            <h6>

                <div class="alert alert-primary" role="alert">
                    Los resultados para tu busqueda {{$search}} son:
                </div>
            </h6>
        @endif
        <table id="dtHorizontalExample" class="table    table-sm" cellspacing="0"
               width="100%">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Modalidad</th>
                <th scope="col">Jornada</th>

                <th scope="col">Grado</th>
                <th scope="col">Grupo</th>
                <th scope="col">Módulo</th>
                 <th scope="col">Hombres</th>
                <th scope="col">Mujeres</th>
                <th scope="col">Opciones</th>
                <th scope="col">Estado</th>




            </tr>
            </thead>
            <tbody>
            @foreach($grupos as $grupo)
                <tr>
                    <th scope="row">{{$grupo->Id_Grupo}}</th>
                    <td>{{$grupo->Nombre_Modalidad}}</td>
                    <td>{{$grupo->Jornada}}</td>
                    <td>{{$grupo->Grado}}</td>
                    <td>{{$grupo->Grupo}}</td>
                    <td>{{$grupo->Nombre_Modulo}}</td>
                    <td>{{$grupo->Num_Hombres}}</td>
                    <td>{{$grupo->Num_Mujeres}}</td>
                    <td>{{$grupo->Estado_Grupo}}</td>






                    <td WIDTH="170">
                        <a href="{{route('grupos.edit',$grupo->Id_Grupo)}}">  <button type="button" class="btn btn-primary float-left">Editar</button></a>

                        <form action="{{route('grupos.destroy',$grupo->Id_Grupo)}}" method="POST" onclick="
                    return confirm('¿Seguro que quiere eliminar este Grupo?')" >


                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-right">Eliminar</button>



                    </form>


                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection