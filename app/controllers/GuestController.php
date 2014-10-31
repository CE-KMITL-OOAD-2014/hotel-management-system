    <?php

class GuestController extends BaseController {

    public function showGuest()
    {

        return View::make('guest.guest')
         ->with ('guest',guest::all());
    }


    public function showCreateGuest()
    {
        return View::make('guest.create_guest');

    }
 

    public function postCreateGuest()
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
            'citizenCard'=>Input::get('citizenCard'),
        );
                    $rules = array(
            'gender'=>'Required',
            'nationality'=>'Required',
            'name' => 'Required',
            'lastname' =>'Required',
            'dateOfBirth'=>'Required',
            'address' =>  'Required',
            'tel' =>  'Required',
            'passportNO' => 'Required',
            'citizenCard' => 'Required',
         
        );
        $validator = Validator::make($userdata, $rules);
        if ($validator->passes())
        {
            // Create guest in database
            guest::create($userdata);

        
            //Attatch current user to newly created hotel
           /* $user = User::find(Auth::id());
            $hotel = DB::table('guests')->max('id');
            $user->hotels()->attach($hotel);*/

        


            // Redirect to home with success message
            return Redirect::to('myhotel')->with('success', 'You have successfully create guest');
        }
        else
        // Something went wrong.
        return Redirect::to('create_guest')->withErrors($validator)->withInput(Input::except('fail'));
        }

}
