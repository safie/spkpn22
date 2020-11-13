<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKawalSelia extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_ref_kawal_selia";
    protected $primaryKey = 'kws_idkawal_selia';

}
