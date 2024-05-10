<?php 


class Db_object {

    

    //**** Find All ****\\
	public static function find_all(){

    return static::find_by_query("SELECT * FROM ".static::$db_table."");
    
	}//**** Find All End ****\\
    
    //**** Find id ****\\
	public static function find_by_id($id){

    $the_result_array = static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id = $id LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;

	} // Find id End
	
	public static function find_by_query($sql){

    global $database;
    $result_set = $database->query($sql);
    $the_object_array = array();

    while ($row = mysqli_fetch_array($result_set)) {
    $the_object_array[] = static::instantation($row);

    }    

    return $the_object_array;

	}


	public static function instantation($the_record){

	$calling_class =  get_called_class();	

	$the_object = new $calling_class;

	// $the_object->id  = $found_user['id'];

	foreach ($the_record as $the_attribute => $value) {
		
    if ($the_object->has_the_attribute($the_attribute)) {
    	
    $the_object->$the_attribute = $value;

    }

	}
  
    return $the_object;

	}


	private function has_the_attribute($the_attribute){

    $object_property = get_object_vars($this);
    return array_key_exists($the_attribute, $object_property);

	}


    // Get propertios 
    protected function properties(){

    // return get_object_vars($this);

    $properties = array();	

    foreach (static::$db_table_fields as $db_field) {
    	
    if(property_exists($this, $db_field)){

    $properties[$db_field] = $this->$db_field;
    	
    }

    }

    return $properties;

    } 

    //*** Update & Create method
    public function save(){

    return isset($this->id) ? $this->update() : $this->create(); 

    }  //*** Update & Create method End

    protected function clean_properties(){
    global $database;

    $clean_properties = array();

    foreach ($this->properties() as $key => $value) {
    	
    $clean_properties[$key] = $database->escape_string($value);

    }
    
    return $clean_properties;

    }



	//*** Create Method Start
	public function create(){

	$properties = $this->clean_properties();	

	global $database;
	$sql = "INSERT INTO ".static::$db_table."(" . implode(",", array_keys($properties)) .") ";
	$sql .= "VALUES('". implode("', '", array_values($properties)) ."') ";

	if ($database->query($sql)) {
	$this->id = $database->the_insert_id();
	//  mysqli_insert_id($database->connection);
	return true;

	}else{

	return false;

	}



	} //*** Create Method End


	// Update Method Start
	public function update(){

    $properties = $this->clean_properties();

    $properties_pairs = array();

    foreach ($properties as $key => $value) {
    	
    $properties_pairs[] = "{$key}='{$value}'";

    }

	global $database;

	$sql = "UPDATE ".static::$db_table." SET ";
	$sql .= implode(",", $properties_pairs);
	$sql .=" WHERE id= ".$database->escape_string($this->id);
	$database->query($sql);
	return (mysqli_affected_rows($database->connection) == 1) ? true : false;


	} // Update Method End


		public static function count_all() {

			global $database;

			$sql = "SELECT COUNT(*) FROM " . static::$db_table;
			$result_set = $database->query($sql);
			$row = mysqli_fetch_array($result_set);

			return array_shift($row);


		}



	// Delete Method Start
	public function delete(){

	global $database;
	$sql = "DELETE FROM ".static::$db_table." WHERE id=".$database->escape_string($this->id)." LIMIT 1";
	$database->query($sql);
	return (mysqli_affected_rows($database->connection) == 1) ? true : false;

	} // Delete Method End






} // Class End
























 ?>