<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\categoria;
use App\Models\color;
use App\Models\producto;
use App\Models\User;
use App\Models\marca;
use App\Models\stock;
use App\Models\Talla; 
use Illuminate\Http\Request;
use ZipArchive;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = producto::get();
        $id = auth()->user()->id;
        $e = User::find($id);
        $p = producto::where('id_propietario', $e->id)->get();
        $categorias = categoria::get();

        return view('VistaProductos.index', compact('productos', 'e', 'p', 'categorias'));
        
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = categoria::get();
        $marcas = marca::get();
        $tallas = Talla::all();
        $color = color::all();
        // dd($categorias->isEmpty());
        return view('VistaProductos.create', compact('categorias','marcas','tallas','color'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario


    $id = auth()->user()->id;
    $p = new Producto();
    $p->nombre = $request->nombre;
    $p->descripcion = $request->descripcion;
    $p->precio = $request->precio;
    $p->id_propietario = $id;
    $p->categoria_id = $request->categoria;
    $p->marca_id = $request->marca;
    $p->stock = 0;
    $p->stock_min = $request->cant_min;
    $p->talla_id = $request->talla;
    $p->color_id = $request->color;
    $p->es_3d = $request->has('es_3d'); // Guardar el valor del checkbox

    // Manejar carga de archivo 3D
    if ($request->hasFile('archivo_3d')) {
        $archivo = $request->file('archivo_3d');
        $archivoNombre = time() . '-' . $archivo->getClientOriginalName();
        $archivo->move(public_path('models'), $archivoNombre);
        $p->archivo_3d = 'models/' . $archivoNombre;
    }

    // Manejar carga de imágenes
    $destino = 'img/fotosProductos/';
    for ($i = 1; $i <= 3; $i++) {
        if ($request->hasFile('foto'.$i)) {
            $file = $request->file('foto'.$i);
            $fotoNombre = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path($destino), $fotoNombre);
            $p->{'imagen'.$i} = $destino . $fotoNombre;
        }
    }

    // Manejar carga de video
    if ($request->hasFile('video')) {
        $video = $request->file('video');
        $videoName = time() . '-' . $video->getClientOriginalName();
        $video->move(public_path('videos'), $videoName);
        $p->video = 'videos/' . $videoName;
    }

    $p->save();

    activity()
        ->causedBy(auth()->user())
        ->log('Se creo un producto: ' . $p->nombre);

    return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente.');
}


    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        // dd($producto);
        $p = producto::find($producto->id);
        $u = User::find($p->id_propietario)->first();

        // dd($p);
        return view('VistaEmpresa.productoShow', compact('p', 'u'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        $categorias = categoria::get();
        $marcas = marca::get();
        $p = producto::find($producto->id);
        $tallas = Talla::all();
        $color = color::all();
        return view('VistaProductos.edit', compact('p', 'categorias','marcas','tallas','color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $p = Producto::findOrFail($producto->id);
        $destino = 'img/fotosProductos/';
        $destinoVideo = 'videos/';
        $destino3D = 'archivos3D/';

        // Actualizar fotos
        for ($i = 1; $i <= 3; $i++) {
            if ($request->hasFile('foto' . $i)) {
                $file = $request->file('foto' . $i);
                $fotoNombre = time() . '-' . $file->getClientOriginalName();
                $file->move($destino, $fotoNombre);
                $p->{'imagen' . $i} = $destino . $fotoNombre;
            }
        }

        // Actualizar video
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoNombre = time() . '-' . $video->getClientOriginalName();
            $video->move($destinoVideo, $videoNombre);
            $p->video = $destinoVideo . $videoNombre;
        }

        // Actualizar archivo 3D
        if ($request->hasFile('archivo_3d')) {
            $archivo3D = $request->file('archivo_3d');
            $nombreArchivo3D = time() . '-' . $archivo3D->getClientOriginalName();
            $archivo3D->move($destino3D, $nombreArchivo3D);
            $p->archivo_3d = $destino3D . $nombreArchivo3D;
        }

        // Actualizar información básica del producto
        $p->nombre = $request->nombre;
        $p->descripcion = $request->descripcion;
        $p->stock_min = $request->stock_min;
        $p->precio = $request->precio;
        $p->categoria_id = $request->categoria;
        $p->talla_id = $request->talla;
        $p->color_id = $request->color;
        $p->es_3d = $request->has('es_3d'); 
        $p->save();

        // Registrar actividad
        activity()
            ->causedBy(auth()->user())
            ->log('Se actualizó un producto: ' . $p->nombre);

        return redirect()->route('producto.index')->with('success', 'Producto Actualizado con Éxito');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        // dd($producto);


        $p = producto::where('id',$id)->first();
        $p->delete();
        activity()
        ->causedBy(auth()->user()) // El usuario responsable de la actividad
        ->log('Se elimino un producto : ' . $p->nombre);
        return redirect()->route('producto.index')->with('success', 'Producto Eliminado con Exito');;
    }

    public function verproducto(Request $request)
    {
        $categorias = Categoria::all();
    $colores = Color::all();
    $tallas = Talla::all();
        $productos = Producto::query();

        if ($request->has('categoria')) {
            $productos->where('categoria_id', $request->categoria);
        }

        if ($request->has('color')) {
            $productos->where('color_id', $request->color);
        }

        if ($request->has('talla')) {
            $productos->where('talla_id', $request->talla);
        }

        $productos = $productos->get();

        // Otras lógicas, como obtener las categorías, colores y tallas para los filtros

        return view('ver-productos', compact('productos', 'categorias', 'colores', 'tallas'));
    }
}
