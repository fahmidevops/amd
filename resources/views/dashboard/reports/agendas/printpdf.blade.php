<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td {
        border: 1px solid #000000;
        padding-left: 3px;
        text-align: left;
    },
    th {
        border: 1px solid #000000;
        text-align: center;
        /* padding: 8px; */
    }
    /* tr:nth-child(even) {
        background-color: #dddddd;
    } */
    h4 {
        font-family: arial, sans-serif;
        text-align: center;
    }

    #lap {
      text-align : center;
      /* color: black; */
    }
</style>

  <title>Laporan Kegiatan</title>

</head>
<body>
  

<div id="lap">
  <h1 class="h2">Laporan Kegiatan</h1>
</div>

  <!-- table responsive -->
  <div class="card">
    <div class="card-body">
        {{-- <h4 class="card-title">Table Responsive </h4>
        <h6 class="card-subtitle">Data table example</h6> --}}
        <div class="table-responsive m-t-40">
            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                <thead>
                  <tr style="background-color: #3399ff;">
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Jenis Kegiatan</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Komponen Pengundang</th>
                    <th scope="col">Dihadiri/Disposisi</th>
                    {{-- <th scope="col">Keterangan</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($agendas as $agenda)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y', strtotime($agenda->date)) }}</td>
                    <td>{{ date('H:i', strtotime($agenda->time)) }}</td>
                    <td>{{ $agenda->title }}</td>
                    <td>{{ $agenda->type->name }}</td>
                    <td>{{ $agenda->location }}</td>
                    <td>{{ $agenda->komponen->name }}</td>
                    <td>@isset($agenda->staff)
                      {{ $agenda->staff->name }}
                      @endisset</td>
                    {{-- <td>{{ $agenda->description }}</td> --}}
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>





