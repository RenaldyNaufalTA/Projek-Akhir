@extends('layouts.main')
@section('title', 'Pengurangan Poin')
@section('content')
    <div class="row d-flex">
        <div class="card col-md-2" style="opacity: 0"></div>
        <div class="card col-md-8">
            <div class="card-header bg-success bg-gradient text-white">
                <h3 class="mt-2">
                    Jumlah Poin <b>{{ $siswa->nama }}</b> : {{ $siswa->poin }}
                </h3>
            </div>

            <div class="card-body">
                <form action="/bk/pelanggaran/kurang/{{ $siswa->id }}" method="post">
                    @csrf
                    @method('put')
                    <label for="poin"> Jumlah Poin yang Dikurangi</label>
                    <input type="number" min=0 name="poin"
                        class="form-control form-input-lg @error('poin') is-invalid @enderror" required>
                    @error('poin')
                        <div class="invalid-feedback mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="text-end">
                        <button class="btn btn-info mt-3 show_confirm" data-toggle="tooltip" title='Delete' type="submit">
                            Kurang Poin
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
