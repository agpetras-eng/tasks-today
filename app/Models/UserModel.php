<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['username', 'full_name', 'email', 'created_at'];

    // There is only one demo user, so get the first row
    public function getDemoUser()
    {
        return $this->first();
    }
}
