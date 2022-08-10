@extends('layouts.master')

@section('content')

<style>
    #chartdiv {
        width: 100%;
        height: 800px;
    }
</style>

<div class="page-content">
    <h3>Dashboard</h3>
</div>
<section class="row">
    <div class="col-12 ">
        <div class="row">
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Total Kas</h6>
                                <h6 class="font-extrabold mb-0">@currency($kas)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldArrow---Up"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Kas Masuk</h6>
                                <h6 class="font-extrabold mb-0">@currency($kasMasuk)</h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="iconly-boldArrow---Down"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Kas Keluar</h6>
                                <h6 class="font-extrabold mb-0">@currency($kasPengeluaran)</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-lg-12 col-md-12">
            <div class="card">


                <div class="card-body px-3 py-4-5">
                    <canvas id="masjid_b"></canvas>

                </div>
            </div>
        </div>

{{-- @php
    
dd(    $data_pengeluaran
)
@endphp --}}
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- CHART Masjid --}}


<script>


    const labels = [
        'January'
        , 'February'
        , 'March'
        , 'April'
        , 'May'
        , 'June'
        , 'July'
        , 'Aug'
        , 'Sep'
        , 'Oct'
        , 'Nov'
        , 'Dec'
    ];
    const data = {
  labels: labels,
  datasets: [
    {
    label: 'pemasukan',
    data: [{{ $data_pemasukan[1] }}, {{ $data_pemasukan[2] }}, {{ $data_pemasukan[3] }}, {{ $data_pemasukan[4] }}, {{ $data_pemasukan[5] }}, {{ $data_pemasukan[6] }}, {{ $data_pemasukan[7] }} , {{ $data_pemasukan[8] }}, {{ $data_pemasukan[9] }} , {{ $data_pemasukan[10] }} , {{ $data_pemasukan[11] }} , {{ $data_pemasukan[12] }}],
    backgroundColor: '#435EBE',
    borderColor: "rgba(0,0,0,0)",
    borderWidth: 5
  },
  {
    label: 'pengeluaran',
    data: [{{ $data_pengeluaran[1] }}, {{ $data_pengeluaran[2] }}, {{ $data_pengeluaran[3] }}, {{ $data_pengeluaran[4] }}, {{ $data_pengeluaran[5] }}, {{ $data_pengeluaran[6] }}, {{ $data_pengeluaran[7] }} , {{ $data_pengeluaran[8] }}, {{ $data_pengeluaran[9] }} , {{ $data_pengeluaran[10] }} , {{ $data_pengeluaran[11] }} , {{ $data_pengeluaran[12] }}],
    backgroundColor: '#43beaf',
    borderColor: "rgba(0,0,0,0)",
    borderWidth: 5
  }
]
};
    const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

</script>

<script>
    const bulanan_masjid = new Chart(
        document.getElementById('masjid_b')
        , config
    );

</script>



@endsection