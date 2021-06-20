<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = ["url_api" => $_ENV['URL_API']];

		return view('home_v', $data);
	}
}
