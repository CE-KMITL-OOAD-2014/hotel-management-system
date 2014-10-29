    <?php

class StaffController extends BaseController {

	public function showStaff()
	{

		return View::make('staff.staff')
        ->with ('hotels',hotel::all())
        ->with ('users',user::all());

         
	}


	public function showRequest()
	{
		return View::make('request.request');

	}

	

    

}
