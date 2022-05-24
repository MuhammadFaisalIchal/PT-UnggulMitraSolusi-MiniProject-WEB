<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_nota',
        'tgl',
        'kode_pelanggan',
        'subtotal',
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
