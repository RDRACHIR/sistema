<!doctype html>
<html lang="en">

<head>
  <title>Sistema</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  @extends('layouts.app')
  @section('content')
  <div class="container">
        <main>
          <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
        <br>
        <div class="card">
          <div class="card-header">
            Empleados
          </div>
          <div class="card-body">
            <form action="{{url('/empleado')}}" method="post" enctype="multipart/form-data">
              @csrf
              @include('empleado.formm',  ['modo'=>'Crear'])
            </form>
          </div>
        </div>

      </div>
      <div class="col-sm-7      ">
        
      </div>
        </div>
      </div>

        </main>
</div>
  @endsection




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>

