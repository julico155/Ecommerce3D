<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    //
    public function index()
    {
        $materiales = Material::get();

        return view('VistaMaterial.index', compact('materiales'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $material = new Material();
        $material->nombre = $request->nombre;
        $material->save();

        activity()
            ->causedBy(auth()->user())
            ->log('Se creó un material: ' . $material->nombre);

        return redirect()->route('material.index');
    }

    public function show(Material $material)
    {
        //
    }

    public function edit(Material $material)
    {
        $c = material::find($material->id);
        return view('VistaMaterial.edit', compact('material'));
    }

    public function update(Request $request, material $material)
    {
        $c = Material::where('id', $material->id)->first();
        $c->nombre = $request->nombre;
        $c->save();

        activity()
            ->causedBy(auth()->user())
            ->log('Se actualizó un material: ' . $c->nombre);

        return redirect()->route('material.index');
    }

    public function destroy($id)
    {
        $material = Material::find($id);

        // Verificar si hay productos relacionados con el material
        if ($material->productos()->exists()) {
            return redirect()->route('material.index')->with('error', 'No se puede eliminar el material porque tiene productos asociados');
        }

        // Si no hay productos relacionados, se puede eliminar el material
        $material->delete();

        activity()
            ->causedBy(auth()->user())
            ->log('Se eliminó un material: ' . $material->nombre);

        return redirect()->route('material.index')->with('success', 'material eliminado correctamente');
    }
}
