<?php
abstract class DatabaseObject{
  static protected $database;
  static protected $table_name;
  static protected $idName;
  public $errors;

  /**
  **Set database for this website
  **/
  static public function set_database($database)
  {
    self::$database=$database;
  }

  /**
  **Find records by provided SQL
  **/
  static public function find_by_sql($sql)
  {
    $result = self::$database->query($sql);
    if(!$result)
    {
      exit("Database query failed");
    }
    $object_array=[];
    while($record =$result -> fetch_assoc())
    {
      $object_array[]=static::instansiate($record);
    }
    $result->free();
    return $object_array;
  }

  /**
  **Pas properties to new object
  **/
  static protected function instansiate($record)
  {
    $object= new static;
    foreach($record as $property=>$value)
    {
      if(property_exists($object, $property))
      {
        $object->$property=$value;
      }
    }
    return $object;
  }

  /**
  **Find single record
  **/
  static protected function find_single_by($sql)
  {
    $obj_array =  self::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  /**
  **Delete record from database table
  **/
  public function delete()
  {
    $sql  = "DELETE FROM ".static::$table_name;
    $sql .= " WHERE ".static::$idName."='". self::$database->escape_string($this->{static::$idName})."'";
    $sql .= " LIMIT 1";
    $sql .= ";";
    $result = self::$database->query($sql);
    return $result;
  }

  /**
  **Create record in database table
  **/
  public function create()
  {
    $this->validate();
    if(!empty($this->errors)){
        return $this->errors;
    }
    $attributes = $this->sanitized();
    $sql = "INSERT INTO ".static::$table_name."(";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $result = self::$database->query($sql);
    if($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
  }

  /**
  **Add attributes to SQL
  **/
  public function attributes()
  {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == static::$idName) { continue; }
      $attributes[$column] = $this-> $column;
    }
    return $attributes;
  }

  /**
  **Ensure database safe content
  **/
  public function sanitized()
  {
    $sanitized = [];
    foreach($this->attributes() as $key => $value)
    {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  /**
  **Merge attributes into record
  **/
  public function merge_attributes($args=[])
  {
    foreach($args as $key => $value)
    {
      if(property_exists($this,$key) && !is_null($value) && $value!="")
      {
        $this->$key = $value;
      }
    }
  }

  /**
  **Update record in the database
  **/
  public function update()
  {
    $this->validate();
    if(!empty($this->errors)){
        return $this->errors;
    }
    $attributes=$this->sanitized();
    $attributes_pairs = [];
    foreach($attributes as $key => $value)
    {
      $attributes_pairs[]="$key='{$value}'";
    }
    $sql = "UPDATE ".static::$table_name;
    $sql .= " SET ";
    $sql .=   join(', ', $attributes_pairs);
    $sql .= " WHERE ".static::$idName."='" .self::$database->escape_string($this->{static::$idName})."'";
    $sql .= " LIMIT 1";
    $sql .= ";";
    echo($sql);
    $result = self::$database->query($sql);
    echo("\n");
    echo($result);
    return $result;
  }
}
?>
