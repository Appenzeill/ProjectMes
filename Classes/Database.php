<?php
class Database {
	private static $_instance = null;
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count = 0;

	// Is er een verbinding met de database.
	private function __construct() {
	try {
		$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'),Config::get('mysql/username'),Config::get('mysql/password'));
	} catch (PDOException $e) {
		die($e->getMessage());
		}
	}

	public static function getInstance() {
		if (!isset(self::$_instance)) {
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	public function query($sql, $params = []) {
		$this->_error = false;
		if ($this->_query = $this->_pdo->prepare($sql)) {
			$x = 1;
			if (count($params)) {
				foreach ($params as $param) {
					$this->_query->bindValue($x,$param);
					$x++;
				}
			}
			if ($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			} else {
				$this->_error = true;
			}
		}
		return $this;
	}

	public function action($action, $table, $where = []) {
		if (count($where) === 3) {
			$operators = ['=','>','<','>=','<='];

			$field      = $where[0];
			$operator   = $where[1];
			$value      = $where[2];

			if (in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

				if (!$this->query($sql, [$value])->error()) {
					return $this;
				}
			}
		}
		return false;
	}

	public function get($table, $where) {
		return $this->action('SELECT *',$table,$where);
	}

	public function join_permissions($table1, $row1, $table2, $row2, $id) {
		return $this->action('
				SELECT DISTINCT '.$table1.'.'.$row1.','.$table2.'.'.$row2.'
				FROM '.$table1.'
				INNER JOIN '.$table2.'
			    ON '.$table1.'.'.$row1.'='.$table2.'.'.$id.'; ');
	}


//	public function join_permissions() {
//		return $this->action('
//				SELECT DISTINCT user_permission_lists.user_permission_list_id, user_permission_lists_name.user_permission_list_name
//				FROM user_permission_lists
//				INNER JOIN user_permission_lists_name
//			    ON user_permission_lists.user_permission_list_id=user_permission_lists_name.id; ');
//	}

	public function  delete($table, $where) {
		return $this->action('DELETE * ',$table,$where);

	}

	public function results() {
		return $this->_results;
	}

	public function first() {
		return $this->results()[0];
	}

	public function insert($table, $fields = []) {
	if (count($fields)) {
		$keys = array_keys($fields);
		$values = '';
		$x = 1;

		foreach($fields as $field) {
			$values .='?';
			if ($x < count($fields)) {
				$values .= ', ';
			}
			$x++;
		}
		$sql = "INSERT INTO {$table} (`" . implode('`, `',$keys) ."`) VALUES ({$values})";

		if (!$this->query($sql,$fields)->error()) {
			return true;
		}
	}
	return false;
}

	public function create($table, $fields = []) {
		if (count($fields)) {
			$keys = array_keys($fields);
			$values = '';
			$x = 1;

			foreach($fields as $field) {
				$values .='?';
				if ($x < count($fields)) {
					$values .= ', ';
				}
				$x++;
			}

			$sql = "INSERT INTO {$table} (`" . implode('`, `',$keys) ."`) VALUES ({$values})";

			if (!$this->query($sql,$fields)->error()) {
				return true;
			}
		}
		return false;
	}

	public function update($table, $id, $fields) {
		$set = '';
		$x = 1;

		// set

		foreach($fields as $name => $value) {
			$set .= "{$name} = ?" ;
			if ($x < count($fields)) {
				$set .= ', ';
			}
			$x++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

		if ($this->query($sql, $fields)->error()) {
			return true;
		}
		return false;
	}

	public function error() {
		return $this->_error;
	}

	public function count() {
		return $this->_count;
	}
}