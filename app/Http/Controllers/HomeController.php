<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kampung;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allkampung =Kampung::where('kam_idstatus_kampung','1');

        $kampung = $allkampung->count();

        $agensi = $allkampung
                    ->distinct('kam_idagensi_penyelaras')
                    ->count();

        $negeri = $allkampung
                    ->distinct('kam_idnegeri')
                    ->count();



        $kawalselia = $allkampung
                    ->distinct('kam_idkawal_selia')
                    ->count();

        //dd($kawalselia_nama);

        //-- Carta Negeri ---//
        //1-Dapatkan jumlah kg mengikut negeri
        $negerikg = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
                    ->join('t_ref_negeri','t_kampung.kam_idnegeri','=','t_ref_negeri.neg_idnegeri')
                    ->select('t_ref_negeri.neg_sktn_negeri as negeri', DB::raw('count(*) as jumlah'))
                    ->groupBy('t_ref_negeri.neg_idnegeri')
                    ->pluck('jumlah','negeri')->all();

        $negerikg_list = DB::connection('mysql2')->table('t_ref_negeri')->where('neg_id','!=','17')->get();
        $kawalseliakg_list = DB::connection('mysql2')->table('t_ref_kawal_selia')->get();
        $penyelaraskg_list = DB::connection('mysql2')->table('t_ref_agensi_penyelaras')
                            ->leftJoin('t_ref_kawal_selia','t_ref_agensi_penyelaras.lar_idkawal_selia','=','t_ref_kawal_selia.kws_idkawal_selia')
                            ->orderBy('t_ref_agensi_penyelaras.lar_idkawal_selia','ASC')->get();

        //2-Generate warna carta
        for ($i=0; $i<=count($negerikg); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        //3-Sediakan data carta kembali ke view
        $chartnegeri = new Kampung;
        $chartnegeri->labels = (array_keys($negerikg));
        $chartnegeri->dataset = (array_values($negerikg));
        $chartnegeri->colours = $colours;

        //-- Carta Agensi Kawal Selia ---//
        //1-Dapatkan jumlah kg mengikut agensi kawal selia
        $kawalseliakg = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
                    ->join('t_ref_kawal_selia','t_kampung.kam_idkawal_selia','=','t_ref_kawal_selia.kws_idkawal_selia')
                    ->select('t_ref_kawal_selia.kws_sktn_agensi as kawalselia', DB::raw('count(*) as jumlah'))
                    ->groupBy('t_ref_kawal_selia.kws_idkawal_selia')
                    ->pluck('jumlah','kawalselia')->all();

        //2-Generate warna carta
        for ($i=0; $i<=count($kawalseliakg); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        //3-Sediakan data carta kembali ke view
        $chartkawalselia = new Kampung;
        $chartkawalselia->labels = (array_keys($kawalseliakg));
        $chartkawalselia->dataset = (array_values($kawalseliakg));
        $chartkawalselia->colours = $colours;

        //-- Carta Agensi Penyelaras ---//
        //1-Dapatkan jumlah kg mengikut agensi kawal selia
        $penyelaraskg = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
                    ->join('t_ref_agensi_penyelaras','t_kampung.kam_idagensi_penyelaras','=','t_ref_agensi_penyelaras.lar_idagensi_penyelaras')
                    ->select('t_ref_agensi_penyelaras.lar_sktn_agensi as penyelaras', DB::raw('count(*) as jumlah'))
                    ->groupBy('t_ref_agensi_penyelaras.lar_idagensi_penyelaras')
                    ->pluck('jumlah','penyelaras')->all();

        //2-Generate warna carta
        for ($i=0; $i<=count($penyelaraskg); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        //3-Sediakan data carta kembali ke view
        $chartpenyelaras = new Kampung;
        $chartpenyelaras->labels = (array_keys($penyelaraskg));
        $chartpenyelaras->dataset = (array_values($penyelaraskg));
        $chartpenyelaras->colours = $colours;

        //dd($penyelaraskg_list);

        return view('home',compact(
            'kampung','agensi','negeri','kawalselia','chartnegeri', 'chartkawalselia','chartpenyelaras','negerikg_list','kawalseliakg_list','penyelaraskg_list'
        ))->with('no',1);
    }
}
