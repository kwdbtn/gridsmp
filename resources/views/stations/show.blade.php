@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
                <strong><span style="color: red">| </span>{{ $station->name }} ~ {{ $station->unitcount() }} Units</strong>
                <span class="float-right">
                    <a href="{{ route('stations.index') }}" class="btn btn-sm btn-dark">Back</a>
                </span>
            </h4>

            <div class="row">
                <div class="col-md-6 table-responsive">
                <table class="table table-bordered table-striped-columns table-hover table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 50%">Unit</th>
                            <th scope="col">Latest Reading</th>
                            <th scope="col">Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($station->measurands->isEmpty())
                        @else @foreach ($station->measurands as $measurand)
                        <tr scope="row">
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('measurands.show', $measurand) }}">Generator {{ $loop->iteration }} ({{ $measurand->name }})</a></td>
                            <td>{{ $measurand->current() }}MW</td>
                            <td>{{ \Carbon\Carbon::parse($measurand->readings->last()->created_at)->diffForHumans() }}</td>
                        </tr>
                        @endforeach @endif
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h5><span style="color: green">|</span> Total Generation: {{ $station->totalgeneration() }}MW</h5>
            </div>
            </div>
        </div>
    </div>

    
</div>
@endsection