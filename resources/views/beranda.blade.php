@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Daftar Beasiswa</h1>
    
    <div class="row">
        @foreach($beasiswas as $beasiswa)
            <div class="col-md-6">
                <div class="card mb-3">
                    <!-- Gambar Beasiswa -->
                    <img src="{{ asset('images/' . $beasiswa['gambar']) }}" class="card-img-top" alt="Gambar {{ $beasiswa['jenis'] }}" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $beasiswa['jenis'] }}</h5>
                        <p class="card-text">Syarat-syarat pendaftaran:</p>

                        <!-- List Syarat Beasiswa -->
                        <ul>
                            @foreach($beasiswa['syarat'] as $syarat)
                                <li>{{ $syarat }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center">
        <a href="{{ route('form') }}" class="btn btn-primary btn-lg">Daftar Beasiswa</a>
    </div>
</div>
@endsection
