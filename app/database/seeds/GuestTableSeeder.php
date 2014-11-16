<?php
class GuestTableSeeder extends Seeder {

    public function run()
    {
        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing guest are deleted !!!
        DB::table('guests')->delete();

        // add user using Eloquent
        $guest = new Guest;
        $guest->gender = 'Male';
        $guest->nationality = 'Thai';
        $guest->name = 'guest_1';
        $guest->lastname = 'geust_1';
        $guest->dateOfBirth = '2014-11-09';
        $guest->address = 'guest_1';
        $guest->tel = '0123456789';
        $guest->passportNo = '111a1111';
        $guest->citizenCardNo = '1000000000001';
        $guest->save();
        $guest->hotels()->attach(1);

        $guest = new Guest;
        $guest->gender = 'Female';
        $guest->nationality = 'Thai';
        $guest->address = 'Thai';
        $guest->name = 'guest_2';
        $guest->lastname = 'guest_2';
        $guest->dateOfBirth = '2014-11-08';
        $guest->address = 'guest_2';
        $guest->tel = '9876543210';
        $guest->passportNo = '222b2222';
        $guest->citizenCardNo = '2000000000002';
        $guest->save();
        $guest->hotels()->attach(1);

        $guest = new Guest;
        $guest->gender = 'Male';
        $guest->nationality = 'Thai';
        $guest->name = 'guest_3';
        $guest->lastname = 'guest_3';
        $guest->dateOfBirth = '2014-11-09';
        $guest->address = 'guest_3';
        $guest->tel = '1234554321';
        $guest->passportNo = '333c3333';
        $guest->citizenCardNo = '3000000000003';
        $guest->save();
        $guest->hotels()->attach(2);

        $guest = new Guest;
        $guest->gender = 'Female';
        $guest->nationality = 'Thai';
        $guest->name = 'guest_4';
        $guest->lastname = 'guest_4';
        $guest->dateOfBirth = '2014-11-09';
        $guest->address = 'guest_4';
        $guest->tel = '5432112345';
        $guest->passportNo = '444d4444';
        $guest->citizenCardNo = '4000000000004';
        $guest->save();
        $guest->hotels()->attach(2);

    }
}