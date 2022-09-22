@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-1">
            <div class="card-body">
                <i class="fa fa-bolt" style="color: rgb(147,176,224)"></i> GENERATION 

                <span class="float-end"><i class="fa fa-clock-o" style="color: orange"></i> {{ \Carbon\Carbon::now()->toDayDateTimeString() }}</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                {!! $chart->container() !!}
                {!! $chart->script() !!}
            </div>
        </div>
    </div>
@endsection