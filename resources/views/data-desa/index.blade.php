@extends('layouts.main')

@section('content')
<section class="counts section-bg">
    <div class="container">

      <div class="row my-4">
        <div class="section-title">
            <h2>Data Agama</h2>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Agama</th>
                                    <th scope="col">Penganut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataAgamas as $agama)
                                <tr>
                                    <td>{{ $agama->agama }}</td>
                                    <td>{{ $agama->penganut }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-warning">
                                <tr>
                                    <td>Total </td>
                                    <td>{{ $totalPenganut }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div>
                        <canvas id="agamaChart"></canvas>
                    </div>                          
                </div>
            </div>
        </div>
      </div>
    
      <hr>

      <div class="row my-4">
        <div class="section-title">
            <h2>Data Jenis Kelamin</h2>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataJenisKelamins as $dataJenisKelamins)
                                <tr>
                                    <td>{{ $dataJenisKelamins->jenis_kelamin }}</td>
                                    <td>{{ $dataJenisKelamins->jumlah }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-warning">
                                <tr>
                                    <td>Total </td>
                                    <td>{{ $jumlahTotal }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div>
                        <canvas id="jenisKelaminChart" style="max-height: 400px; overflow: auto;"></canvas>
                    </div>                          
                </div>
            </div>
        </div>
      </div>

      <hr>

      <div class="row my-4">
        <div class="section-title">
            <h2>Data Pekerjaan</h2>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Pekerjaan</th>
                                    <th scope="col">jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pekerjaans as $pekerjaan)
                                <tr>
                                    <td>{{ $pekerjaan->pekerjaan }}</td>
                                    <td>{{ $pekerjaan->jumlah }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-warning">
                                <tr>
                                    <td>Total </td>
                                    <td>{{ $totalPekerjaan }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div>
                        <canvas id="pekerjaanChart" style="max-height: 400px; overflow: auto;"></canvas>
                    </div>                          
                </div>
            </div>
        </div>
      </div>
    
      
    </div>
  </section>
  

  <script>
    const ctxAgama = document.getElementById('agamaChart');
    
    const labels = {!! $labels !!};
    const dataPenganut = {!! $dataPenganut !!};
    
    new Chart(ctxAgama, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Penganut Agama',
          data: dataPenganut,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  
  <script>
    const ctxJenisKelamin = document.getElementById('jenisKelaminChart');
    const labelsJenisKelamin = {!! $labelsJenisKelamin !!};
    const jumlah = {!! $jumlah !!};

    new Chart(ctxJenisKelamin, {
        type: 'pie', 
        data: {
            labels: labelsJenisKelamin,
            datasets: [{
                label: 'Jumlah Jenis Kelamin',
                data: jumlah,
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',
                ],
                hoverOffset: 4
            }]
        }
    });
</script>

<script>
    const ctxPekerjaan = document.getElementById('pekerjaanChart');
    
    const labelPekerjaan  = {!! $labelPekerjaan !!};
    const dataPekerjaan   = {!! $jumlahPekerjaan !!};

    new Chart(ctxPekerjaan, {
        type: 'polarArea',
        data: {
            labels: labelPekerjaan,
            datasets: [{
                label: 'Jumlah Pekerjaan',
                data: dataPekerjaan,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(54, 162, 235)'
                ],
                hoverOffset: 4
            }]
        }
    });
</script>

  
@endsection