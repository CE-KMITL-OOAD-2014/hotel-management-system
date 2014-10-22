<?php

class AboutController extends BaseController {

	public function showAbout()
	{
		return View::make('about.About');
	}

}
