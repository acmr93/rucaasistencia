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
            'seccion' => 'quienes somos',
            'keywords' => "quienes somos",
            'description' => "quienes somos",
        ]);

        Metadato::create([
            'seccion' => 'servicios',
            'keywords' => "servicios",
            'description' => "servicios",
        ]);

        Metadato::create([
            'seccion' => 'personal especializado',
            'keywords' => "personal especializado",
            'description' => "personal especializado",
        ]);

        Metadato::create([
            'seccion' => 'clientes',
            'keywords' => "clientes",
            'description' => "clientes",
        ]);

        Metadato::create([
            'seccion' => 'contacto',
            'keywords' => "contacto",
            'description' => "contacto",
        ]);;
    }
}
