@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
                <div><span style="color: red">| </span>{{ $station->name }}</div>
                <span class="float-right">
                    <a href="{{ route('stations.transmission') }}" class="btn btn-sm btn-dark">Back</a>
                </span>
            </h4> <hr>

            <div class="row">
                <div class="col-md-6 table-responsive">
                <table class="table table-bordered table-striped-columns table-hover table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 50%">Reading</th>
                            <th scope="col">Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($mwreadings->isEmpty())
                        @else @foreach ($mwreadings as $reading)
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
                    {!! $chartMW->container() !!}
                    {!! $chartMW->script() !!}
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-6 table-responsive">
                <table class="table table-bordered table-striped-columns table-hover table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 50%">Reading</th>
                            <th scope="col">Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($mvarreadings->isEmpty())
                        @else @foreach ($mvarreadings as $reading)
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
                    {!! $chartMVAR->container() !!}
                    {!! $chartMVAR->script() !!}
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection