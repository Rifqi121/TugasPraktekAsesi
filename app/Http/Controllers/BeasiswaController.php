<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    public function index() {
        $beasiswas = [
            [
                'jenis' => 'Beasiswa Akademik', 
                'gambar' => 'akademik.jpg',
                'syarat' => [
                    'IPK minimal 3.5',
                    'Aktif dalam kegiatan akademik kampus',
                    'Lulus minimal 2 semester',
                ]
            ],
            [
                'jenis' => 'Beasiswa Non-Akademik', 
                'gambar' => 'non-akademik.jpg',
                'syarat' => [
                    'Berprestasi di bidang seni atau olahraga',
                    'IPK minimal 3.00',
                    'Menjadi anggota organisasi kampus',
                ]
            ],
        ];
    
        return view('beranda', compact('beasiswas'));
    }
    

    public function create() {
        return view('form');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'nomor_hp' => 'required|numeric',
            'semester' => 'required|integer|between:1,8',
            'jenis_beasiswa' => 'required_if:ipk,>=,3',
            'berkas' => 'required_if:ipk,>=,3|mimes:pdf',
        ]);

        // Asumsi IPK
        $semester = $request->input('semester');
        $ipk = $semester <= 4 ? 2.9 : 3.4;
        if ($ipk < 3) {
            return redirect()->back()->withErrors(['IPK rendah, tidak memenuhi syarat']);
        }

        // Simpan data ke database
        $beasiswa = new Beasiswa();
        $beasiswa->nama = $validated['nama'];
        $beasiswa->email = $validated['email'];
        $beasiswa->nomor_hp = $validated['nomor_hp'];
        $beasiswa->semester = $validated['semester'];
        $beasiswa->ipk = $ipk;
        $beasiswa->jenis_beasiswa = $request->jenis_beasiswa;
        $beasiswa->berkas = $request->file('berkas')->store('berkas');
        $beasiswa->save();

        return redirect()->route('hasil');
    }

    public function hasil() {
        $beasiswa = Beasiswa::latest()->first();
        return view('hasil', compact('beasiswa'));
    }
}

