@extends('layouts.app')

@section('title', 'Home Wirelessindo')

@section('content')
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-error pull-right"> Alfamart</span>
                <h5>Branch</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{count($branch)}}</h1>
                {{--<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>--}}
                {{--<small>Total income</small>--}}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-error pull-right"> Alfamart</span>
                <h5>Toko</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{count($toko)}}</h1>
                {{--<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>--}}
                {{--<small>Total income</small>--}}
            </div>
        </div>
    </div>
@endsection
