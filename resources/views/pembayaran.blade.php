@extends('layout.main')

@section('container')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Tanggal</td>
                            <td colspan="2">: {{ date_format($pendaftaran->created_at, 'd, M Y') }}</td>
                        </tr>
                        <tr>
                            <td>Nama Pasien</td>
                            <td colspan="2">: {{ $pendaftaran->pasien->nama_pasien }}</td>
                        </tr>
                        <tr>
                            <td>Tindakan Terapi</td>
                            <td>
                                <ul>
                                    @foreach ($pendaftaran->terapi as $terapi)
                                        <li>{{ $terapi->nama_terapi }}</li>    
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-end">: {{ $totalTerapi }}</td>
                        </tr>
                        <tr>
                            <td>Obat Herbal</td>
                            <td>
                                <ul>
                                    @foreach ($pendaftaran->obat as $obat)
                                        <li>{{ $obat->nama_obat }}</li>    
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-end">: {{ $totalObat }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><span class="d-inline-block" style="width: 96%; border: 1px solid black"></span>+</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td colspan="2" class="text-end">{{ $totalTerapi + $totalObat }}</td>
                        </tr>
                    </tbody>
                </table>

                <button class="btn btn-primary" id="printButton">print</button>
                <a class="btn btn-success" href="/pembayaran/selesai/{{ $pendaftaran->id }}">Selesai</a>
            </div>
        </div>
    </div>

    <script>
        const print = document.getElementById('printButton');

        print.addEventListener('click', function(){
            window.print();
        });
    </script>
@endsection