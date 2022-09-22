@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-bolt" style="color: rgb(147,176,224)"></i> SYSTEM GENERATION 

                        <span class="float-end"><i class="fa fa-clock-o" style="color: orange"></i> {{ \Carbon\Carbon::now()->toDayDateTimeString() }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card-body">
                                <h6 class="text-center">SYSTEM FREQUENCY</h6>
                                <h4 class="text-center">{{ $arr['system_frequency']->value }} {{ $arr['system_frequency']->unit }}</h4>
                                <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['system_frequency']->update_time))->toDayDateTimeString() }}</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body verticalLine">
                                <h6 class="text-center">TOTAL SYSTEM GENERATION</h6>
                                <h4 class="text-center">{{ $arr['system_generation']->value }} {{ $arr['system_generation']->unit }}</h4>
                                <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['system_generation']->update_time))->toDayDateTimeString() }}</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body verticalLine">
                                <h6 class="text-center">AKOSOMBO FREQUENCY</h6>
                                <h4 class="text-center">-</h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card-body verticalLine">
                                <h6 class="text-center">TEMA GAS PRESSURE</h6>
                                <h4 class="text-center">{{ $arr['tema_gas']->value }} {{ $arr['tema_gas']->unit }}</h4>
                                <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['tema_gas']->update_time))->toDayDateTimeString() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="height: 300px; overflow:auto;">
                    <div class="card-body">
                        <h6 class="text-center"><i class="fa fa-fire" style="color: red"></i> THERMAL</h6>
                        <h4 class="text-center">{{ $arr['thermal_generation']->value }} {{ $arr['thermal_generation']->unit }}</h4>
                        <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['thermal_generation']->update_time))->toDayDateTimeString() }}</h6>
                        <table class="table table-responsive">
                            <tr>
                                <td>ASOGLI GS</td>
                                <td>{{ $arr['Asogli']->value }} {{ $arr['Asogli']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TAPCO</td>
                                <td>{{ $arr['TAPCO']->value }} {{ $arr['TAPCO']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TICO</td>
                                <td>{{ $arr['TICO']->value }} {{ $arr['TICO']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TT1PP</td>
                                <td>{{ $arr['TT1PP']->value }} {{ $arr['TT1PP']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CENIT</td>
                                <td>{{ $arr['CENIT']->value }} {{ $arr['CENIT']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TT2PP</td>
                                <td>{{ $arr['TT2PP']->value }} {{ $arr['TT2PP']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>KARPOWER</td>
                                <td>{{ $arr['KARPOWER']->value }} {{ $arr['KARPOWER']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>AMERI</td>
                                <td>{{ $arr['Ameri']->value }} {{ $arr['Ameri']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CENPOWER</td>
                                <td>-</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>AKSA</td>
                                <td>{{ $arr['AKSA']->value }} {{ $arr['AKSA']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>KTPP</td>
                                <td>{{ $arr['KTPP']->value }} {{ $arr['KTPP']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>AMANDI</td>
                                <td>-</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>BRIDGE POWER</td>
                                <td>-</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="height: 300px; overflow:auto;">
                    <div class="card-body">
                        <h6 class="text-center"><i class="fa fa-tint" style="color: aqua"></i> HYDRO</h6>
                        <h4 class="text-center">948.534MW</h4>
                        <table class="table table-responsive">
                            <tr>
                                <td>AKOSOMBO</td>
                                <td>{{ $arr['Akosombo']->value }} {{ $arr['Akosombo']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>KPONG</td>
                                <td>{{ $arr['Kpong']->value }} {{ $arr['Kpong']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>BUI</td>
                                <td>{{ $arr['Bui']->value }} {{ $arr['Bui']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="height: 300px; overflow:auto;">
                    <div class="card-body">
                        <h6 class="text-center"><i class="fa fa-sun-o" style="color:rgb(165, 165, 10)"></i> SOLAR</h6>
                        <h4 class="text-center">-</h4>
                        <table class="table table-responsive">
                            <tr>
                                <td>BUI</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>KALEO SOLAR</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="height: 300px; overflow:auto;">
                    <div class="card-body">
                        <h6 class="text-center"><i class="fa fa-link" style="color: green"></i> TIE LINES</h6>
                        <h4 class="text-center">546.34MW</h4>
                        <table class="table table-responsive">
                            <tr>
                                <td>CIE</td>
                                <td>{{ $arr['CIE']->value }} {{ $arr['CIE']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CEB (161kV)</td>
                                <td>{{ $arr['CEB(161KV)']->value }} {{ $arr['CEB(161KV)']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CEB (330kV)</td>
                                <td>{{ $arr['CEB(330KV)']->value }} {{ $arr['CEB(330KV)']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>SONABEL</td>
                                <td>{{ $arr['SONABEL']->value }} {{ $arr['SONABEL']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection