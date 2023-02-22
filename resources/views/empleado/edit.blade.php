@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Empleados
    </div>
    <div class="card-body">
      <form action="{{url('/empleado/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('empleado.formm', ['modo'=>'Editar'])
      </form>
    </div>
  </div>
    </div>
  @endsection