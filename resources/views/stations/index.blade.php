@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
            @foreach ($stations as $station)
                <a href="{{ route('stations.show', $station) }}">
                    <div class="p-3 mb-2 border border-3 border-secondary bg-white text-black rounded d-flex justify-content-between">
                        
                        <span>
                            <strong>{{ $station->name }}</strong><br>
                            Total Generation<br>
                        </span>
                        <span style="text-align:right">
                            <strong>{{ $station->unitcount() }} Units</strong><br>
                            <strong>{{ $station->totalgeneration() }} MW</strong><br>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection