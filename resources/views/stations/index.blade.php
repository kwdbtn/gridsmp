

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span style="color: red">| </span>GENERATING STATIONS
                {{-- <span class="float-right"><a href="{{ route('activities.create') }}" class="btn btn-sm btn-dark float-end">Add New</a></span> --}}
            </h4> <hr>

            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Station</th>
                            <th scope="col">Unit(s)</th>
                            {{-- <th scope="col">Total Generation</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if ($stations->isEmpty())
                            @else @foreach ($stations as $station)
                            <tr scope="row" class="m-10">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a class="activity-link" href="{{ route('stations.show', $station) }}">
                                        {{ strtoupper($station->name) }}
                                    </a>
                                </td>
                                <td>{{ $station->unitcount() }}</td>
                                {{-- <td>{{ $station->totalgeneration() }} MW</td> --}}
                            </tr>
                            @endforeach @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
