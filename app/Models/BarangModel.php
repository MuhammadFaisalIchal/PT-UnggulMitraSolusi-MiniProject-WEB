<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kode',
        'nama_barang',
        'kategori',
        'harga',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
