<?php

class TwitterListedKPI extends KPIComponent {
	protected $credentials;
	public function setCredentialsObject ($credentials) {
		$this->credentials = $credentials;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function initialize () {
		$TwitterHelper = new TwitterHelper();
		$twitter = $TwitterHelper->authenticate($this->credentials);
		
		if (!$twitter->authenticate()) {
		    die('Invalid name or password');
		}

		$listed = $twitter->listed($this->username);
		$count = count($listed->lists);
		$this->setValue ($count);
	}
}

?>