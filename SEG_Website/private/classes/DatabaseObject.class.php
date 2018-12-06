<?php
abstract class DatabaseObject{
  static protected $database;
  static protected $table_name;
  static protected $idName;
  public $errors;
  static public function set_database($database)
  {
    self::$database=$database;
  }
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
  static protected function find_single_by($sql)
  {
    $obj_array =  self::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }
  public function delete()
  {
    $sql  = "DELETE FROM ".static::$table_name;
    $sql .= " WHERE ".static::$idName."='". self::$database->escape_string($this->{static::$idName})."'";
    $sql .= " LIMIT 1";
    $sql .= ";";
    $result = self::$database->query($sql);
    return $result;
  }
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
    echo($sql);
    $result = self::$database->query($sql);
    echo($result);
    if($result) {
      $this->id = self::$database->insert_id;
    }
    return $result;
  }
  public function attributes()
  {
    $attributes = [];
    foreach(static::$db_columns as $column) {
      if($column == static::$idName) { continue; }
      $attributes[$column] = $this-> $column;
    }
    return $attributes;
  }
  public function sanitized()
  {
    $sanitized = [];
    foreach($this->attributes() as $key => $value)
    {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }
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
    $result = self::$database->query($sql);
    return $result;
  }
}
?>
