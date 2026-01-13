@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Penjualan</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/penjualan/create_ajax') }}')" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Transaksi
            </button>
        </div>
    </div>
    <div class="card-body">
        <!-- Filter -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Filter User</label>
                <select class="form-control" id="filter_user">
                    <option value="">- Semua User -</option>
                    @foreach($user as $u)
                        <option value="{{ $u->user_id }}">{{ $u->username }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Alert messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered table-striped table-hover table-sm" id="table-penjualan">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 120px;">Kode</th>
                    <th style="width: 140px;">Tanggal</th>
                    <th>Pembeli</th>
                    <th style="width: 120px;">User</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade animate" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
<style>
    .table th {
        white-space: nowrap;
    }
</style>
@endpush

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    var tablePenjualan;
    $(document).ready(function() {
        tablePenjualan = $('#table-penjualan').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('penjualan/list') }}",
                type: "POST",
                dataType: "json",
                data: function(d) {
                    d.filter_user = $('#filter_user').val();
                }
            },
            columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "penjualan_kode",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "penjualan_tanggal",
                    orderable: true,
                    searchable: false
                },
                {
                    data: "pembeli",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "user.username",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#filter_user').change(function() {
            tablePenjualan.ajax.reload();
        });
    });
</script>
@endpush
