<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

use App\Models\carrito;
use App\Models\categoria;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->roles();
        $this->cargarUsuarios();
        $this->cargarCategoria();
        $this->cargarmateriales();
    }
    public function roles()
    {
        $administrador            = Role::create(['name' => 'administrador']);
        $cliente        = Role::create(['name' => 'cliente']);
        $vendedor    = Role::create(['name' => 'vendedor']);
        ////////////ADMIN
        Permission::create(['name' => 'AdmUsuario'])->syncRoles([$administrador]);
        ////////////ROLES
        Permission::create(['name' => 'AdmCompra'])->syncRoles([$administrador, $vendedor]);
        Permission::create(['name' => 'AdmVenta'])->syncRoles([$vendedor, $cliente]);
        Permission::create(['name' => 'AdmProductos'])->syncRoles([$administrador]);
        ////////////
    }
    public function cargarUsuarios()
    {

        $user = new User();
        //$user->id = 1;
        $user->name =  'Admin Rene';
        $user->email =  'rene@gmail.com';
        $user->password = bcrypt('12345678');
        $user->profile_photo_path = 'img/default.png';
        $user->assignRole('administrador');
        $user->save();

        $carrito = new carrito();
        $carrito->cliente_id = $user->id;
        $carrito->total = 0;
        $carrito->estado = 'pendiente';
        $carrito->save();


        $user = new User();
        //$user->id = 2;
        $user->name =  'vendedor';
        $user->email =  'vendedor@gmail.com';
        $user->password = bcrypt('12345678');
        $user->profile_photo_path = 'img/default.png';
        $user->assignRole('vendedor');
        $user->save();

        $carrito = new carrito();
        $carrito->cliente_id = $user->id;
        $carrito->total = 0;
        $carrito->estado = 'pendiente';
        $carrito->save();

        $user = new User();
        //$user->id = 3;
        $user->name =  'cliente';
        $user->email =  'cliente@gmail.com';
        $user->password = bcrypt('12345678');
        $user->profile_photo_path = 'img/default.png';
        $user->assignRole('cliente');

        $user->save();

        $carrito = new carrito();
        $carrito->cliente_id = $user->id;
        $carrito->total = 0;
        $carrito->estado = 'pendiente';
        $carrito->save();
    }
    public function cargarmateriales()
    {
        //materiales de la prenda
        Material::create(['nombre' => 'Acero fundido']);
        Material::create(['nombre' => 'Acero Inoxidable']);
        Material::create(['nombre' => 'Alumnio']);
        Material::create(['nombre' => 'Hierro']);
        Material::create(['nombre' => 'Hierro negro']);
    }
    public function cargarCategoria()
    {

        $cat = new categoria();
        $cat->categoria = 'Parrillas';
        $cat->save();

        $cat = new categoria();
        $cat->categoria = 'Hornos';
        $cat->save();

        $cat = new categoria();
        $cat->categoria = 'Pizzeros';
        $cat->save();

        $cat = new categoria();
        $cat->categoria = 'Caja China';
        $cat->save();

        $cat = new categoria();
        $cat->categoria = 'Espiadero';
        $cat->save();

        $cat = new categoria();
        $cat->categoria = 'Freidoras';
        $cat->save();

        $cat = new categoria();
        $cat->categoria = 'Planchas';
        $cat->save();

        $cat = new categoria();
        $cat->categoria = 'Carritos';
        $cat->save();

        $cat = new categoria();
        $cat->categoria = 'Cocinas';
        $cat->save();
    }
}
