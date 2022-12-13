@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
</div>

   <!-- Start row -->
   {{-- <div class="row">
    <div class="col-lg-3">
        <div class="card bg-info">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-2 align-self-center"><img src="img/icon/income-w.png" alt="Income" /> <span></span></div>
                    <div class="align-self-center">
                        <h6 class="text-white mt-2 mb-0">Agenda Aktif</h6>
                        <h1 class="mt-0 text-white">{{ $agendasCount }}</h1></div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-lg-3">
        <div class="card bg-success">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="mr-3 align-self-center"><img src="img/icon/expense-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white mt-2 mb-0">Total Expense</h6>
                        <h2 class="mt-0 text-white">236,000</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="mr-3 align-self-center"><img src="img/icon/assets-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white mt-2 mb-0">Total Assets</h6>
                        <h2 class="mt-0 text-white">987,563</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-danger">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="mr-3 align-self-center"><img src="img/icon/staff-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white mt-2 mb-0">Total Staff</h6>
                        <h2 class="mt-0 text-white">987,563</h2></div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<!-- End row -->
@endsection