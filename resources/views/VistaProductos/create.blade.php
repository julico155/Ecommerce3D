@extends('dashboard')

@section('producto')
    @if ($categorias->isEmpty() || $marcas->isEmpty())
        <div class="w-full lg:w-1/2 mx-auto mb-8">
            <div class="bg-red-100 border border-red-600 rounded-md p-4">
                <p class="text-red-600 text-lg font-semibold mb-4">
                    @if ($categorias->isEmpty())
                        <a href="{{ route('categoria.index') }}" class="text-black hover:underline">
                            Primero debe registrar una categoría
                        </a>
                    @else
                        <a href="{{ route('marca.index') }}" class="text-black hover:underline">
                            Primero debe registrar una marca
                        </a>
                    @endif
                </p>
            </div>
        </div>
    @else
        <div class="w-full lg:w-2/3 mx-auto my-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Registro de Producto</h2>
                <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="categoria" class="text-gray-600 font-semibold text-sm">Categoría:</label>
                            <select name="categoria" id="categoria" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                                <option selected disabled>Elige una categoría</option>
                                @forelse ($categorias as $c)
                                    <option value="{{ $c->id }}">{{ $c->categoria }}</option>
                                @empty
                                    <option disabled>Registra una nueva categoría</option>
                                @endforelse
                            </select>
                        </div>
                        <div>
                            <label for="marca" class="text-gray-600 font-semibold text-sm">Marca:</label>
                            <select name="marca" id="marca" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                                <option selected disabled>Elige una marca</option>
                                @forelse ($marcas as $m)
                                    <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                                @empty
                                    <option disabled>Registra una nueva marca</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="mt-6">
                            <label for="foto" class="text-gray-600 font-semibold text-sm">Foto 1:</label>
                            <input type="file" name="foto1" id="foto1" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="foto" class="text-gray-600 font-semibold text-sm">Foto 2:</label>
                            <input type="file" name="foto2" id="foto2" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="foto" class="text-gray-600 font-semibold text-sm">Foto 3:</label>
                            <input type="file" name="foto3" id="foto3" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="foto" class="text-gray-600 font-semibold text-sm">Video:</label>
                            <input type="file" name="video" id="foto" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="foto" class="text-gray-600 font-semibold text-sm">Archivo 3d:</label>
                            <input type="file" name="archivo_3d" id="archivo_3d" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="nombre" class="text-gray-600 font-semibold text-sm">Nombre del producto:</label>
                            <input type="text" name="nombre" id="nombre" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                    </div>
                    <div class="mt-6">
                        <label for="descripcion" class="text-gray-600 font-semibold text-sm">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="mt-6">
                            <label for="cant_min" class="text-gray-600 font-semibold text-sm">Stock Mínimo:</label>
                            <input type="number" name="cant_min" id="cant_min" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="es_3d" class="text-gray-600 font-semibold text-sm">Es 3D:</label>
                            <input type="checkbox" name="es_3d" id="es_3d" class="border border-gray-400 rounded-lg py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>                        
                        <div class="mt-6">
                            <label for="precio" class="text-gray-600 font-semibold text-sm">Precio:</label>
                            <input type="number" name="precio" id="precio" required
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mt-6">
                            <label for="talla" class="text-gray-600 font-semibold text-sm">Talla:</label>
                            <select name="talla" id="talla"
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                                <option selected disabled>Elige una talla</option>
                                @forelse ($tallas as $t)
                                    <option value="{{ $t->id }}">   
                                        {{ $t->tipo_talla_numero }}
                                        {{$t->tipo_talla_letra }}
                                    </option>
                                @empty
                                    <option disabled>Registra una nueva talla</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mt-6">
                            <label for="color" class="text-gray-600 font-semibold text-sm">Color:</label>
                            <select name="color" id="color"
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                                <option selected disabled>Elige un color</option>
                                <!-- Aquí se llenarán las opciones de colores dinámicamente -->
                                @forelse ($color as $c)
                                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                @empty
                                    <option disabled>Registra un nuevo color</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full focus:outline-none focus:shadow-outline">Guardar</button>
                        <a href="{{ route('producto.index') }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-6 ml-4 rounded-full">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
