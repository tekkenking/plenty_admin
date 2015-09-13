<?php namespace App\Libs\Repos\User;

Interface UserInterface
{
	public function boot();

	public function register($userinfo, $confirmuser);

	public function getMyStore();
}