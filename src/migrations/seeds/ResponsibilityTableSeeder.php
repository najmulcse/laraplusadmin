<?php

use App\Models\MerchantType;
use App\Models\Responsibility;
use Illuminate\Database\Seeder;

class ResponsibilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responsibility = new Responsibility();
        $responsibility->name = "Super Admin";
        $responsibility->save();
        $mType = MerchantType::find(1);
        $mType->responsibilities()->attach($responsibility);
    }
}
