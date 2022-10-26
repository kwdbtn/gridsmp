@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
                <strong><span style="color: red">|</span> {{ $stationUnit->name }} ({{ $stationUnit->station->name }})</strong>
                <span class="float-right">
                    <a href="{{ route('stations.show-generation', ['station' => $stationUnit->station]) }}" class="btn btn-sm btn-dark">Back</a>
                </span>
            </h4> <hr>

            <div class="row">
                <div class="col-md-6 table-responsive">
                <table class="table table-bordered table-striped table-hover table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 50%">Reading</th>
                            <th scope="col">Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($readings->count() < 0)
                        @else @foreach ($readings as $reading)
                        <tr scope="row">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reading->value }}{{ $reading->unit }}</td>
                            <td>{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $reading->update_time))->toDayDateTimeString() }}</td>
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