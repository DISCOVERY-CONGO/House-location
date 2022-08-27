@extends('dealers.layout.dealer')

@section('title')
    Administrattion Commissionaire
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title page-title">Commissionnaire</h4>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                @php
                    $houses = \App\Models\House::query()
                        ->where('user_id', '=', auth()->id())
                        ->count('id');
                    $images = \App\Models\Image::query()
                        ->with('houses')
                        ->where('user_id', '=', auth()->id())
                        ->count('id')
                @endphp
                <div class="row g-gs">
                    @include('dealers.components._statistic', [
                        'username' => "Apartments",
                        'amount' => $houses
                    ])
                    @include('dealers.components._statistic', [
                       'username' => "Images",
                       'amount' => $images
                   ])

                    <div class="col-xxl-6">
                        <div class="card card-full">
                            <div class="nk-ecwg nk-ecwg8 h-100">
                                <div class="card-inner">
                                    <div class="card-title-group mb-3">
                                        <div class="card-title">
                                            <h6 class="title">Sales Statistics</h6>
                                        </div>
                                    </div>

                                    <div class="nk-ecwg8-ck">
                                        <canvas
                                                class="ecommerce-line-chart-s4 chartjs-render-monitor"
                                                id="salesStatistics"
                                                width="798"
                                                height="300"
                                                style="display: block; width: 798px; height: 200px;"
                                        ></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

    <script>
        $(function () {
            //get the pie chart canvas
            const cData = JSON.parse(`<?php echo json_encode($charts); ?>`);
            const ctx = $("#salesStatistics");
            const data = {
                labels: cData.label,
                datasets: [
                    {
                        label: "Users Count",
                        data: cData.data,
                        backgroundColor: [
                            "#DEB887",
                            "#A9A9A9",
                            "#DC143C",
                            "#F4A460",
                            "#2E8B57",
                            "#1D7A46",
                            "#CDA776",
                        ],
                        borderColor: [
                            "#CDA776",
                            "#989898",
                            "#CB252B",
                            "#E39371",
                            "#1D7A46",
                            "#F4A460",
                            "#CDA776",
                        ],
                        borderWidth: [1, 1, 1, 1, 1, 1, 1]
                    }
                ]
            };
            const options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Last Week Registered Users -  Day Wise Count",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                }
            };
            const chart1 = new Chart(ctx, {
                type: "pie",
                data: data,
                options: options
            });

        });
    </script>
@endsection
