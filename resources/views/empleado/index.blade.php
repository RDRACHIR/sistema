@extends('layouts.app')

@section('content')
<div class="container">


@if(Session::has('message'))
  <span class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('message')}}
  </span> <br><br>
@endif

<a name="" id="" class="btn btn-success" href="{{url('empleado/create')}}" role="button">Registrar nuevo empleado</a>
<br><br>
<div class="table-responsive-sm">
  <table class="table table-primary">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Foto</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Correo</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($empleados as $empleado)
      <tr class="">
        <td scope="row">{{ $empleado->id }}</td>
        <td scope="row">
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto}}" alt="Foto del empleado" width="150">
        </td>
        <td scope="row">{{ $empleado->Nombre }}</td>
        <td scope="row">{{ $empleado->Apellidos }}</td>
        <td scope="row">{{ $empleado->Correo }}</td>

        <td scope="row">
          {{-- Editar registro --}}
          <a class="btn btn-warning"  href="{{ url('/empleado/'.$empleado->id.'/edit') }}" > 
          Editar
          </a>
          
          {{-- Borrar un registro --}}
          <form class="d-inline" action="{{ url('/empleado/'.$empleado->id)}}" method="post">
          @csrf
          {{ method_field('DELETE') }}
          <input class="btn btn-primary" onclick="return confirm('¿Quieres borrar el registro?')" type="submit" value="Borrar">
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {!! $empleados->links()!!}
</div>
</div>
@endsection
