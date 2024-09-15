@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Hasil Pendaftaran Beasiswa</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informasi Pendaftaran</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nama: {{ $beasiswa->nama }}</li>
                <li class="list-group-item">Email: {{ $beasiswa->email }}</li>
                <li class="list-group-item">Nomor HP: {{ $beasiswa->nomor_hp }}</li>
                <li class="list-group-item">Semester: {{ $beasiswa->semester }}</li>
                <li class="list-group-item">IPK: {{ $beasiswa->ipk }}</li>
                <li class="list-group-item">Jenis Beasiswa: {{ $beasiswa->jenis_beasiswa }}</li>
                <li class="list-group-item">Status Ajuan: {{ $beasiswa->status_ajuan }}</li>
            </ul>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg">Kembali ke Pilihan Beasiswa</a>
    </div>
</div>
@endsection
