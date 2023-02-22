<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //Leer los datos de la base de datos
      $datos['empleados'] = Empleado::paginate(5);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones de los campos
      $campos=[
        'nombre' => 'required | string | max:100',
        'apellidos' =>'required | string | max:100',
        'correo' =>'required | email',
        'foto' => 'required | max:10000 | mimes:jpeg,png,jpg',
      ];

      $mensaje = [
        'required' => 'El :attribute es requerido',
        'foto.requerid' =>'La foto es requerida'
      ];

      $this->validate($request, $campos, $mensaje);

        // $datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token', 'btn'); //Recolectar los datos

        if ($request->hasFile('foto')) {
          $datosEmpleado['foto']=$request->file('foto')->store('uploaps' ,'public');
        }

       Empleado::insert($datosEmpleado); //Insertar datos en la base de datos
        // return response()->json($datosEmpleado);
        return redirect('empleado')->with('message', 'Empleado agregado con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado): Response
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      // Buscar los datos a traves del id
      $empleado = Empleado::findOrFail($id);
      return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      // Validaciones de los campos
      $campos=[
        'nombre' => 'required | string | max:100',
        'apellidos' =>'required | string | max:100',
        'correo' =>'required | email',
      ];

      $mensaje = [
        'required' => 'El :attribute es requerido',
      ];

      if ($request->hasFile('foto')) {
              $campos=[ 'foto' => 'required | max:10000 | mimes:jpeg,png,jpg'];
              $mensaje = ['foto.requerid' =>'La foto es requerida'];
      }

      $this->validate($request, $campos, $mensaje);


      // Recepción de datos a eccepción de tokent, btn, method
        $datosEmpleado = request()->except(['_token', 'btn', '_method']);

        if ($request->hasFile('foto')) {
          $empleado = Empleado::findOrFail($id);
          Storage::delete('public/'.$empleado->Foto);
          $datosEmpleado['Foto']=$request->file('foto')->store('uploaps' ,'public');
        }

        
        
        
        Empleado::where('id', '=', $id)->update($datosEmpleado); //Buscar el registro y actualizar

        // $empleado = Empleado::findOrFail($id);
        // return view('empleado.edit', compact('empleado'));

        return redirect('empleado')->with('message', 'Actulizacion exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

      $empleado = Empleado::findOrFail($id);
      if (Storage::delete('public/'.$empleado->Foto)) {
        Empleado::destroy($id);
      }

        return redirect('empleado')->with('message', 'El registro se elimino con exiito!');
    }
}
