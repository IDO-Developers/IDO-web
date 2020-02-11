@extends('layouts.app')

@section('content')

    <div class="container">

        <h2>Usuarios<a href="usuarios/create">  <button type="button" class="btn btn-success float-right">Agregar Usuario</button> </a> </h2>
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
                <th scope="col">RNE Empleado</th>
                <th scope="col">Usuario</th>

                <th scope="col">Rol</th>
                <th scope="col">Opciones</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->RNE_Empleado}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->Nombre_Rol}}</td>
                    <td WIDTH="185">
                        <a href="{{route('usuarios.edit',$user->id)}}">  <button type="button" class="btn btn-primary float-left">Editar</button></a>

                        <form action="{{route('usuarios.destroy',$user->id)}}" method="POST" onclick="
                    return confirm('¿Seguro que quiere eliminar a {{$user->name}}?')">
                           @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger float-right ">Eliminar</button>

                      </form>

                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection