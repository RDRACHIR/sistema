<h1> {{ $modo }} empleado </h1>

{{-- Validacion de datos --}}
@if (count($errors)>0)
  <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ( $errors->all() as $error )
          <li>{{$error }}</li>
        @endforeach
      </ul>
  </div>
@endif

        <div class="mb-3">
          <label for="" class="form-label">Nombre:</label>
          <input type="text"
            class="form-control" name="nombre" id="nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('nombre') }}" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Apellidos:</label>
          <input type="text"
            class="form-control" name="apellidos" id="apellidos"  value="{{ isset($empleado->Apellidos)?$empleado->Apellidos:old('apellidos')}}" aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Correo:</label>
          <input type="text"
            class="form-control" name="correo" id="correo" value="{{ isset($empleado->Correo) ?$empleado->Correo:old('correo')}}"aria-describedby="helpId" placeholder="">
        </div>
        <div class="mb-3">
          <label for="foto" class="form-label">Foto:</label><br>
          @if (isset($empleado->Foto))
          <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto}}" alt="Foto del empleado" width="100">      
          @endif
          <br>
          <input type="file"
            class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
        </div>
        <input class="btn btn-success" type="submit" value=" {{$modo}} empleado">
        <a name="" id="" class="btn btn-primary" href="{{url('empleado')}}" role="button">Cancelar</a>