<?php

use App\Subscription;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);
        // $this->call(DocumentsTableSeeder::class);
        factory(App\User::class, 10)->create()->each(function ($user) {
            $name = explode(" ", $user->name);
            $user->profile()->create(['first_name' => $name[0], 'last_name' => $name[1]]);

            $subscriber = new Subscription;
            $subscriber->subscribeToPlan(1, $user->id, 12);
        });

        DB::table('countries')->insert([
            'name' => 'Nigeria',
        ]);
        DB::table('countries')->insert([
            'name' => 'France',
        ]);
        DB::table('countries')->insert([
            'name' => 'Zambia',
        ]);
        DB::table('states')->insert([
            'name' => 'Lagos',
            'country_id' => 1
        ]);
        DB::table('states')->insert([
            'name' => 'Abia',
            'country_id' => 1
        ]);
        DB::table('states')->insert([
            'name' => 'Abuja',
            'country_id' => 1
        ]);
        DB::table('states')->insert([
            'name' => 'kogi',
            'country_id' => 1
        ]);
        DB::table('states')->insert([
            'name' => 'Bayelsa',
            'country_id' => 1
        ]);
        DB::table('states')->insert([
            'name' => 'Ebonyi',
            'country_id' => 1
        ]);
        DB::table('states')->insert([
            'name' => 'Taraba',
            'country_id' => 1
        ]);
        DB::table('states')->insert([
            'name' => 'Kano',
            'country_id' => 1
        ]);
        DB::table('currencies')->insert([
            'name' => 'US DOLLAR',
            'code' => 'USD',
            'symbol' => '$'
        ]);
        DB::table('currencies')->insert([
            'name' => 'NIGERIAN NAIRA',
            'code' => 'NGR',
            'symbol' => '₦'
        ]);
        DB::table('currencies')->insert([
            'name' => 'EURO',
            'code' => 'EUR',
            'symbol' => '€'
        ]);
        DB::table('currencies')->insert([
            'name' => 'POUNDS',
            'code' => 'GBP',
            'symbol' => '£ '
        ]);
    }

}
