<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <title>{{ $title }}</title>
</head>

<body>
    <header>
        <div>
            {{-- <img src="{{ url('/logo/bengkalis.png') }}" alt="Logo" style="max-width: 60px;"> --}}
            {{-- <h3>Desa Air Putih</h3> --}}
            <h3>Pemerintahan Kabupaten Bengkalis</h3>
            <h3>Kecamatan Bengkalis</h3>
            <h3>Desa Air Putih</h3>
            <h5>Laporan Penerimaan Bantuan Langsung Tunai Dana Desa</h5>
        </div>
    </header>

    <h1>Laporan Penyaluran Bantuan Langung Tunai</h1>
    <h2>Penerima Yang Sudah Mengambil Bantuan</h2>

    <div class="table-responsive">
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

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
