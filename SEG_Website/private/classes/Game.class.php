<?php
class Game extends DatabaseObject
{
  static protected $db_columns = ['id','image','review','name','platform','format','developer','PEGI','price','year','rented'];
  static protected $table_name = "Game";
  static protected $idName = "id";
  public function find_specific()
  {
      $sql = "SELECT * FROM Game ";
      $sql .= "WHERE 1=1";
      if(is_present($this->name))
      {
        $sql .= " AND name LIKE  '" . self::$database->escape_string($this->name) . "%'";
      }
      if(is_present($this->developer))
      {
        $sql .= " AND developer = '" . self::$database->escape_string($this->developer) . "'";
      }
      if(is_present($this->year))
      {
        $sql .= " AND year LIKE '%" .  self::$database->escape_string($this->year) . "%'";
      }
      if(is_present($this->platform))
      {
        $sql .= " AND platform = '" . self::$database->escape_string($this->platform). "'";
      }
      if(is_present($this->format))
      {
        $sql .= " AND format = '" . self::$database->escape_string($this->format) . "'";
      }
      if(is_present($this->PEGI))
      {
        $sql .= " AND PEGI = '" . self::$database->escape_string($this->PEGI) . "'";
      }
      if(is_present($this->maxprice))
      {
        $sql .= " AND price <= '" . self::$database->escape_string($this->maxprice) . "'";
      }
      if(is_present($this->minprice))
      {
        $sql .= " AND price >= '" . self::$database->escape_string($this->minprice) . "'";
      }
      $sql.=" ORDER BY name";
      $sql.=";";
      return self::find_by_sql($sql);
  }
  public static function find_all()
  {
    $sql = "SELECT * FROM Game ";
    $sql .= "ORDER BY id";
    $sql.=";";
    return self::find_by_sql($sql);
  }
  public static function find_by_id($id)
  {
    $sql = "SELECT * FROM Game ";
    $sql .= "WHERE id = '".self::$database->escape_string($id)."'";
    $sql .= " LIMIT 1";
    return self::find_single_by($sql);
  }
  public static function find_all_fortmats()
  {
    $sql = "SELECT format FROM Game ";
    $sql .= "Group By format";
    $sql.=";";
    return self::find_by_sql($sql);
  }
  public static function find_all_PEGI()
  {
    $sql = "SELECT PEGI FROM Game ";
    $sql .= "Group By PEGI";
    $sql.=";";
    return self::find_by_sql($sql);
  }
  public static function find_all_platforms()
  {
    $sql = "SELECT platform FROM Game ";
    $sql .= "Group By platform";
    $sql.=";";
    return self::find_by_sql($sql);
  }
  public function validate()
  {
    $this->errors=[];
    //check name
    //Apparently there exists some games with one letter names
    //So we need to check if it's not empty
    if(is_blank($this->name)){
      $this->errors[]= "Name cannot be blank!";
    }

    //platform
    if(is_blank($this->platform)){
      $this->errors[]= "Platform cannot be blank!";
    }
    elseif(!has_length($this->platform,['min' => 2, 'max' => 50])){
      $this->errors[]="Platform must be between 2 and 50 characters!";
    }

    //format
    if(is_blank($this->format)){
      $this->errors[]= "Format cannot be blank!";
    }
    elseif(!has_length($this->format,['min' => 1, 'max' => 50])){
      $this->errors[]="Format must be between 1 and 50 characters!";
    }

    //developer
    if(is_blank($this->developer)){
      $this->errors[]= "Developer cannot be blank!";
    }
    elseif(!has_length($this->developer,['min' => 2, 'max' => 50])){
      $this->errors[]="Developer must be between 2 and 50 characters!";
    }

    //year
    if(is_blank($this->year))
    {
      $this->errors[]= "Year cannot be blank!";
    }
    else {
      $year_int = (int) $this->year;
      if($year_int>date("Y"))
      {
        $this->errors[]= "Year cannot be greater than the current year!";
      }
      if($year_int<1950)
      {
        $this->errors[]= "Year cannot be smaller than 1950";
      }
    }
    //Price
    if(is_blank($this->price))
    {
      $this->errors[]= "Price cannot be blank!";
    }
    else {
      $price_int = (int) $this->price;
      if($price_int>500)
      {
        $this->errors[]= "Price cannot be greater than 500!";
      }
      if($price_int<0)
      {
        $this->errors[]= "Price cannot be negative";
      }
      if($price_int==0)
      {
        $this->errors[]= "Price cannot be equal to zero";
      }
    }
    //Age
    if(is_blank($this->PEGI))
    {
      $this->errors[]= "Age cannot be blank!";
    }
    else {
      $age_int = (int) $this->PEGI;
      if($age_int>100)
      {
        $this->errors[]= "Age cannot be greater than 100!";
      }
      if($age_int<0)
      {
        $this->errors[]= "Age cannot be negative";
      }
      if($age_int==0)
      {
        $this->errors[]= "Age cannot be equal to zero";
      }
    }

    $rented_str = (string) $this->rented;
    if(!has_inclusion_of($rented_str, ["0","1"])) {
        $this->errors[] = "Rented must be true or false.";
    }

    return $this->errors;
  }
  public $id;
  public $image;
  public $review;
  public $name;
  public $platform;
  public $format;
  public $developer;
  public $PEGI;
  public $price;
  public $minprice;
  public $maxprice;
  public $year;
  public $rented;

  public function __construct($args=[]) {
    $this->id = $args['id']??'';
    $this->image = $args['image']??'';
    $this->review = $args['review']??'';
    $this->name = $args['name']??'';
    $this->platform = $args['platform']??'';
    $this->format = $args['format']??'';
    $this->developer = $args['developer']??'0.00';
    $this->PEGI = $args['PEGI']??'0';
    $this->price = $args['price']??'0';
    $this->year = $args['year']??'0';
    $this->rented = $args['rented']??'';
  }
}
?>
