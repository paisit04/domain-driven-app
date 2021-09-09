<?php
namespace App\Registration;

use App\Models\User;

/*
 * Low Cohesion Within a Class
 */
class RegisterUserBad
{
    protected $name;
    protected $username;
    protected $isAdmin = false;
    protected $isPremierMember = false;
    
    public function setName($name)
    {
        $this->name = $name;
    }

    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function makeAdmin()
    {
        $this->isAdmin = true;
    }
    
    public function getUserAttributes()
    {
        return [
                'name' => ucfirst($this->name),
                'username' => $this->username,
                'isAdmin' => $this->isAdmin == false ? "NO" : "YES",
                'isPremierMember' => $this->isPremierMember == false ?
                             "NO" : "YES"
            ];
    }
    public function registerUser()
    {
        $user = new User(
            $this->name,
            $this->username,
            $this->isAdmin,
            $this->isPremierMember
        );
        return $user;
    }
}

/*
$params = [`name` => `Jesse`, `username` => `debdubstep`];

$userRegister = new RegisterUserBad();
$userRegister->setName($params[`name`]);
$userRegister->setUsername($params[`username`]);
$user = $userRegister->registerUser();
$user->save();
*/
