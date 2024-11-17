<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    // Define the fields to be inserted in the database
    protected $allowedFields = [
        'username', 
        'email', 
        'password'
    ];    
    
    protected $useTimestamps = true;
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';


}
