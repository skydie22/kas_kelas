<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>EXPORT DATA KAS</title>
</head>
<body>
    <div class="container mt-5">
        <div class="form-group">
        <p align="center"><b>Laporan Data Kas</b></p>

        <table class="table table-striped table-hover mt-5">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Pemasukan</th>
                    <th>Pengeluaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datasExport as $rekap) 
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rekap->tanggal }}</td>
                    <td>{{ $rekap->uraian }}</td>
                    <td>{{ $rekap->type == 'MASUK' ? $rekap->kas : 0 }}</td>
                    <td>{{ $rekap->type == 'KELUAR' ? $rekap->kas : 0 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>