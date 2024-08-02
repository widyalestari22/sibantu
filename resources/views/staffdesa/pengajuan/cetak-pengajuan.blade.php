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
            <img src="{{ url('/logo/bengkalis.png') }}" alt="Logo" style="max-width: 60px;">
            <h3>Desa Air Putih</h3>
        </div>
    </header>

    <h1>Laporan Pengajuan Penerima BLT DD</h1>

    <!-- Tambahkan konten laporan di sini, contoh menggunakan tabel -->
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Bantuan Lain</th>
                <th scope="col">Penghasilan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan as $juan)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> {{ $juan->nama }} </td>
                    <td>{{ $juan->nik }}</td>
                    <td>{{ $juan->alamat }} </td>
                    <td>{{ $juan->kelamin }}</td>
                    <td>{{ $juan->tanpa_bantuan }}</td>
                    <td>{{ $juan->penghasilan }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        {{-- Halaman {{ $page }} dari total {{ $pages }} --}}
    </footer>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
