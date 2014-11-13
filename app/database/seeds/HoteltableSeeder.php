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
        $hotel->name = 'Test101_1';
        $hotel->address = 'CE-Kmitl';
        $hotel->tel = '1011';
        $hotel->save();
        $hotel->users()->attach(1);

        $hotel = new Hotel;
        $hotel->name = 'Test101_2';
        $hotel->address = 'CE-Kmitl';
        $hotel->tel = '1012';
        $hotel->save();
        $hotel->users()->attach(1);

        $hotel = new Hotel;
        $hotel->name = 'Nathakit_hotel';
        $hotel->address = 'Muang Nakhonsawan';
        $hotel->tel = '000888';
        $hotel->save();
        $hotel->users()->attach(3);

        $hotel = new Hotel;
        $hotel->name = 'Rungprasert_hotel';
        $hotel->address = 'Pattaya Chonburi';
        $hotel->tel = '0008889';
        $hotel->save();
        $hotel->users()->attach(4);

    }
}