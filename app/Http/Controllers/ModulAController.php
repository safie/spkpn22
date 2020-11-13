<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ModulAController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $query = DB::connection('mysql2')->table('t_pengguna')
                ->leftJoin('t_pengguna_kampung','t_pengguna.usr_id','=','t_pengguna_kampung.usk_id');

        $kira = $query->count();

        $column = [
            'usr_kementerian_jabatan_bahagian',
            'usr_name',
            'usr_id',
            'usr_no_tel_pejabat',
            'usr_no_tel_bimbit',
            'usr_idpekerjaan',
            'usr_no_faks',
            'usr_alamat_surat',
            'usr_alamat_laman_web',
            'usr_alamat_blog',
            'usr_alamat_facebook',
            'usr_alamat_twitter',
            'usr_no_akaun',
            'usr_nama_bank',
            'usr_no_akaun'
        ];

        $kira_null = $query->whereNull('usr_no_faks')->count();

        return view('modul_a.index', compact('kira_null'));
    }
}
