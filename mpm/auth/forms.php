<?php
namespace Mpm\Auth;
use Mpm\Forms as forms;

class UserChangeForm extends forms\Form {
  public $username,$fullname,$mobile_number;

  public static $fields = ['username','fullname','mobile_number'];
  
  public function __construct(){
    $this->username = new forms\InputField("Username",lap:true);
    $this->fullname = new forms\InputField("Full Name",lap:true);
    $this->mobile_number= new forms\NumberField("Mobile Number",lap:true,max_length:15);
  }
}

class UserCreationForm extends forms\Form {
  public $username,$fullname,$password,$confirm_password,$mobile_number;
  
  public static $fields = ['username','fullname','password','mobile_number'];
  
  public function __construct(){
    $this->username = new forms\InputField("Username",lap:true);
    $this->fullname = new forms\InputField("Full Name",lap:true);
    $this->password = new forms\PasswordField("Password",lap:true);
    $this->confirm_password = new forms\PasswordField("Confirm Password",lap:true);
    $this->mobile_number= new forms\NumberField("Mobile Number",lap:true,max_length:15);
  }
}

class UserLoginForm extends forms\Form {
  public $username,$password;
  public function __construct(){
    $this->username = new forms\InputField("Username",lap:true);
    $this->password = new forms\PasswordField("Password",lap:true);
  }
}


class PasswordChangeForm extends forms\Form {
  public $old_password,$new_password,$confirm_new_password;
  public function __construct(){
    $this->old_password = new forms\PasswordField("Old Password",lap:true);
    $this->new_password = new forms\PasswordField("New Password",lap:true);
    $this->confirm_new_password = new forms\PasswordField("Confirm New Password",lap:true);
  }
}
