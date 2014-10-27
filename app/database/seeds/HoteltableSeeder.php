<?php
class HotelTableSeeder extends Seeder {

    public function run()
    {
        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing users are deleted !!!
        DB::table('hotels')->delete();

        // add user using Eloquent
        $hotel = new Hotel;

        $hotel->name = 'Nathakit_hotel';
        $hotel->address = 'pegionHole';
        $hotel->tel = '000xxx888';
        $hotel->save();
        $hotel->user()->attach(2);

        $hotel = new Hotel;
        $hotel->name = 'Rungprasert_hotel';
        $hotel->address = 'DarkHole';
        $hotel->tel = '000xxx8889';
        $hotel->save();
        $hotel->user()->attach(3);
        
        // alternativ to eloquent we can also use direct database-methods
        /*
        User::create(array(
            'username'  => 'admin',
            'password'  => Hash::make('password'),
            'email'     => 'admin@localhost'
        ));
        */
    }
}