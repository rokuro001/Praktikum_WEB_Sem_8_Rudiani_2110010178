@extends('adminlte::page')

@section('title', 'Grafik Frekuensi Lokasi')
@section('plugins.Chartjs', true)

@section('content_header')
    <h1 class="m-0 text-dark">Grafik Frekuensi Lokasi</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><strong>Grafik Jumlah Data per Lokasi</strong></h2>
            </div>
            <div class="card-body">
                <div style="width: 80%; margin: 0px auto;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            // Pastikan Anda memiliki route ini di web.php
            url: "{{ route('get.grafik.lokasi') }}",
            success: function (response) {
                // Mengambil NAMA LOKASI untuk label
                var labels = response.data.map(function (e) {
                    return e.nama_lokasi;
                });

                // Mengambil JUMLAH (COUNT) untuk setiap lokasi
                var data = response.data.map(function (e) {
                    // Backend harus mengirimkan field bernama 'jumlah'
                    return e.id;
                });

                var ctx = $('#myChart');
                var config = {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            // Judul legenda grafik
                            label: 'Jumlah Item per Lokasi',
                            data: data,
                            backgroundColor: 'rgba(255, 99, 132, 0.8)', // Warna Merah Muda
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'y', // Membuat bar chart menjadi horizontal (opsional, tapi bagus untuk nama lokasi yang panjang)
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                display: true
                            }
                        }
                    }
                };

                var chart = new Chart(ctx, config);
            },
            error: function (xhr) {
                console.error("Gagal mengambil data grafik:", xhr.responseJSON);
            }
        });
    });
</script>
@endpush
