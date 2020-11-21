<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GolonganKhas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kampung;
use App\Models\Pekerjaan;
use App\Models\Pendapatan;
use App\Models\RefNegeri;
use App\Models\RefKawalSelia;
use App\Models\Penduduk;
use App\Models\Umur;
use App\Models\Pendidikan;

class ModulDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function penduduk(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = Penduduk::distinct('deb_idkampung')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_demografi','t_kampung.kam_idkampung','=','t_d_demografi.deb_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_demografi.deb_idkampung','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_demografi','t_kampung.kam_idkampung','=','t_d_demografi.deb_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_demografi.deb_idkampung','!=', NULL);

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

        return view('modul_d.penduduk',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }

    public function umur(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = Umur::distinct('deu_idkampung')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_umur','t_kampung.kam_idkampung','=','t_d_umur.deu_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_umur.deu_idkampung','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_umur','t_kampung.kam_idkampung','=','t_d_umur.deu_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_umur.deu_idkampung','!=', NULL);

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

        return view('modul_d.umur',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }

    public function pendidikan(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = Pendidikan::distinct('dtp_iddemografi_tahap_pendidikan')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_tahap_pendidikan','t_kampung.kam_idkampung','=','t_d_tahap_pendidikan.dtp_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_tahap_pendidikan.dtp_idkampung','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_tahap_pendidikan','t_kampung.kam_idkampung','=','t_d_tahap_pendidikan.dtp_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_tahap_pendidikan.dtp_idkampung','!=', NULL);

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

        return view('modul_d.pendidikan',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }

    public function pendapatan(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = Pendapatan::distinct('dpk_iddemografi_pendapatan_kasar')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_pendapatan_kasar','t_kampung.kam_idkampung','=','t_d_pendapatan_kasar.dpk_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_pendapatan_kasar.dpk_idkampung','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_pendapatan_kasar','t_kampung.kam_idkampung','=','t_d_pendapatan_kasar.dpk_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_pendapatan_kasar.dpk_idkampung','!=', NULL);

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

        return view('modul_d.pendapatan',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }

    public function pekerjaan(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = Pekerjaan::distinct('dep_idkampung')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_pekerjaan','t_kampung.kam_idkampung','=','t_d_pekerjaan.dep_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_pekerjaan.dep_idkampung','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_pekerjaan','t_kampung.kam_idkampung','=','t_d_pekerjaan.dep_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_pekerjaan.dep_idkampung','!=', NULL);

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

        return view('modul_d.pekerjaan',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }

    public function golongankhas(Request $request)
    {
        //--dropdown negeri--//
        $negeri = RefNegeri::all();

        //--dropdown agensi kawal selia--//
        $agensikawalselia = RefKawalSelia::all();

        //-- Carta --//
        //1-Dapatkan data //
        $totalKgModul = GolonganKhas::distinct('dgk_idkampung')->count();
        $totalKampung = Kampung::count();
        $listkg_belumisi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_golongan_khas','t_kampung.kam_idkampung','=','t_d_golongan_khas.dgk_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_golongan_khas.dgk_idkampung','=', NULL);

        $listkg_isi = DB::connection('mysql2')->table('t_kampung')->where('kam_idstatus_kampung','1')
        ->leftJoin('t_d_golongan_khas','t_kampung.kam_idkampung','=','t_d_golongan_khas.dgk_idkampung')
        ->select('t_kampung.kam_idkampung as id','t_kampung.kam_nama_kampung as kampung')->distinct('t_kampung.kam_idkampung')
        ->where('t_d_golongan_khas.dgk_idkampung','!=', NULL);

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

        return view('modul_d.golongankhas',compact('negeri','agensikawalselia','chartmodulb','senaraiIsi','senaraiBelumIsi','jumBelumIsi','jumTotal'))->with('no',1);
    }

}
