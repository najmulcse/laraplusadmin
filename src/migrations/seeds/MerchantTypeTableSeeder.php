<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 4/1/2019
 * Time: 9:10 PM
 */

use App\Models\MerchantType;
use Illuminate\Database\Seeder;

class MerchantTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchantType1 = new MerchantType();
        $merchantType1->title = "Administrator";
        $merchantType1->created_by = 1;
        $merchantType1->save();

        $merchantType2 = new MerchantType();
        $merchantType2->title = "Delivery";
        $merchantType1->created_by = 1;
        $merchantType2->save();
//
//        $merchantType3 = new MerchantType();
//        $merchantType3->title = "Shop";
//        $merchantType3->save();
    }
}
