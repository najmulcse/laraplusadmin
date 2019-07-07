<?php

use App\Models\Location;
use App\Models\Merchant;
use App\Models\MerchantType;
use App\Models\Responsibility;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager_role = Role::where('name', 'Role')->first();

        $merchant = new Merchant();
        $responsibility = Responsibility::findOrFail(1);
        $merchant->mtype_id = 1;
        $merchant->name = "Bestweby";
        $merchant->website = "www.bestweby.com";
        $merchant->contact_person = "Md Zahurul Islam";
        $merchant->designation = "Project Lead";
        $merchant->mobile_no = "01717165841";
        $merchant->alternative_contact_no = "01962424119";        
        $merchant->email = "zahurul@bestweby.com";
        $merchant->save();
// user 1
        $manager = new User();
        $manager->merchant_id = $merchant->id;
        $manager->name = 'Md Zahurul Islam';
        $manager->location_id = 1;
        $manager->mobile_no = "01717165841";
        $manager->alternative_contact_no = "01962424119";
        $manager->email = "zahurul@bestweby.com";
        $manager->password = bcrypt('secret');

        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_role->permissions);
        $manager->responsibilities()->attach($responsibility);
// user 2
        $developer = new User();
        $developer->name = 'Najmul Ahmed';
        $developer->merchant_id = $merchant->id;
        $developer->mobile_no = '01571726301';
        $developer->location_id = 1;
        $developer->employee_id = mt_rand(10000000, 99999999);
        $developer->email = 'najmul2022@gmail.com';
        $developer->password = bcrypt('secret');
        $developer->save();
        $developer->roles()->attach($manager_role);
        $developer->permissions()->attach($manager_role->permissions);

// location
        $location = new Location();
        $location->merchant_id = $merchant->id;
        $location->location_type_id = 1;
        $location->name = 'Mohammdapur';
        $location->phone_no = '0189234223';
        $location->district_id = 3;
        $location->thana_id = 12;
        $location->save();
// assign responsibility
        $developer->responsibilities()->attach($responsibility);



    }
}
