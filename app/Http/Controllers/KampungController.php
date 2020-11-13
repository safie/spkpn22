<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RefNegeri;
use App\Models\RefKawalSelia;
use App\Models\RefParlimen;
use App\Models\Kampung;

class KampungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('kampung.index');
    }

    public function cari(Request $request){

        // $allkampung =DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        //                 ->leftJoin('t_ref_negeri','t_kampung.kam_idnegeri','=','t_ref_negeri.neg_idnegeri')
        //                 ->leftJoin('t_ref_daerah','t_kampung.kam_iddaerah','=','t_ref_daerah.dae_iddaerah')
        //                 ->leftJoin('t_ref_mukim','t_kampung.kam_idmukim','=','t_ref_mukim.muk_idmukim')
        //                 ->leftJoin('t_ref_kawal_selia','t_kampung.kam_idkawal_selia','=','t_ref_kawal_selia.kws_idkawal_selia')
        //                 ->leftJoin('t_ref_agensi_penyelaras','t_kampung.kam_idagensi_penyelaras','=','t_ref_agensi_penyelaras.lar_idagensi_penyelaras')
        //                 ->leftJoin('t_ref_parlimen','t_kampung.kam_idparlimen','=','t_ref_parlimen.par_kodparlimen')
        //                 ->leftJoin('t_ref_dun','t_kampung.kam_iddun','=','t_ref_dun.dun_koddun');

        $allkampung = Kampung::aktif()
                        //->with('agensi')->with('kawalSelia')
                        ->orderBy('kam_created_date','DESC');

        //--dropdown negeri--//
        // $negeri = DB::connection('mysql2')->table('t_ref_negeri')->get();
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        // $agensikawalselia = DB::connection('mysql2')->table('t_ref_kawal_selia')->get();
        $agensikawalselia = RefKawalSelia::all();

        //--dropdown parlimen--//
        // $parlimen = DB::connection('mysql2')->table('t_ref_parlimen')->orderBy('par_kodparlimen','ASC')->get();
        $parlimen = RefParlimen::orderBy('par_kodparlimen','ASC')->get();

        //--set input-text dgn variable--//
        $namakg = $request->input('kam_nama_kampung');
        $negerikg = $request->input('kam_idnegeri');
        $daerahkg = $request->input('kam_iddaerah');
        $mukimkg = $request->input('kam_idmukim');
        $kawalseliakg = $request->input('kam_idkawal_selia');
        $penyelaraskg = $request->input('kam_idagensi_penyelaras');
        $parlimenkg = $request->input('kam_idparlimen');
        $dunkg = $request->input('kam_iddun');
        $query = $allkampung;

        //--check ada input?--//
		if (!empty($namakg)){
			$query->where('kam_nama_kampung','like','%'.$namakg.'%');
		}
		if (!empty($negerikg)){
			$query->Where('kam_idnegeri','like',$negerikg);
		}
		if (!empty($daerahkg)){
			$query->Where('kam_iddaerah','like',$daerahkg);
		}
		if (!empty($mukimkg)){
			$query->Where('kam_idmukim','like',$mukimkg);
		}
		if (!empty($kawalseliakg)){
			$query->Where('kam_idkawal_selia','like',$kawalseliakg);
		}
		if (!empty($penyelaraskg)){
			$query->Where('kam_idagensi_penyelaras','like',$penyelaraskg);
		}
		if (!empty($parlimenkg)){
			$query->Where('kam_idparlimen','like',$parlimenkg);
		}
		if (!empty($dunkg)){
			$query->Where('kam_iddun','like',$dunkg);
        }

		//$query->orderBY('kam_created_date','DESC');
		$carian = $query->paginate(10);
		$kira_kg = $query->count();

        //dd($carian);
        // mengirim data pegawai ke view index
        return view('kampung.cari',compact('negeri','agensikawalselia','parlimen','carian','kira_kg'))->with('no',1);

    }

    //guna js untuk dropdown dependent
    public function daerahbyidnegeri($id){
        $daerah = DB::connection('mysql2')->table('t_ref_daerah')
                    ->where('dae_idnegeri',$id)->get();
        return response()->json($daerah);
    }

    //guna js untuk dropdown dependent
    public function mukimbyiddaerah($id){
        $mukim = DB::connection('mysql2')->table('t_ref_mukim')
                    ->where('muk_iddaerah',$id)->get();
        return response()->json($mukim);
    }

    //guna js untuk dropdown dependent
    public function agensipenyelaras($id){
        $agensipenyelaras = DB::connection('mysql2')->table('t_ref_agensi_penyelaras')
                    ->where('lar_idkawal_selia',$id)->get();
        return response()->json($agensipenyelaras);
    }

    //guna js untuk dropdown dependent
    public function dun($id){
        $dun = DB::connection('mysql2')->table('t_ref_dun')
                    ->where('dun_kodparlimen',$id)->orderBY('dun_koddun','ASC')->get();
        return response()->json($dun);
    }
}
