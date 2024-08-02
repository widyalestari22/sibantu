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
        /* body {
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

        @page {
            size: portrait;
        } */
        <style>body {
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

        /*
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        } */
        table {
            width: 100%;
            overflow-x: auto;
            /* Add this line to enable horizontal scrolling */
            border-collapse: collapse;
            margin-top: 20px;
        }

        /*
        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        } */
        th,
        td {
            white-space: nowrap;
            /* Prevent text from wrapping */
            max-width: 150px;
            /* Adjust the maximum width of columns */
            overflow: hidden;
            text-overflow: ellipsis;
            /* Show ellipsis for overflowed content */
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        @page {
            size: portrait;
            margin: 20px;
            /* Adjust the margin for better layout */
        }


        /* Contoh gaya untuk header dan footer (bisa disesuaikan) */
        /* header {
            text-align: center;
        } */
    </style>
    <title>{{ $title }}</title>
</head>

<body>
    <header>
        <div>
            {{-- <img src="{{ url('/logo/bengkalis.png') }}" alt="Logo" style="max-width: 60px;"> --}}
            <h3>Desa Air Putih</h3>
        </div>
    </header>

    <h1>Laporan Penyaluran Bantuan Langung Tunai</h1>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Nama Penerima</th>
                    <th scope="col">Nik</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">RT</th>
                    <th scope="col">RW</th>
                    {{-- <th scope="col">Alamat</th> --}}
                    {{-- <th scope="col">Desa</th>
                    <th scope="col">Kecamatan</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($penerima as $pen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pen->nama }}</td>
                        <td>{{ $pen->nik }}</td>
                        <td>{{ $pen->kelamin }}</td>
                        <td>{{ $pen->rt }}</td>
                        <td>{{ $pen->rw }}</td>
                        {{-- <td>{{ $pen->alamat }}</td> --}}
                        {{-- <td>{{ $pen->nama_desa }}</td>
                        <td>{{ $pen->nama_kecamatan }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
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
