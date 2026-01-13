@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Supplier</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/supplier/create_ajax') }}')" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> Tambah Data
                </button>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-sm table-striped table-hover" id="table-supplier">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var tableSupplier;
        $(document).ready(function() {
            tableSupplier = $('#table-supplier').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('supplier/list') }}",
                    type: "POST",
                    dataType: "json"
                },
                columns: [
                    { data: "supplier_id", className: "text-center", width: "5%", orderable: false, searchable: false },
                    { data: "supplier_kode", width: "10%" },
                    { data: "supplier_nama", width: "20%" },
                    { data: "supplier_alamat", width: "25%" },
                    { data: "supplier_telepon", width: "15%" },
                    { data: "supplier_email", width: "15%" },
                    { data: "aksi", className: "text-center", width: "10%", orderable: false, searchable: false }
                ]
            });

            $('#table-supplier_filter input').unbind().bind('keyup', function(e) {
                if (e.keyCode == 13) {
                    tableSupplier.search(this.value).draw();
                }
            });
        });
    </script>
@endpush
