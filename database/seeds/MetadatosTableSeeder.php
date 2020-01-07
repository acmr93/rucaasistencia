<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Metadato;

class MetadatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Metadato::create([
            'seccion' => 'home',
            'keywords' => "home",
            'description' => "home",
        ]);

        Metadato::create([
            'seccion' => 'empresa',
            'keywords' => "empresa",
            'description' => "empresa",
        ]);

        Metadato::create([
            'seccion' => 'productos',
            'keywords' => "productos",
            'description' => "productos",
        ]);

        Metadato::create([
            'seccion' => 'noticias',
            'keywords' => "noticias",
            'description' => "noticias",
        ]);

        Metadato::create([
            'seccion' => 'cotizacion',
            'keywords' => "cotizacion",
            'description' => "cotizacion",
        ]);

        Metadato::create([
            'seccion' => 'contacto',
            'keywords' => "contacto",
            'description' => "contacto",
        ]);;
    }
}
