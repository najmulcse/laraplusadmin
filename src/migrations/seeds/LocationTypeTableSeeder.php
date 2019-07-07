<?php


use App\Models\LocationType;
use App\User;
use Illuminate\Database\Seeder;

class LocationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locationType = new LocationType();
        $locationType->type_name = "Primary";
        $locationType->created_by = 1;
        $locationType->save();
    }
}
