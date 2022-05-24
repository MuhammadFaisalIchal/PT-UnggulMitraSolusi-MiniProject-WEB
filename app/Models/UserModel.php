<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'jenis_kelamin',
        'domisili',
        'password'
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
