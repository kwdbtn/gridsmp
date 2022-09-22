@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-bolt" style="color: rgb(147,176,224)"></i> GENERATION 

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
                                <h4 class="text-center">{{ round($arr['system_frequency']->value, 2) }} {{ $arr['system_frequency']->unit }}</h4>
                                <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['system_frequency']->update_time))->toDayDateTimeString() }}</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body verticalLine">
                                <h6 class="text-center">TOTAL SYSTEM GENERATION</h6>
                                <h4 class="text-center">{{ round($arr['system_generation']->value, 2) }} {{ $arr['system_generation']->unit }}</h4>
                                <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['system_generation']->update_time))->toDayDateTimeString() }}</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body verticalLine">
                                <h6 class="text-center">VOLTA BUS</h6>
                                <h4 class="text-center">{{ round($arr['volta_bus']->value, 2) }} {{ $arr['volta_bus']->unit }}</h4>
                                <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['volta_bus']->update_time))->toDayDateTimeString() }}</h6>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card-body verticalLine">
                                <h6 class="text-center">TEMA GAS PRESSURE</h6>
                                <h4 class="text-center">{{ round($arr['tema_gas']->value, 2) }} {{ $arr['tema_gas']->unit }}</h4>
                                <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['tema_gas']->update_time))->toDayDateTimeString() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" style="padding-right: 0px">
                <div class="card" style="height: 300px; overflow:auto;">
                    <div class="card-body" style="padding-right: 0px">
                        <h6 class="text-center"><i class="fa fa-fire" style="color: red"></i> THERMAL</h6>
                        <h4 class="text-center">{{ round($arr['thermal_generation']->value, 2) }} {{ $arr['thermal_generation']->unit }}</h4>
                        <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['thermal_generation']->update_time))->toDayDateTimeString() }}</h6> <br>
                        <table class="table table-responsive">
                            <tr>
                                <td>ASOGLI GS</td>
                                <td>{{ round($arr['Asogli']->value, 2) }} {{ $arr['Asogli']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TAPCO</td>
                                <td>{{ round($arr['TAPCO']->value, 2) }} {{ $arr['TAPCO']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TICO</td>
                                <td>{{ round($arr['TICO']->value, 2) }} {{ $arr['TICO']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TT1PP</td>
                                <td>{{ round($arr['TT1PP']->value, 2) }} {{ $arr['TT1PP']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CENIT</td>
                                <td>{{ round($arr['CENIT']->value, 2) }} {{ $arr['CENIT']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TT2PP</td>
                                <td>{{ round($arr['TT2PP']->value, 2) }} {{ $arr['TT2PP']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>KARPOWER</td>
                                <td>{{ round($arr['KARPOWER']->value, 2) }} {{ $arr['KARPOWER']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>AMERI</td>
                                <td>{{ round($arr['Ameri']->value, 2) }} {{ $arr['Ameri']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CENPOWER</td>
                                <td>{{ round($arr['cenpower']->value, 2) }} {{ $arr['cenpower']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>AKSA</td>
                                <td>{{ round($arr['AKSA']->value, 2) }} {{ $arr['AKSA']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>KTPP</td>
                                <td>{{ round($arr['KTPP']->value, 2) }} {{ $arr['KTPP']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>AMANDI</td>
                                <td>{{ round($arr['amandi']->value, 2) }} {{ $arr['amandi']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>BRIDGE POWER</td>
                                <td>{{ round($arr['bridge_power']->value, 2) }} {{ $arr['bridge_power']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3" style="padding-right: 0px">
                <div class="card" style="height: 300px; overflow:auto;">
                    <div class="card-body">
                        <h6 class="text-center"><i class="fa fa-tint" style="color: aqua"></i> HYDRO</h6>
                        <h4 class="text-center">{{ round($arr['hydro_generation']->value, 2) }} {{ $arr['hydro_generation']->unit }}</h4>
                        <h6 class="text-center">{{ \Carbon\Carbon::parse(date("Y-m-d H:i:s", $arr['hydro_generation']->update_time))->toDayDateTimeString() }}</h6> <br>
                        <table class="table table-responsive">
                            <tr>
                                <td>AKOSOMBO</td>
                                <td>{{ round($arr['Akosombo']->value, 2) }} {{ $arr['Akosombo']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>KPONG</td>
                                <td>{{ round($arr['Kpong']->value, 2) }} {{ $arr['Kpong']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>BUI</td>
                                <td>{{ round($arr['Bui']->value, 2) }} {{ $arr['Bui']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3" style="padding-right: 0px">
                <div class="card" style="height: 300px; overflow:auto;">
                    <div class="card-body">
                        <h6 class="text-center"><i class="fa fa-sun-o" style="color:rgb(165, 165, 10)"></i> SOLAR</h6>
                        <h4 class="text-center">-</h4>
                        <h6 class="text-center">-</h6> <br>
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
                        <h4 class="text-center">-</h4> 
                        <h4 class="text-center">-</h4> <br>
                        <table class="table table-responsive">
                            <tr>
                                <td>CIE</td>
                                <td>{{ round($arr['CIE']->value, 2) }} {{ $arr['CIE']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CEB (161kV)</td>
                                <td>{{ round($arr['CEB(161KV)']->value, 2) }} {{ $arr['CEB(161KV)']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CEB (330kV)</td>
                                <td>{{ round($arr['CEB(330KV)']->value, 2) }} {{ $arr['CEB(330KV)']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>SONABEL</td>
                                <td>{{ round($arr['SONABEL']->value, 2) }} {{ $arr['SONABEL']->unit }}</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection