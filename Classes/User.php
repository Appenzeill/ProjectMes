<?php
class user {
	private $_db,
			$_data,
			$_sessionName;

	public function __construct($user = null) {
		$this->_db = Database::getInstance();

		$this->_sessionName = Config::get('session/session_name');
	}

	public static function user() {
		return Session::put(Config::get('session/user_name'),'test');
	}

	public function create($fields) {
		if ( ! $this->_db->insert( 'users', $fields ) ) {
			throw new Exception( 'Er was een probleem bij het maken van het account.' );

		}
	}

	public function find($user = null) {
		if ($user) {
			$field = (is_numeric($user)) ? 'id' : 'email';
			$data = $this->_db->get('users',[$field, '=',$user]);

			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;

	}

	public function login($email = null, $password = null) {

		$user = $this->find($email);

		if ($user) {
			if($this->data()->password){

				Session::put($this->_sessionName, $this->data()->id);
				return true;
			}
		}
		return false;


	}
	private function data() {
		return $this->_data;
	}

	public function logout() {
		Session::delete($this->_sessionName);
	}

}



