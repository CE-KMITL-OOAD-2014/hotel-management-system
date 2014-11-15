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
        $room->hotel_id = 1;
        $room->save();
        
        $room = new Room;
        $room->roomnumber = '101b';
        $room->price = '101';
        $room->detail = '101b';
        $room->hotel_id = 1;
        $room->save();

        $room = new Room;
        $room->roomnumber = '101c';
        $room->price = '101';
        $room->detail = '101c';
        $room->hotel_id = 1;
        $room->save();

        $room = new Room;
        $room->roomnumber = '102a';
        $room->price = '102';
        $room->detail = '102a';
        $room->hotel_id = 2;
        $room->save();
        
        $room = new Room;
        $room->roomnumber = '102b';
        $room->price = '102';
        $room->detail = '102b';
        $room->hotel_id = 2;
        $room->save();

        $room = new Room;
        $room->roomnumber = '102c';
        $room->price = '102';
        $room->detail = '102c';
        $room->hotel_id = 2;
        $room->save();

    }
}