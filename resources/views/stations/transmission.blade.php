@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
                <div><span style="color: red">| </span>{{ $station->name }}
                <span class="float-right">
                    <a href="{{ route('stations.transmission') }}" class="btn btn-sm btn-dark">Back</a>
                </span>
            </h4> <hr>

            <div class="row">
                <div class="col-md-6">
                    {!! $chart->container() !!}
                    {!! $chart->script() !!}
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection