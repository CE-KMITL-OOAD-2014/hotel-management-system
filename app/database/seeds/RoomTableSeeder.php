<?php
class RoomTableSeeder extends Seeder {

    public function run()
    {
        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing users are deleted !!!
        DB::table('rooms')->delete();

        // add user using Eloquent
        $room = new Room;
        $room->roomnumber = '101a';
        $room->price = '101';
        $room->detail = '101a';
        $room->save();
        $room->hotels()->attach(1);
        
        $room = new Room;
        $room->roomnumber = '101b';
        $room->price = '101';
        $room->detail = '101b';
        $room->save();
        $room->hotels()->attach(1);

        $room = new Room;
        $room->roomnumber = '101c';
        $room->price = '101';
        $room->detail = '101c';
        $room->save();
        $room->hotels()->attach(1);

        $room = new Room;
        $room->roomnumber = '102a';
        $room->price = '102';
        $room->detail = '102a';
        $room->save();
        $room->hotels()->attach(2);
        
        $room = new Room;
        $room->roomnumber = '102b';
        $room->price = '102';
        $room->detail = '102b';
        $room->save();
        $room->hotels()->attach(2);

        $room = new Room;
        $room->roomnumber = '102c';
        $room->price = '102';
        $room->detail = '102c';
        $room->save();
        $room->hotels()->attach(2);

    }
}