<?php

namespace App\Models;

class Laboratorium
{
    private static $data_lab = [
        [
            'kode_lab' => 'LAB01',
            'nama_lab' => 'Lab Pemrograman Dasar & Web',
            'penanggung_jawab' => 'Septa, S.Kom., M.Kom.',
            'kapasitas_pc' => 40,
            'status' => 'Tersedia',
            'fasilitas' => '40 Unit PC Core i7 RAM 16GB, Proyektor 4K, AC Central, Whiteboard Kaca, Koneksi Fiber 500 Mbps.'
        ],
        [
            'kode_lab' => 'LAB02',
            'nama_lab' => 'Lab Jaringan Komputer & Keamanan Siber',
            'penanggung_jawab' => 'Rina Wijaya, S.Kom., M.T.',
            'kapasitas_pc' => 32,
            'status' => 'Tersedia',
            'fasilitas' => '32 Unit PC Linux/Windows Dual Boot, Router Cisco, Switch Manageable, Server Rack, Crimping Tools.'
        ],
        [
            'kode_lab' => 'LAB03',
            'nama_lab' => 'Lab Kecerdasan Buatan & Data Science',
            'penanggung_jawab' => 'Dr. Budi Santoso, M.Kom.',
            'kapasitas_pc' => 25,
            'status' => 'Sedang Maintenance',
            'fasilitas' => '25 Unit Workstation GPU RTX 4070, Monitor 27 Inch IPS, Server Lokal JupyterHub.'
        ],
        [
            'kode_lab' => 'LAB04',
            'nama_lab' => 'Lab Multimedia, Game & AR/VR',
            'penanggung_jawab' => 'Septa, S.Kom., M.Kom.',
            'kapasitas_pc' => 30,
            'status' => 'Tersedia',
            'fasilitas' => '30 Unit PC Grafis Tinggi, 6 Unit Meta Quest 3 VR Headset, Drawing Tablet Wacom, Green Screen Studio.'
        ],
        [
            'kode_lab' => 'LAB05',
            'nama_lab' => 'Lab Sistem Tertanam & IoT',
            'penanggung_jawab' => 'Andi Prasetyo, S.T., M.Kom.',
            'kapasitas_pc' => 20,
            'status' => 'Sedang Maintenance',
            'fasilitas' => '20 Unit PC, Kit Arduino & ESP32, Raspberry Pi 5, Oscilloscope Digital, Soldering Station.'
        ]
    ];

    public static function ambilSemuaLab()
    {
        return self::$data_lab;
    }

    public static function cariKodeLab($kode)
    {
        foreach (self::$data_lab as $lab) {
            if (strtoupper($lab['kode_lab']) === strtoupper($kode)) {
                return $lab;
            }
        }
        return null;
    }

    public static function filterBerdasarkanStatus($status)
    {
        $hasil = [];
        foreach (self::$data_lab as $lab) {
            if (strtolower($lab['status']) === strtolower($status)) {
                $hasil[] = $lab;
            }
        }
        return $hasil;
    }
}