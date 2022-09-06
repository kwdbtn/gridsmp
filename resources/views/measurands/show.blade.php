@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
                <strong><span style="color: red">|</span> {{ $measurand->name }} ({{ $measurand->station->name }})</strong>
                <span class="float-right">
                    <a href="{{ route('stations.show', ['station' => $measurand->station]) }}" class="btn btn-sm btn-dark">Back</a>
                </span>
            </h4>

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
                        @if ($measurand->readings->isEmpty())
                        @else @foreach ($measurand->readings as $reading)
                        <tr scope="row">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reading->value }}{{ $reading->unit }}</td>
                            <td>{{ $reading->created_at }}</td>
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