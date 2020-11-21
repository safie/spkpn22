<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HakMilikTanah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kampung;
use App\Models\RefNegeri;
use App\Models\RefKawalSelia;
use App\Models\Tanah;
use App\Models\TanahUsaha;
use App\Models\TanahTerbiar;

class ModulEController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tanah(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = Tanah::distinct('tab_idtanah')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_e_kegunaan_tanah','t_kampung.kam_idkampung','=','t_e_kegunaan_tanah.tab_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_e_kegunaan_tanah.tab_idkampung','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_e_kegunaan_tanah','t_kampung.kam_idkampung','=','t_e_kegunaan_tanah.tab_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_e_kegunaan_tanah.tab_idkampung','!=', NULL);

        //--check ada input?--//
        $negerikg = $request->input('kam_idnegeri');
        $daerahkg = $request->input('kam_iddaerah');
        $mukimkg = $request->input('kam_idmukim');
        $kawalseliakg = $request->input('kam_idkawal_selia');
        $penyelaraskg = $request->input('kam_idagensi_penyelaras');
        $parlimenkg = $request->input('kam_idparlimen');
        $dunkg = $request->input('kam_iddun');

        //--set input-text dgn variable--//

        if (!empty($negerikg)){
            $listkg_isi->where('kam_idnegeri','=',$negerikg);
            $listkg_belumisi->where('kam_idnegeri','=',$negerikg);
        }
        if (!empty($daerahkg)){
            $listkg_isi->Where('kam_iddaerah','=',$daerahkg);
            $listkg_belumisi->Where('kam_iddaerah','=',$daerahkg);
        }
        if (!empty($mukimkg)){
            $listkg_isi->Where('kam_idmukim','=',$mukimkg);
            $listkg_belumisi->Where('kam_idmukim','=',$mukimkg);
        }
        if (!empty($kawalseliakg)){
            $listkg_isi->Where('kam_idkawal_selia','=',$kawalseliakg);
            $listkg_belumisi->Where('kam_idkawal_selia','=',$kawalseliakg);
        }
        if (!empty($penyelaraskg)){
            $listkg_isi->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
            $listkg_belumisi->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
        }

        $senaraiIsi = $listkg_isi->paginate(5);
        $senaraiBelumIsi = $listkg_belumisi->get();

        $jumIsi =  $listkg_isi->count();
        $jumBelumIsi = $listkg_belumisi->count();
        $jumTotal = $jumIsi + $jumBelumIsi;

        $dataCarta = [
            'Isi' => $jumIsi,
            'Belum Isi' => $jumBelumIsi
        ];
        //dd($listkg_belumisi);

        //2-Generate auto warna carta
        for ($i=0; $i<=count($dataCarta); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
         }

        //3-Sediakan data carta kembali ke view
        $chartmodulb = new Kampung;
        $chartmodulb->labels = (array_keys($dataCarta));
        $chartmodulb->dataset = (array_values($dataCarta));
        $chartmodulb->colours = $colours;

        return view('modul_e.tanah',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }

    public function hakMilik(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = HakMilikTanah::distinct('jet_idjenis_tanah')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_e_jenis_tanah','t_kampung.kam_idkampung','=','t_e_jenis_tanah.jet_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_e_jenis_tanah.jet_idkampung','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_e_jenis_tanah','t_kampung.kam_idkampung','=','t_e_jenis_tanah.jet_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_e_jenis_tanah.jet_idkampung','!=', NULL);

        //--check ada input?--//
        $negerikg = $request->input('kam_idnegeri');
        $daerahkg = $request->input('kam_iddaerah');
        $mukimkg = $request->input('kam_idmukim');
        $kawalseliakg = $request->input('kam_idkawal_selia');
        $penyelaraskg = $request->input('kam_idagensi_penyelaras');
        $parlimenkg = $request->input('kam_idparlimen');
        $dunkg = $request->input('kam_iddun');

        //--set input-text dgn variable--//

        if (!empty($negerikg)){
            $listkg_isi->where('kam_idnegeri','=',$negerikg);
            $listkg_belumisi->where('kam_idnegeri','=',$negerikg);
        }
        if (!empty($daerahkg)){
            $listkg_isi->Where('kam_iddaerah','=',$daerahkg);
            $listkg_belumisi->Where('kam_iddaerah','=',$daerahkg);
        }
        if (!empty($mukimkg)){
            $listkg_isi->Where('kam_idmukim','=',$mukimkg);
            $listkg_belumisi->Where('kam_idmukim','=',$mukimkg);
        }
        if (!empty($kawalseliakg)){
            $listkg_isi->Where('kam_idkawal_selia','=',$kawalseliakg);
            $listkg_belumisi->Where('kam_idkawal_selia','=',$kawalseliakg);
        }
        if (!empty($penyelaraskg)){
            $listkg_isi->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
            $listkg_belumisi->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
        }

        $senaraiIsi = $listkg_isi->paginate(5);
        $senaraiBelumIsi = $listkg_belumisi->get();

        $jumIsi =  $listkg_isi->count();
        $jumBelumIsi = $listkg_belumisi->count();
        $jumTotal = $jumIsi + $jumBelumIsi;

        $dataCarta = [
            'Isi' => $jumIsi,
            'Belum Isi' => $jumBelumIsi
        ];
        //dd($listkg_belumisi);

        //2-Generate auto warna carta
        for ($i=0; $i<=count($dataCarta); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
         }

        //3-Sediakan data carta kembali ke view
        $chartmodulb = new Kampung;
        $chartmodulb->labels = (array_keys($dataCarta));
        $chartmodulb->dataset = (array_values($dataCarta));
        $chartmodulb->colours = $colours;

        return view('modul_e.hakmilik',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }

    public function tanahDiusaha(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = TanahUsaha::distinct('tdu_idtanah_diusahakan')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_e_tanah_diusahakan','t_kampung.kam_idkampung','=','t_e_tanah_diusahakan.tdu_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_e_tanah_diusahakan.tdu_idkampung','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_e_tanah_diusahakan','t_kampung.kam_idkampung','=','t_e_tanah_diusahakan.tdu_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_e_tanah_diusahakan.tdu_idkampung','!=', NULL);

        //--check ada input?--//
        $negerikg = $request->input('kam_idnegeri');
        $daerahkg = $request->input('kam_iddaerah');
        $mukimkg = $request->input('kam_idmukim');
        $kawalseliakg = $request->input('kam_idkawal_selia');
        $penyelaraskg = $request->input('kam_idagensi_penyelaras');
        $parlimenkg = $request->input('kam_idparlimen');
        $dunkg = $request->input('kam_iddun');

        //--set input-text dgn variable--//

        if (!empty($negerikg)){
            $listkg_isi->where('kam_idnegeri','=',$negerikg);
            $listkg_belumisi->where('kam_idnegeri','=',$negerikg);
        }
        if (!empty($daerahkg)){
            $listkg_isi->Where('kam_iddaerah','=',$daerahkg);
            $listkg_belumisi->Where('kam_iddaerah','=',$daerahkg);
        }
        if (!empty($mukimkg)){
            $listkg_isi->Where('kam_idmukim','=',$mukimkg);
            $listkg_belumisi->Where('kam_idmukim','=',$mukimkg);
        }
        if (!empty($kawalseliakg)){
            $listkg_isi->Where('kam_idkawal_selia','=',$kawalseliakg);
            $listkg_belumisi->Where('kam_idkawal_selia','=',$kawalseliakg);
        }
        if (!empty($penyelaraskg)){
            $listkg_isi->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
            $listkg_belumisi->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
        }

        $senaraiIsi = $listkg_isi->paginate(5);
        $senaraiBelumIsi = $listkg_belumisi->get();

        $jumIsi =  $listkg_isi->count();
        $jumBelumIsi = $listkg_belumisi->count();
        $jumTotal = $jumIsi + $jumBelumIsi;

        $dataCarta = [
            'Isi' => $jumIsi,
            'Belum Isi' => $jumBelumIsi
        ];
        //dd($listkg_belumisi);

        //2-Generate auto warna carta
        for ($i=0; $i<=count($dataCarta); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
         }

        //3-Sediakan data carta kembali ke view
        $chartmodulb = new Kampung;
        $chartmodulb->labels = (array_keys($dataCarta));
        $chartmodulb->dataset = (array_values($dataCarta));
        $chartmodulb->colours = $colours;

        return view('modul_e.tanahusaha',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }

    public function tanahTerbiar(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = tanahTerbiar::distinct('tat_idtanah_terbiar')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_e_tanah_terbiar','t_kampung.kam_idkampung','=','t_e_tanah_terbiar.tat_idtanah_terbiar')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_e_tanah_terbiar.tat_idtanah_terbiar','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_e_tanah_terbiar','t_kampung.kam_idkampung','=','t_e_tanah_terbiar.tat_idtanah_terbiar')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_e_tanah_terbiar.tat_idtanah_terbiar','!=', NULL);

        //--check ada input?--//
        $negerikg = $request->input('kam_idnegeri');
        $daerahkg = $request->input('kam_iddaerah');
        $mukimkg = $request->input('kam_idmukim');
        $kawalseliakg = $request->input('kam_idkawal_selia');
        $penyelaraskg = $request->input('kam_idagensi_penyelaras');
        $parlimenkg = $request->input('kam_idparlimen');
        $dunkg = $request->input('kam_iddun');

        //--set input-text dgn variable--//

        if (!empty($negerikg)){
            $listkg_isi->where('kam_idnegeri','=',$negerikg);
            $listkg_belumisi->where('kam_idnegeri','=',$negerikg);
        }
        if (!empty($daerahkg)){
            $listkg_isi->Where('kam_iddaerah','=',$daerahkg);
            $listkg_belumisi->Where('kam_iddaerah','=',$daerahkg);
        }
        if (!empty($mukimkg)){
            $listkg_isi->Where('kam_idmukim','=',$mukimkg);
            $listkg_belumisi->Where('kam_idmukim','=',$mukimkg);
        }
        if (!empty($kawalseliakg)){
            $listkg_isi->Where('kam_idkawal_selia','=',$kawalseliakg);
            $listkg_belumisi->Where('kam_idkawal_selia','=',$kawalseliakg);
        }
        if (!empty($penyelaraskg)){
            $listkg_isi->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
            $listkg_belumisi->Where('kam_idagensi_penyelaras','=',$penyelaraskg);
        }

        $senaraiIsi = $listkg_isi->paginate(5);
        $senaraiBelumIsi = $listkg_belumisi->get();

        $jumIsi =  $listkg_isi->count();
        $jumBelumIsi = $listkg_belumisi->count();
        $jumTotal = $jumIsi + $jumBelumIsi;

        $dataCarta = [
            'Isi' => $jumIsi,
            'Belum Isi' => $jumBelumIsi
        ];
        //dd($listkg_belumisi);

        //2-Generate auto warna carta
        for ($i=0; $i<=count($dataCarta); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
         }

        //3-Sediakan data carta kembali ke view
        $chartmodulb = new Kampung;
        $chartmodulb->labels = (array_keys($dataCarta));
        $chartmodulb->dataset = (array_values($dataCarta));
        $chartmodulb->colours = $colours;

        return view('modul_e.tanahterbiar',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }


}
