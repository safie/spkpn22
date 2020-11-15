<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Models\RefNegeri;
use App\Models\RefKawalSelia;
use App\Models\RefParlimen;
use App\Models\Kampung;
use App\Models\PenggunaKampung;


class ModulAController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //--dropdown parlimen--//
        $parlimen = RefParlimen::orderBy('par_kodparlimen','ASC')->get();

        $pengguna = PenggunaKampung::leftJoin('t_kampung','t_kampung.kam_idkampung','=','t_pengguna_kampung.usk_idkampung')
                                    ->select('kam_idkampung','usk_idtahap_pengguna','kam_idnegeri','kam_iddaerah','kam_idmukim',
                                            'kam_idkawal_selia','kam_idagensi_penyelaras');
        $kampung = Kampung::aktif();

        //--set input-text dgn variable--//
        $negerikg = $request->input('kam_idnegeri');
        $daerahkg = $request->input('kam_iddaerah');
        $mukimkg = $request->input('kam_idmukim');
        $kawalseliakg = $request->input('kam_idkawal_selia');
        $penyelaraskg = $request->input('kam_idagensi_penyelaras');
        $parlimenkg = $request->input('kam_idparlimen');
        $dunkg = $request->input('kam_iddun');

        //--check ada input?--//
		if (!empty($negerikg)){
            $kampung->Where('kam_idnegeri','=',$negerikg);
            $pengguna->where('kam_idnegeri','=',$negerikg);
        }
		if (!empty($daerahkg)){
            $kampung->Where('kam_iddaerah','=',$daerahkg);
            $pengguna->Where('kam_iddaerah','=',$daerahkg);
		}
		if (!empty($mukimkg)){
            $kampung->Where('kam_idmukim','=',$mukimkg);
            $pengguna->Where('kam_idmukim','=',$mukimkg);
		}
		if (!empty($kawalseliakg)){
            $kampung->Where('kam_idkawal_selia','=',$kawalseliakg);
            $pengguna->Where('kam_idkawal_selia','=',$kawalseliakg);
		}
		if (!empty($penyelaraskg)){
            $kampung->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
            $pengguna->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
        }

        $kirakg = $kampung->count();

        $kiraketuakg = $pengguna->where('usk_idtahap_pengguna','=','KETUA_KOMUNITI')->count();

        $kirapengerak = $pengguna->where('usk_idtahap_pengguna','=','PENGGERAK')->count();

        $kirapenghulu = $pengguna->where('usk_idtahap_pengguna','=','PENGHULU_MUKIM')->count();

        //dd($query1);
        return view('modul_a.index', compact('negeri','agensikawalselia','kirakg','kirapenghulu','kiraketuakg','kirapengerak'));
    }

}
