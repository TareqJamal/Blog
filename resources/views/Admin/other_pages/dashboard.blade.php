@extends('Admin.Layouts.index')
@section('title')
@endsection
@section('content_dashboard')
    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="plain-widget">
                <div class="growth bg-info">12%</div>
                <h3>$9,527</h3>
                <p>Sales</p>
                <div class="progress sm no-shadow">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="plain-widget">
                <div class="growth bg-orange">15%</div>
                <h3>$4,365</h3>
                <p>Expenses</p>
                <div class="progress sm no-shadow">
                    <div class="progress-bar bg-orange" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="plain-widget">
                <div class="growth bg-orange">21%</div>
                <h3>$5,579</h3>
                <p>Profits</p>
                <div class="progress sm no-shadow">
                    <div class="progress-bar bg-orange" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
