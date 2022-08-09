@extends('layouts.master')

@section('content')

<style>
    #chartdiv {
      width: 100%;
      height:800px;
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

        
    </div>
{{-- @php
  dd($kasPengeluaran)
@endphp --}}
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- CHART Masjid --}}



<script>
    const b_masjid = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
    ];
    const b_masjidd = {
        labels: b_masjid,
        datasets: [{
            label: 'Pemasukan',
            backgroundColor: '#435EBE',
            borderRadius: 4,
            barThickness: 10,
            
            data: [
              

               
            ]
        }, {
            label: 'Pengeluaran',
            backgroundColor: '#43beaf',
            borderRadius: 4,
            barThickness: 10,
            data: [
            
            ],
        }]
    };
    const bar_masjid = {
        type: 'bar',
        data: b_masjidd,
        options: {
            responsive: true,
            indexAxis: 'x',
            plugins: {
            legend: {
                position: 'bottom',
                labels: {
      usePointStyle: true,
    },
            },},
        }
    };
</script>

<script>
    const bulanan_masjid = new Chart(
        document.getElementById('masjid_b'),
        bar_masjid
    );
</script>



@endsection 