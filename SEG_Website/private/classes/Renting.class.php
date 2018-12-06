<?php
class Renting extends DatabaseObject
{
  static protected $db_columns = ['id','rentDate','dueDate','extentions','userid','gameid'];
  static protected $table_name = "Renting";
  static protected $idName = "id";
  public function create()
  {
    $userFound = User::find_by_username($this->user_name);
    $this->userid = $userFound->userID??NULL;
    $result = parent::create();
    $this->rent_game();
    return $result;
  }
  public function validate()
  {
    $this->errors = [];
    $user = User::find_by_id($this->userid);
    if($user===false)
    {
      $this->errors[]="No user found with this username";
    }
    else
    {
      $rents =  Renting::find_current_rentings_by_userid($this->userid);
      if(count($rents)>=2)
      {
        $this->errors[]="Too many games rented at the time!";
      }
      if($user->banned==1)
      {
        $this->errors[]="User cannot rent games. User is currently banned";
      }
      if($user->fees>0)
      {
        $this->errors[]="Cannot rent game. Outstanding fees.";
      }
    }

    $game = Game::find_by_id($this->gameid);
    if($game===false)
    {
      $this->errors[]="Game not found.";
    }
    else{
      if($game->rented=="1")
      {
        $this->errors[]="Game is currently rented.";
      }
    }

    return $this->errors;
  }
  public function charge_user()
  {
    $this -> return_renting();
    $game = Game::find_by_id($this->gameid);
    $sql = "UPDATE User ";
    $sql .= " SET fees=fees + ".self::$database->escape_string($game->price);
    $sql .= " WHERE userID ='". self::$database->escape_string($this->userid)."'";
    $result = self::$database->query($sql);
    return $result;
  }
  public function return_game()
  {
    $sql = "UPDATE Game ";
    $sql .= "SET rented='0' ";
    $sql .= "WHERE id='".self::$database->escape_string($this->gameid)."' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }
  public function rent_game()
  {
    $sql = "UPDATE Game ";
    $sql .= "SET rented='1' ";
    $sql .= "WHERE id='".self::$database->escape_string($this->gameid)."' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }
  public static function find_current_rentings_by_userid($user)
  {
      $sql = "SELECT r.* , u.userID, u.user_name, g.name, g.id as gameid";
      $sql .=" FROM Game as g Join Renting as r On g.id = r.gameid Join User as u On u.userID = r.userid";
      $sql .=" WHERE g.id=r.gameid AND u.userID = r.userid AND r.returnDate IS NULL AND u.userID=".$user;
      return self::find_by_sql($sql);
  }
  public static function find_all_unreturned()
  {
    $sql = "SELECT r.* , u.userID, u.user_name, g.name, g.id as gameid";
    $sql .=" FROM Game as g Join Renting as r On g.id = r.gameid Join User as u On u.userID = r.userid";
    $sql .=" WHERE g.id=r.gameid AND u.userID = r.userid AND r.returnDate IS NULL";
    return self::find_by_sql($sql);
  }
  public static function find_all()
  {
    $sql = "SELECT r.* , u.userID, u.user_name, g.name, g.id as gameid";
    $sql .=" FROM Game as g Join Renting as r On g.id = r.gameid Join User as u On u.userID = r.userid";
    $sql .=" WHERE g.id=r.gameid AND u.userID = r.userid";
    return self::find_by_sql($sql);
  }
  public function return_renting()
  {
    echo($this->gameid);
    $this->return_game();
    $sql = "UPDATE Renting ";
    $sql .= "SET returnDate='".date("Y-m-d H:i:s")."'";
    $sql .= " WHERE id='".self::$database->escape_string($this->id)."'";
    $sql .= " LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }
  public function extend_renting()
  {
    $sql = "UPDATE Renting ";
    $sql .= "SET dueDate=DATE_ADD(duedate, INTERVAL 7 DAY), ";
    $sql .= "extentions=extentions+1 ";
    $sql .= "WHERE id='".self::$database->escape_string($this->id)."'";
    $sql .= " LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }
  public function find_by_id($id)
  {
      $sql = "SELECT r.* , u.userID, u.user_name, g.name, g.id as gameid";
      $sql .=" FROM Game as g Join Renting as r On g.id = r.gameid Join User as u On u.userID = r.userid";
      $sql .=" WHERE g.id=r.gameid AND u.userID = r.userid AND r.id='".self::$database->escape_string($id). "'";
      $sql .=" LIMIT 1";
      return self::find_single_by($sql);
  }
  public $id;
  public $rentDate;
  public $dueDate;
  public $returnDate;
  public $extentions;
  public $userid;
  public $gameid;
  public $user_name;
  public $name;
  public function __construct($args=[]) {
    $this->id = $args['id']??'';
    $this->rentDate = $args['rentDate']??date_create(date("Y-m-d H:i:s"))->format("Y-m-d H:i:s");
    $this->dueDate = $args['dueDate']??date_create(date("Y-m-d H:i:s"))->add(new DateInterval('P27D'))->format("Y-m-d H:i:s");
    $this->returnDate = $args['returnDate']??NULL;
    $this->extentions = $args['extentions']??'0';
    $this->userid = $args['userid']??'';
    $this->gameid = $args['gameid']??'';
    $this->user_name = $args['user_name']??"";
    $this->name = $args['name']??"";
  }
}
?>
