@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Stok Barang</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/stok/create_ajax') }}')" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah Stok
            </button>
        </div>
    </div>
    <div class="card-body">
        <!-- Filter -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Filter Barang</label>
                <select class="form-control" id="filter_barang">
                    <option value="">- Semua Barang -</option>
                    @foreach($barang as $b)
                        <option value="{{ $b->barang_id }}">{{ $b->barang_nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>Filter Supplier</label>
                <select class="form-control" id="filter_supplier">
                    <option value="">- Semua Supplier -</option>
                    @foreach($supplier as $s)
                        <option value="{{ $s->supplier_id }}">{{ $s->supplier_nama }}</option>
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

        <table class="table table-bordered table-striped table-hover table-sm" id="table-stok">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Barang</th>
                    <th style="width: 150px;">Supplier</th>
                    <th style="width: 120px;">User</th>
                    <th style="width: 140px;">Tanggal</th>
                    <th style="width: 100px;" class="text-center">Jumlah</th>
                    <th style="width: 120px;">Aksi</th>
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

    var tableStok;
    $(document).ready(function() {
        tableStok = $('#table-stok').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('stok/list') }}",
                type: "POST",
                dataType: "json",
                data: function(d) {
                    d.filter_barang = $('#filter_barang').val();
                    d.filter_supplier = $('#filter_supplier').val();
                }
            },
            columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "barang.barang_nama",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "supplier.supplier_nama",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "user.username",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "stok_tanggal",
                    orderable: true,
                    searchable: false
                },
                {
                    data: "stok_jumlah",
                    className: "text-center",
                    orderable: true,
                    searchable: false
                },
                {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#filter_barang, #filter_supplier').change(function() {
            tableStok.ajax.reload();
        });
    });
</script>
@endpush
