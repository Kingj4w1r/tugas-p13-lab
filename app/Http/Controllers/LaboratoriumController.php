<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorium;

class LaboratoriumController extends Controller
{
    public function index()
    {
        $daftar_lab = Laboratorium::ambilSemuaLab();
        $total_pc = 0;
        foreach ($daftar_lab as $lab) {
            $total_pc += $lab['kapasitas_pc'];
        }

        return view('lab_index', [
            'daftar_lab' => $daftar_lab,
            'total_pc' => $total_pc,
            'filter_aktif' => 'Semua'
        ]);
    }

    public function detail($kode)
    {
        $lab = Laboratorium::cariKodeLab($kode);

        if (!$lab) {
            abort(404, 'Data Laboratorium dengan kode ' . $kode . ' tidak ditemukan.');
        }

        return view('lab_detail', [
            'lab' => $lab
        ]);
    }

    public function statusLab($status = 'Tersedia')
    {
        // Normalisasi parameter URL agar 'Maintenance' cocok dengan 'Sedang Maintenance'
        $status_dicari = (strtolower($status) === 'maintenance') ? 'Sedang Maintenance' : $status;
        $daftar_lab = Laboratorium::filterBerdasarkanStatus($status_dicari);

        $total_pc = 0;
        foreach ($daftar_lab as $lab) {
            $total_pc += $lab['kapasitas_pc'];
        }

        return view('lab_index', [
            'daftar_lab' => $daftar_lab,
            'total_pc' => $total_pc,
            'filter_aktif' => $status_dicari
        ]);
    }
}