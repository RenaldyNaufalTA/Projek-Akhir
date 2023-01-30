@extends('layouts.main')
@section('title', 'Penanganan')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow px-0">
            <div class="card-header bg-gradient bg-danger">
                <h3 class="fw-bolder mt-2 text-white">
                    Penanganan
                </h3>
            </div>
            <div class="card-body">
                <table id="table_data_user" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Tindak Lanjut</th>
                            <th>Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penanganan as $tindak)
                            <tr>
                                <td scope="row">
                                    {{ ($penanganan->currentpage() - 1) * $penanganan->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $tindak->siswa->nama }}</td>
                                <td>{{ $tindak->siswa->kelas->nama_kelas }}</td>
                                <td>{{ $tindak->tindak_lanjut }}</td>
                                <td>
                                    @if ($tindak->konfirmasi == 0)
                                        <form action="/penanganan/{{ $tindak->id }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm" disabled>Konfirm</button>
                                        </form>
                                    @else
                                        <button class="btn btn-secondary btn-sm" disabled>{{$tindak->updated_at->format('d-m-Y')}}</button> 
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#table_data_user').DataTable({
                pagingType: 'simple_numbers',
                responsive: true,
                processing: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json",
                    paginate: {
                        first: '«',
                        previous: '‹',
                        next: '›',
                        last: '»'
                    },
                    aria: {
                        paginate: {
                            first: 'First',
                            previous: 'Previous',
                            next: 'Next',
                            last: 'Last'
                        }
                    },
                },
                "columnDefs": [{
                        "orderable": false,
                        "targets": 1
                    },
                    {
                        "orderable": false,
                        "targets": 3
                    },
                    {
                        "orderable": false,
                        "targets": 4
                    },
                ],
                "pageLength": 10
            });
        });
    </script>
@endpush
