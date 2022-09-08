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
                                <h4 class="text-center">50.1923 Hz</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body verticalLine">
                                <h6 class="text-center">TOTAL SYSTEM GENERATION</h6>
                                <h4 class="text-center">2353.47 MW</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body verticalLine">
                                <h6 class="text-center">AKOSOMBO FREQUENCY</h6>
                                <h4 class="text-center">50.09 Hz</h4>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card-body verticalLine">
                                <h6 class="text-center">TEMA GAS PRESSURE</h6>
                                <h4 class="text-center">32.6334</h4>
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
                        <h4 class="text-center">961.306MW</h4>
                        <table class="table table-responsive">
                            <tr>
                                <td>ASOGLI GS</td>
                                <td>560.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TAPCO</td>
                                <td>330.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TICO</td>
                                <td>340.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TT1PP</td>
                                <td>126.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CENIT</td>
                                <td>126.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>TT2PP</td>
                                <td>80.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>KARPOWER</td>
                                <td>450.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>AMERI</td>
                                <td>250.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CENPOWER</td>
                                <td>368.685MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>AKSA</td>
                                <td>370.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>KTPP</td>
                                <td>250.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>AMANDI</td>
                                <td>202.034MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>BRIDGE POWER</td>
                                <td>-0.141911MW</td>
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
                                <td>1020.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>KPONG</td>
                                <td>160.0MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>BUI</td>
                                <td>333.0MW</td>
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
                        <h4 class="text-center">546.34MW</h4>
                        <table class="table table-responsive">
                            <tr>
                                <td>BUI</td>
                                <td>54MW</td>
                                <td>35MVar</td>
                            </tr>
                            <tr>
                                <td>KALEO SOLAR</td>
                                <td>54MW</td>
                                <td>35MVar</td>
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
                                <td>1.9837MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CEB (161kV)</td>
                                <td>95.8373MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>CEB (330kV)</td>
                                <td>69.2053MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                            <tr>
                                <td>SONABEL</td>
                                <td>135.655MW</td>
                                {{-- <td>35MVar</td> --}}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection