<!-- resources/views/laporan/pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #333;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        footer {
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <header>
        <div>
            {{-- <img src="{{ url('/logo/bengkalis.png') }}" alt="Logo" style="max-width: 60px;"> --}}
            {{-- <h3>Desa Air Putih</h3> --}}
            <h3>Pemerintahan Kabupaten Bengkalis</h3>
            <h3>Kecamatan Bengkalis</h3>
            <h3>Desa Air Putih</h3>
            <h5>Laporan Penerimaan bantuan Program Keluarga Harapan</h5>
        </div>
    </header>

    <h1>Laporan Penyaluran Bantuan Program Keluarga Harapan</h1>
    <h2>Penerima Yang Sudah Mengambil Bantuan</h2>


    <!-- Tambahkan konten laporan di sini, contoh menggunakan tabel -->
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>NIK</th>
                <th>Nama Penerima</th>
                <th>Tanggal Penyaluran</th>
                <th>Jumlah Bantuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penyaluran as $pen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($pen->penerima)
                            {{ $pen->penerima->nik }}
                        @else
                            Data Nik Penerima tidak tersedia
                        @endif
                    </td>
                    <td>
                        @if ($pen->penerima)
                            {{ $pen->penerima->nama }}
                        @else
                            Nama penerima tidak tersedia
                        @endif
                    </td>
                    <td>{{ $pen->tanggal_penyaluran }}</td>
                    <td>{{ $pen->jumlah_bantuan }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 50px; text-align: right;">
        <p>Tanggal: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
    </div>

    <div style="text-align: right;">
        <p>Tanda Tangan:</p>
        <p style="margin-top: 50px;">_________________</p>
        <p></p>
        <p>Kepala Desa Air Putih</p>
    </div>



    <footer>
        {{-- Halaman {{ $page }} dari total {{ $pages }} --}}
    </footer>
</body>

</html>
