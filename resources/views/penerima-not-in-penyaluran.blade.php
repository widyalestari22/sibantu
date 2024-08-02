<!-- resources/views/penerima-not-in-penyaluran.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerima Not in Penyaluran</title>
</head>

<body>
    <h1>Daftar Penerima yang Tidak Ada di Penyaluran</h1>

    {{-- <table border="1">
        <thead>
            <tr>
                <th>ID Penerima</th>
                <th>Nama Penerima</th>
                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @foreach ($penerimaNotInPenyaluran as $penerima)
                <tr>
                    <td>{{ $penerima->id_penerima }}</td>
                    <td>{{ $penerima->nama }}</td>
                    <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    <table border="1">
        <thead>
            <tr>
                <th>ID Penerima</th>
                <th>Nama Penerima</th>
                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            @foreach ($penerimaPKhNotInPenyaluran as $penerima)
                <tr>
                    <td>{{ $penerima->id_pkh }}</td>
                    <td>{{ $penerima->nama }}</td>
                    <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
