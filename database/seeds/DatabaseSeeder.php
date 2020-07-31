<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $json = File::get("database/data/data.json");
        $data = json_decode($json);
        foreach($data as $obj) {
            User::create(array(
                'first_name' => $obj->first_name,
                'last_name' => $obj->last_name,
                'mobile' => $obj->mobile,
                'email' => (empty($obj->email) ? NULL : $obj->email),
                'postcode' => (empty($obj->postcode) ? NULL : $obj->postcode)
            ));
        }
    }
}
