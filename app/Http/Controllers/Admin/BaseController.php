<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Larasset;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
	   $this->assets();
    }
	
	protected function assets()
	{
		Larasset::start()->vendor_dir = '/assets/';
		
		$css = [
			'bootstrap-3.3.5/css' 	=> [
				'bootstrap'		=>	'bootstrap.min.css',
				'dashboard'		=>	'dashboard.css'
			],
			
			'bucketcodes/css'		=> [
				'app'			=>	'app.css'
			],
			
			'font-awesome/css'		=> [
				'font-awesome'	=>	'font-awesome.css'
			]
		];
		
		$js = [
			'jquery'				=> [
				'jquery'		=>	'jquery.min.js'
			],
			
			'bucketcodes/js'		=> [
				'common'		=>	'common.js',
				'ajax-request'	=>	'ajax-request-lite.js',
				'validater'		=>	'validater.js',
				'ajax-refresh'	=>	'ajax-refresh.js',
				'deletethis'	=>	'deletethis.js',
				'ajaxtab'		=>	'ajaxtab.js',
				'freset'		=>	'freset.js'
			],
		
			'bootstrap-3.3.5/js' 	=> [
				'bootstrap'		=>	'bootstrap.min.js'
			],
			
			'bootbox-4.4.0'			=>	[
				'bootbox'		=>	'bootbox.min.js'
			],
			
			'bootstrap-growl'		=>	[
				'growl'			=>	'growl.min.js'
			]
		];
		
		
		Larasset::start('header')
					->storecss($css)
					->css('bootstrap', 'font-awesome', 'dashboard', 'app');

		Larasset::start()->storejs($js);

		Larasset::start('header')->js('jquery');

		Larasset::start('footer')->js('bootstrap', 'growl', 'common', 'validater', 'ajax-refresh', 'freset', 'ajax-request', 'bootbox', 'deletethis', 'ajaxtab');
		
	}

}
