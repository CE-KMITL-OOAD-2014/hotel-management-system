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
        $hotel->tel = '000888';
        $hotel->save();
        $hotel->users()->attach(1);

        $hotel = new Hotel;
        $hotel->name = 'Rungprasert_hotel';
        $hotel->address = 'DarkHole';
        $hotel->tel = '0008889';
        $hotel->save();
        $hotel->users()->attach(2);
        
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