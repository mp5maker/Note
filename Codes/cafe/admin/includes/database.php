<?php 
/**
 * Database
 */
class database{
	protected $db;
	protected $table;
	protected $result;

	/**
	 * Connects to the database 
	 */
	public function __construct(){
		$info = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/cafe/admin/includes/db.ini');
		$host = $info['host'];
		$user = $info['user'];
		$pass = $info['pass'];
		$name = $info['name'];
		try{
			$this->db = mysqli_connect($host, $user, $pass, $name);
		}catch(exception $e){
			echo "Error: {$e->message()}";
		}
	}

	/**
	 * Takes the table Name
	 * @param  string $table 
	 * @return null        
	 */
	public function table($table){
		$this->table = $table;
	}

	/**
	 * Insert into the table
	 * @param  array  $columns 
	 * @param  array  $values  
	 * @return null          
	 */
	public function insert($columns = array(), $values = array()){
		foreach ($values as &$value):
			$value = mysqli_real_escape_string($this->db, $value);
			$value = strip_tags($value);
			// if(stripos($value, "'")):
			// 	$value = str_replace("'", "\'", $value);
			// endif;
			$value = "'$value'";
		endforeach;

		$values = implode(',', $values);
		if(empty($columns)):
			$columns = '';
			$query =  "INSERT INTO $this->table VALUES ($values)";
		else:
			$columns = implode(',', $columns);
			$query =  "INSERT INTO {$this->table} ($columns) VALUES ($values)";
		endif;
		try{
			$this->result = mysqli_query($this->db, $query) or die('Query Denied');
		}catch(exception $e){
			echo "Error: {$e->message()}";
		}
	}

	/**
	 * Select data from the table
	 * @param  string $columns 
	 * @param  array  $where   
	 * @param  array  $options 
	 * @return null          
	 */
	public function select($columns, $where = array(), $options = array()){
		if(empty($where) && empty($options)):
			$columns = implode(",", $columns);
			$query = "SELECT $columns FROM {$this->table}";
			$this->result = mysqli_query($this->db, $query);
		elseif(empty($options)):
			$columns = implode(",", $columns);
			$where_clause = array();
			foreach($where as $k => $v):
				$where_clause[] = "$k = '$v'";
			endforeach; 
			$where = "WHERE ";
			$where .= implode(" AND ",$where_clause);
			$query = "SELECT $columns FROM {$this->table} $where";
			$this->result = mysqli_query($this->db, $query);
		elseif(!empty($where) && !empty($options)):
		endif;
	}

	/**
	 * Update data 
	 * @param  array $set   
	 * @param  array $where 
	 * @return null        
	 */
	public function update($set, $where){
		$set_clause = array();
		foreach($set as $key => $value):
			$value = mysqli_real_escape_string($this->db, $value);
			$value = strip_tags($value);
			// if(stripos($value, "'")):
			// 	$value = str_replace("'", "\'", $value);
			// endif;
			$set_clause[] = "$key = '$value'";
		endforeach;
		$set = "SET ";
		$set .= implode(", ", $set_clause);
		
		$where_clause = array();
		foreach($where as $key => $value):
			$where_clause[] = "$key = '{$value}'";
		endforeach;
		$where = "WHERE ";
		$where .= implode(" AND ", $where_clause);
		$query = "UPDATE {$this->table} $set $where";
		$this->result = mysqli_query($this->db, $query) or die ('Denied');
	}

	/**
	 * Delete Data using Id
	 * @param  int $id 
	 * @return null     
	 */
	public function delete($id){
		$query = "DELETE FROM {$this->table} WHERE id = '$id'";
		$this->result = mysqli_query($this->db, $query) or die('Denied');
	}

	/**
	 * Takes the raw query
	 * @param  string $query 
	 * @return null        
	 */
	public function query($query){
		$this->result = mysqli_query($this->db, $query);
	}
	/**
	 * Number of selected rows
	 * @return null
	 */
	public function num(){
		return mysqli_num_rows($this->result);
	}

	/**
	 * Convert Object into an array
	 * @return array
	 */
	public function fetch(){
		while($row = mysqli_fetch_array($this->result, MYSQLI_NUM)):
			$data[] = $row;
		endwhile; 
		return $data;
	}

	/**
	 * Count the affected rows
	 * @param  integer $quantity 
	 * @return boolean            
	 */
	public function affected(){
		if(mysqli_affected_rows($this->db) == 1):
			return true;
		endif;
	}

	/**
	 * Prints out the result
	 * @return array 
	 */
	public function result(){
		return $this->result;
	}

	/**
	 * Close the Connection
	 * @return null 
	 */
	public function close(){
		mysql_close($this->db);
	}
}

/**
 * Inserting Data (Admin Login)
 */
// require_once($_SERVER['DOCUMENT_ROOT']."/cafe/admin/includes/password.php");
// $db = new database();
// $db->table("admin");
// $pass = password_hash('photon1!', PASSWORD_DEFAULT);
// $db->insert(['email', 'pass'], ['khan.photon@gmail.com', $pass]);

/**
 * Inserting Data [All]
 */
// $db = new database();
// $db->table("test");
// $db->insert(['somecol', 'somecol2'], ['boom', 'vroom']);
// if($db->affected()):
// 	echo "Success";
// endif;

/**
 * Selecting Data [All]
 */
// $db = new database();
// $db->table("admin");
// $db->select(['*']);
// echo $db->num();
// $data = $db->fetch();
// echo "<pre>";
// print_r($data);
// echo "</pre>";

/**
 * Selecting Data [Where Clause]
 */
// $db = new database();
// $db->select(['*'],['email' => 'khan', 'pass' => 'bun']);
// echo $db->num();
// echo $db->num();
// $db->result();


/**
 * Updating Data 
 */
// $db = new database();
// $db->table("website");
// $db->update(["name" => "Boom's Cafe"],["id" => 1]);
// if($db->affected()):
// 	$website_message = 'Website Name Successfully Updated';
// 	echo $website_message;
// endif;;


