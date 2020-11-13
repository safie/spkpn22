<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampung extends Model
{
    use HasFactory;

    protected $connection = "mysql2";
    protected $table = "t_kampung";
    protected $primaryKey = 'kam_idkampung';

    public function scopeAktif($query)
    {
        return $query->where('kam_idstatus_kampung', '=', 1);
    }
    public function negeri()
    {
        return $this->hasOne('App\Models\RefNegeri', 'neg_idnegeri', 'kam_idnegeri');
    }
    public function daerah()
    {
        return $this->hasOne('App\Models\RefDaerah', 'dae_iddaerah', 'kam_iddaerah');
    }
    public function mukim()
    {
        return $this->hasOne('App\Models\RefMukim', 'muk_idmukim', 'kam_idmukim');
    }
    public function agensi()
    {
        return $this->hasOne('App\Models\RefAgensiPenyelaras','lar_idagensi_penyelaras','kam_idagensi_penyelaras');
    }
    public function kawalSelia()
    {
        return $this->hasOne('App\Models\RefKawalSelia', 'kws_idkawal_selia', 'kam_idkawal_selia');
    }
    public function parlimen()
    {
        return $this->hasOne('App\Models\RefParlimen', 'par_kodparlimen', 'kam_idparlimen');
    }
    public function dun()
    {
        return $this->hasOne('App\Models\RefDun', 'dun_koddun', 'kam_iddun');
    }
}


