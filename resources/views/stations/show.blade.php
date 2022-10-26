@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
                <div><span style="color: red">| </span>{{ $station->name }} ~ {{ $station->unitcount() }} Unit(s)</div> TOTAL GENERATION ~ {{ $station->totalgeneration() }}MW
                <span class="float-right">
                    <a href="{{ route('stations.index') }}" class="btn btn-sm btn-dark">Back</a>
                </span>
            </h4> <hr>

            <div class="row">
                <div class="col-md-6 table-responsive">
                <table class="table table-bordered table-striped-columns table-hover table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 40%">Unit</th>
                            <th scope="col">Latest Reading</th>
                            <th scope="col">Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($station->measurands->isEmpty())
                        @else @foreach ($station->station_units as $stationUnit)
                        <tr scope="row">
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('stationUnits.show', $stationUnit) }}">{{ $stationUnit->name }}</a></td>
                            <td>{{ round($stationUnit->current(), 2) }}MW</td> 
                            <td>{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $stationUnit->readings->last()->update_time))->diffForHumans() }}</td>
                        </tr>
                        @endforeach @endif
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                {!! $chart->container() !!}
                {!! $chart->script() !!}
            </div>
            </div>
        </div>
    </div>

    
</div>
@endsection