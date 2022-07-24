@extends('layouts.master')

@section('content')
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


            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
                
            </div>
                

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Rekap Kas Kelas</h4>
                </div>
                <div class="card-body">
                    <div id="bar"></div>
                </div>
            </div>
        </div>

        
    </div>
    {{-- <div class="col-12 col-lg-3">
    
        <div class="card">
            <div class="card-header">
                <h4>Visitors Profile</h4>
            </div>
            <div class="card-body">
                <div id="chart-visitors-profile"></div>
            </div>
        </div>
    </div> --}}
</section>
@endsection