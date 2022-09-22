@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="height: 580px; overflow:auto;">
                <div class="card-body">
                    @foreach ($stations as $station)
                        <a href="{{ route('stations.show', $station) }}">
                            {{-- <div class="p-3 mb-2 border border-3 border-secondary text-black rounded d-flex justify-content-between" style="background-color: #{{ $colors[$loop->iteration] }}"> --}}
                            <div class="p-3 mb-2 border border-3 border-secondary text-black rounded d-flex justify-content-between">
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
    </div>
</div>
@endsection
