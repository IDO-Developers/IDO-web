@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Módulos<a href="modulos/create">  <button type="button" class="btn btn-success float-right">Agregar Módulo</button> </a> </h2>
        @if($search)
            <h6>

                <div class="alert alert-primary" role="alert">
                    Los resultados para tu busqueda {{$search}} son:
                </div>
            </h6>
        @endif

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Módulo</th>
                <th scope="col">Opciones</th>


            </tr>
            </thead>
            <tbody>
            @foreach($modulos as $modulo)
                <tr>
                    <th scope="row">{{$modulo->id}}</th>
                    <td>{{$modulo->Nombre_Modulo}}</td>

                    <td WIDTH="185" >
                        <a href="{{route('modulos.edit',$modulo->id)}}">  <button type="button" class="btn btn-primary float-left">Editar</button></a>



                    </td>




                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection