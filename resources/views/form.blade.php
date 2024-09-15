@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Form Pendaftaran Beasiswa</h1>

    <form id="beasiswaForm" action="{{ route('submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select id="semester" name="semester" class="form-select" required onchange="setIPK()">
                    @for($i = 1; $i <= 8; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="text" class="form-control" id="ipk" name="ipk" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label for="jenis_beasiswa" class="form-label">Jenis Beasiswa</label>
                <select id="jenis_beasiswa" name="jenis_beasiswa" class="form-select" disabled>
                    <option value="Akademik">Akademik</option>
                    <option value="Non-Akademik">Non-Akademik</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="berkas" class="form-label">Upload Berkas (PDF)</label>
                <input type="file" class="form-control" id="berkas" name="berkas" accept="application/pdf" disabled>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg" id="submitButton" disabled>Daftar</button>
        </div>
    </form>
</div>

<script>
    function setIPK() {
        const semester = document.getElementById("semester").value;
        const ipkField = document.getElementById("ipk");
        const jenisBeasiswa = document.getElementById("jenis_beasiswa");
        const berkasField = document.getElementById("berkas");
        const submitButton = document.getElementById("submitButton");

        let ipk = 0;

        // Logika untuk mengisi IPK berdasarkan semester
        if (semester >= 1 && semester <= 4) {
            ipk = 2.9;
        } else if (semester >= 5 && semester <= 8) {
            ipk = 3.4;
        }

        ipkField.value = ipk.toFixed(2);

        // Jika IPK di bawah 3, disable jenis beasiswa, upload berkas, dan tombol submit
        if (ipk < 3) {
            jenisBeasiswa.disabled = true;
            berkasField.disabled = true;
            submitButton.disabled = true;
        } else {
            jenisBeasiswa.disabled = false;
            berkasField.disabled = false;
            submitButton.disabled = false;

            // Fokus otomatis ke pilihan jenis beasiswa jika IPK di atas 3
            jenisBeasiswa.focus();
        }
    }

    // Set default IPK saat halaman pertama kali dimuat
    window.onload = setIPK;
</script>
@endsection
