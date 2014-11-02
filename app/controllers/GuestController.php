    <?php

class GuestController extends BaseController {

    public function showGuest()
    {

        return View::make('guest.guest');
    }


    public function showCreateGuest($id)
    {
        return View::make('guest.create_guest',array('hotel_id'=>$id));

    }
 

    public function postCreateGuest($id)
        {
                    $userdata = array(
            'gender' => Input::get('gender'),
            'nationality'=> Input::get('nationality'),
            'name' => Input::get('name'),
            'lastname' => Input::get('lastname'),
            'dateOfBirth' => Input::get('dateOfBirth'),
            'address' => Input::get('address'),
            'tel' => Input::get('tel'),
            'passportNo'=> Input::get('passportNo'),
            'citizenCardNo'=>Input::get('citizenCardNo'),
        );
                    $rules = array(
            'gender'=>'Required',
            'nationality'=>'Required',
            'name' => 'Required',
            'lastname' =>'Required',
            'dateOfBirth'=>'Required',
            'address' =>  'Required',
            'tel' =>  'Required',
            'passportNo' => 'Required',
            'citizenCardNo' => 'Required',
         
        );
        $validator = Validator::make($userdata, $rules);
        if ($validator->passes())
        {
            // Create guest in database
            $new_guest =  guest::create($userdata);
        
            //Attatch new guest to hotel
            $hotel = hotel::find($id);
            $hotel->guests()->attach($new_guest);

            // Redirect to home with success message
            return Redirect::to('guest')->with('success', 'You have successfully create guest');
        }
        else
        // Something went wrong.
        return Redirect::to('create_guest/'.$id)->withErrors($validator)->withInput(Input::except('fail'));
        }

}
