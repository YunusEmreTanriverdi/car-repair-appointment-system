<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StajProjesiSeeder extends Seeder
{
    
    
     
    public function run(): void
    {
    $bmw = \App\Models\StajProjesiMarkalarModel::create(['ad' => 'BMW']);
    $mercedes = \App\Models\StajProjesiMarkalarModel::create(['ad' => 'Mercedes']);
    $peugeot = \App\Models\StajProjesiMarkalarModel::create(['ad' => 'Peugeot']);
    $Renault = \App\Models\StajProjesiMarkalarModel::create(['ad' => 'Renault']);
    $Wolfswogen = \App\Models\StajProjesiMarkalarModel::create(['ad' => 'Wolfswogen']);
    $Volvo = \App\Models\StajProjesiMarkalarModel::create(['ad' => 'Volvo']);
    $Opel = \App\Models\StajProjesiMarkalarModel::create(['ad' => 'Opel']);
    $Audi = \App\Models\StajProjesiMarkalarModel::create(['ad' => 'Audi']);


    \App\Models\StajProjesiModellerModel::create(['marka_id' => $bmw->id, 'ad' => 'M2 coupe']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $bmw->id, 'ad' => 'XM']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $bmw->id, 'ad' => 'X7']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $bmw->id, 'ad' => 'X3']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $bmw->id, 'ad' => 'i7']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $bmw->id, 'ad' => 'i4']);

    \App\Models\StajProjesiModellerModel::create(['marka_id' => $mercedes->id, 'ad' => 'A serisi']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $mercedes->id, 'ad' => 'C serisi']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $mercedes->id, 'ad' => 'CLA serisi']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $mercedes->id, 'ad' => 'CLE serisi']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $mercedes->id, 'ad' => 'E serisi']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $mercedes->id, 'ad' => 'S serisi']);

    \App\Models\StajProjesiModellerModel::create(['marka_id' => $peugeot->id, 'ad' => '3008']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $peugeot->id, 'ad' => '5008']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $peugeot->id, 'ad' => '2008']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $peugeot->id, 'ad' => '408']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $peugeot->id, 'ad' => '508']);

    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Renault->id, 'ad' => 'Austral']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Renault->id, 'ad' => 'Megane']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Renault->id, 'ad' => 'Duster']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Renault->id, 'ad' => 'Capture']);

    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Wolfswogen->id, 'ad' => 'Caddy']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Wolfswogen->id, 'ad' => 'Tiguan']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Wolfswogen->id, 'ad' => 'Golf']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Wolfswogen->id, 'ad' => 'Passat']);

    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Volvo->id, 'ad' => 'S60']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Volvo->id, 'ad' => 'V40']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Volvo->id, 'ad' => 'S90']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Volvo->id, 'ad' => 'XC40']);

    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Audi->id, 'ad' => 'A8']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Audi->id, 'ad' => 'A6']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Audi->id, 'ad' => 'A4']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Audi->id, 'ad' => 'A3']);

    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Opel->id, 'ad' => 'Corsa']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Opel->id, 'ad' => 'Astra']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Opel->id, 'ad' => 'Combo']);
    \App\Models\StajProjesiModellerModel::create(['marka_id' => $Opel->id, 'ad' => 'Grandland']);

    }
}
