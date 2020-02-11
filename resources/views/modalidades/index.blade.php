@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Modalidades<a href="modalidades/create">  <button type="button" class="btn btn-success float-right">Agregar Modalidad</button> </a> </h2>
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
                <th scope="col">Modalidad</th>
                <th scope="col">Opciones</th>


            </tr>
            </thead>
            <tbody>
            @foreach($modalidades as $modalidad)
                <tr>
                    <th scope="row">{{$modalidad->id}}</th>
                    <td>{{$modalidad->Nombre_Modalidad}}</td>

                    <td WIDTH="185" >
                        <a href="{{route('modalidades.edit',$modalidad->id)}}">  <button type="button" class="btn btn-primary float-left">Editar</button></a>



                    </td>




                </tr>
            @endforeach

            </tbody>
        </table>
        </div>
 @endsection