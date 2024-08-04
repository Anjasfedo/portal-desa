<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Pekerjaan;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataDesaController extends Controller
{
    public function index()
    {
        $dataAgamas     = Agama::all();
        $labels         = $dataAgamas->pluck('agama')->toArray();
        $dataPenganut   = $dataAgamas->pluck('penganut')->toArray();
        $total_penganut = $dataAgamas->sum('penganut');

        $dataJenisKelamins   = JenisKelamin::all();
        $labelsJenisKelamin  = $dataJenisKelamins->pluck('jenis_kelamin')->toArray();
        $jumlah              = $dataJenisKelamins->pluck('jumlah')->toArray();
        $jumlah_total        = $dataJenisKelamins->sum('jumlah');

        $dataPekerjaans      = Pekerjaan::all();
        $total_pekerjaan     = $dataPekerjaans->sum('jumlah');
        $labelsPekerjaan     = $dataPekerjaans->pluck('pekerjaan')->toArray();
        $jumlahPekerjaan     = $dataPekerjaans->pluck('jumlah')->toArray();

        return view('data-desa.index', [
            'dataAgamas'        => $dataAgamas,
            'labels'            => json_encode($labels),
            'dataPenganut'      => json_encode($dataPenganut),
            'totalPenganut'     => $total_penganut,

            'dataJenisKelamins' => $dataJenisKelamins,
            'labelsJenisKelamin'=> json_encode($labelsJenisKelamin),
            'jumlah'            => json_encode($jumlah),
            'jumlahTotal'       => $jumlah_total,

            'pekerjaans'        => $dataPekerjaans,
            'totalPekerjaan'    => $total_pekerjaan,
            'labelPekerjaan'    => json_encode($labelsPekerjaan),
            'jumlahPekerjaan'   => json_encode($jumlahPekerjaan)
        ]);
    }
}
