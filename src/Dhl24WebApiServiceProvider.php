<?php

namespace Codervel\Dhl24WebApi;

use Illuminate\Support\ServiceProvider;


class Dhl24WebApiServiceProvider extends ServiceProvider
{

	public function boot(){

		$this->publishes([__DIR__ . "/config/dhl.php" => config_path('dhl.php')]);

	}


	public function register(){


	}


}