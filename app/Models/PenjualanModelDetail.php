<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModelDetail extends Model
{
    protected $table = 'penjualan_item';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_nota',
        'kode_barang',
        'qty',
    ];

    protected $useTimestamps = true;
}
