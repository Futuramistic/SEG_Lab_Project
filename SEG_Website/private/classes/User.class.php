<?php
class User extends DatabaseObject{
  static protected $db_columns = ['userID','firstName','secondName','password','fees','email','user_name','admin','administration','banned'];
  static protected $table_name = "User";
  static protected $idName = "userID";
  protected function validate()
  {
    $this->errors=[];
    if(is_blank($this->firstName)){
      $this->errors[]= "First name cannot be blank!";
    }
    elseif(!has_length($this->firstName,['min' => 4, 'max' => 50])){
      $this->errors[]="First name must be between 4 and 50 characters!";
    }
    //Second Name
    if(is_blank($this->secondName)){
      $this->errors[]= "Second name cannot be blank!";
    }
    elseif(!has_length($this->secondName,['min' => 4, 'max' => 50])){
      $this->errors[]="Second name must be between 4 and 50 characters!";
    }

    //Email
    if(is_blank($this->email)){
      $this->errors[]= "Email cannot be blank!";
    }
    elseif(!has_valid_email_format($this->email)){
      $this->errors[]="Email should have an email format!";
    }
    //UserName
    $userFound = User::find_by_username($this->user_name);
    if($this->insert)
    {
      //produce artificial id
      $lastUser = User::find_last_user();
      $user['userID'] = $lastUser->userID+1;
    }
    if($userFound && $userFound->userID!=$this->userID)
    {
      $this->errors[]="User already exists!";
    }
    if(is_blank($this->user_name)){
      $this->errors[]= "Username cannot be blank!";
    }
    elseif(!has_length($this->user_name,['min' => 4, 'max' => 50])){
      $this->errors[]="Username must be between 4 and 50 characters!";
    }

    if($this->fees<0)
    {
      $this->errors[]="Fees must be positive!";
    }
    //Password
    if($this->password_required)
    {
      if($this->password1==NULL||$this->password2==NULL)
      {
        $this->errors[]="Both password and confirm password cannot be blank!";
      }
      else
      {
        if($this->password1!=$this->password2)
        {
          $this->errors[]="Password does not match!";
        }
        if(!has_length_greater_than($this->bare_password,4))
        {
          $this->errors[]="Password is too short! Password should have at least 5 characters.";
        }
      }
    }

    //Admin, Administration, Banned
      $admin_str = (string) $this->admin;
      if(!has_inclusion_of($admin_str, ["0","1"])) {
          $this->errors[] = "Admin must be true or false.";
      }
      $administration_str = (string) $this->administration;
      if(!has_inclusion_of($administration_str, ["0","1"])) {
          $this->errors[] = "Administration must be true or false.";
      }
      $banned_str = (string) $this->banned;
      if(!has_inclusion_of($banned_str, ["0","1"])) {
          $this->errors[] = "Banned must be true or false.";
      }
    return $this->errors;
  }
  static public function find_by_id($id)
  {
    $sql = "SELECT * FROM User ";
    $sql .= "WHERE userID = '" . self::$database->escape_string($id) . "'";
    $sql .= " LIMIT 1;";
    return self::find_single_by($sql);
  }
  static public function find_all_banned()
  {
    $sql  = "SELECT * FROM User ";
    $sql .= "WHERE banned=1 ";
    $sql .= "ORDER BY userID";
    $sql.=";";
    return self::find_by_sql($sql);
  }
  static public function find_last_user()
  {
    $sql = "SELECT * ";
    $sql .= "FROM User ";
    $sql .= "WHERE UserID = (SELECT MAX(UserID) FROM User)";
    return self::find_single_by($sql);
  }
  static public function find_by_username($user_name)
  {
    $sql = "SELECT * FROM User ";
    $sql .= "WHERE user_name = '" . self::$database->escape_string($user_name) . "'";
    $sql .= " LIMIT 1";
    return self::find_single_by($sql);
  }
  static public function find_all()
  {
      $sql = "SELECT * FROM User ";
      $sql .= "ORDER BY userID";
      $sql.=";";
      return self::find_by_sql($sql);
  }
  static public function outstanding_fees()
  {
    $sql  = "SELECT * FROM User ";
    $sql .= "WHERE fees>0 ";
    $sql .= "ORDER BY userID";
    $sql.=";";
    return self::find_by_sql($sql);
  }
  public static function find_bannable_behaviour()
  {
    $sql = "SELECT U.user_name, count(*) as overdue From Renting as R Join User as U On R.userid=U.userID ";
    $sql .= "WHERE (returnDate>dueDate OR (returnDate Is NULL AND CURRENT_TIMESTAMP>dueDate)) ";
    $sql .= "And Date_Add(CURRENT_TIMESTAMP, Interval -1 Year)<rentDate ";
    $sql .= "And U.banned=0 ";
    $sql .= "Group By R.userid;";
    return self::find_by_sql($sql);
  }
  public static function dump_admin()
  {
    $sql = "UPDATE User";
    $sql .= " SET";
    $sql .= " admin='0'";
    $sql .= " WHERE admin='1'";
    $sql .= " LIMIT 1";
    $sql .= ";";
    $result = self::$database->query($sql);
    return $result;
  }
  public function update()
  {
    if($this->bare_password != '') {
      $this->set_hashed_password();
    } else {
      $this->password_required = false;
    }
    return parent::update();
  }
  public function unban()
  {
    $sql  = "UPDATE User ";
    $sql .= "SET banned=0, ";
    $sql .= "banDate = NULL ";
    $sql .= "Where userID='".self::$database->escape_string($this->userID)."' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }
  public function ban()
  {
    $sql  = "UPDATE User ";
    $sql .= "SET banned=1, ";
    $sql .= "banDate = CURRENT_TIMESTAMP ";
    $sql .= "Where userID='".self::$database->escape_string($this->userID)."' ";
    $sql .= "LIMIT 1";
    $result = self::$database->query($sql);
    return $result;
  }
  public function create()
  {
    $this->set_hashed_password();
    return parent::create();
  }
  public function set_hashed_password()
  {
    $this->password = password_hash(self::$database->escape_string($this->bare_password),PASSWORD_DEFAULT);
  }
  public $userID;
  public $firstName;
  public $secondName;
  public $password=NULL;
  public $bare_password;
  public $email;
  public $user_name;
  public $fees;
  public $admin;
  public $administration;
  public $banned;
  public $banDate;
  public $overdue;
  public $password1;
  public $password2;
  public $password_required=true;
  public function __construct($args=[]) {
    $this->userID = $args['userID']??'';
    $this->firstName = $args['firstName']??'';
    $this->secondName = $args['secondName']??'';
    $this->password = $args['password']??'';
    $this->email = $args['email']??'';
    $this->user_name = $args['user_name']??'';
    $this->fees = $args['fees']??'0.00';
    $this->admin = $args['admin']??'0';
    $this->administration = $args['banned']??'0';
    $this->banned = $args['administration']??'0';
    $this->banDate = $args['banDate']??NULL;
    $this->password1= $args['password1']??"";
    $this->password2= $args['password2']??"";
    $this->bare_password= $args['bare_password']??"";
    $this->insert = $args['insert']??false;

  }

  public function display($file)
  {
    echo('<form action="'.$file.$this->userID.'" method="post">');
    echo('<table class="center output" style="text-align: center;">');
    echo('<tr><th>First Name</th><td><input  class ="searchForm" type="text" placeholder="First Name" name="firstName" value="'.$this->firstName.'"/></td></tr>');
    echo('<tr><th>Last Name</th><td><input  class ="searchForm" type="text" placeholder="Second Name" name="secondName" value="'.$this->secondName.'"/></td></tr>');
    echo('<tr><th>E-mail</th><td><input  class ="searchForm" type="text" placeholder="E-Mail" name="email" value="'.$this->email.'"/></td></tr>');
    echo('<tr><th>User Name</th><td><input  class ="searchForm" type="text" placeholder="User Name" name="user_name" value="'.$this->user_name.'"/></td></tr>');
    echo('<tr><th>Fees</th><td><input  class ="searchForm" type="text" placeholder="Fees" name="fees" value="'.$this->fees.'"/></td></tr>');
    echo('<tr><th>Password</th><td><input  class ="searchForm" type="password" placeholder="Password" name="password1"/></td></tr>');
    echo('<tr><th>Confirm Password</th><td><input  class ="searchForm" type="password" placeholder="Password" name="password2"/></td></tr>');
    if(isset($_SESSION['admin'])&&$_SESSION['admin']=="1")
    {echo('<input type="hidden" name="option" value="0"/>');
    echo('<tr><th>Admin</th><td><input type="hidden" name="admin" value="0"/><input type="checkbox" name="admin" value="1"');
    if($this->admin==1){echo ("checked");}
    echo('/></td></tr>');
    echo('<tr><th>Administration</th><td><input type="hidden" name="administration" value="0"/><input type="checkbox" name="administration"');
    if($this->administration==1){echo ("checked");}
    echo('value="1"/></td></tr>');
    echo('<tr><th>Banned</th><td><input type="hidden" name="banned" value="0"/><input type="checkbox" name="banned"value="1"');
    if($this->banned==1){echo ("checked");}
    echo('/></td></tr>');
    }
    echo('<tr><th></th><td><button type="submit" name="userID" value="'.$this->userID.'">Submit</button></td></tr>');
    echo('</table>');
    echo('</form>');
  }
}
?>
