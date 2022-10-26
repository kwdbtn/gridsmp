

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><span style="color: red">| </span>{{ $name }}
                {{-- <span class="float-right"><a href="{{ route('activities.create') }}" class="btn btn-sm btn-dark float-end">Add New</a></span> --}}
            </h4> <hr>

            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Station</th>
                            @if ($name == "Generation Stations")
                                <th scope="col">Unit(s)</th>
                            @endif
                            {{-- <th scope="col">Total Generation</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if ($stations->isEmpty())
                            @else @foreach ($stations as $station)
                            <tr scope="row" class="m-10">
                                <td>{{ $loop->iteration }}</td>
                                @if ($name == "Generation Stations")
                                    <td>
                                        <a class="activity-link" href="{{ route('stations.show-generation', $station) }}">
                                            {{ strtoupper($station->name) }}
                                        </a>
                                    </td>
                                    <td>{{ $station->unitcount() }}</td>
                                @else
                                <td>
                                    <a class="activity-link" href="{{ route('stations.show-transmission', $station) }}">
                                        {{ strtoupper($station->name) }}
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @endforeach @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
