@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
            @foreach ($stationUnits as $stationUnit)
                <a href="{{ route('measurands.show', $stationUnit) }}">
                    <div class="p-3 mb-2 border border-3 border-secondary bg-light text-black rounded d-flex justify-content-between">
                        <strong>{{ $stationUnit->name }}</strong>
                        <span style="text-align:right">
                            <strong>{{ $stationUnit->current() }}</strong><br>
                            <small>{{ \Carbon\Carbon::parse($stationUnit->readings->last()->created_at)->diffForHumans() }}</small>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
