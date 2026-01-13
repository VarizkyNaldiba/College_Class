@extends('layouts.template')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">
                <i class="fas fa-boxes text-primary me-2"></i>Daftar Barang
            </h3>
            <div class="btn-group">
                <button onclick="modalAction('{{ url('/barang/create_ajax') }}')" class="btn btn-sm btn-success">
                    <i class="fas fa-plus me-1"></i> Tambah
                </button>
                <button onclick="modalAction('{{ url('/barang/import') }}')" class="btn btn-sm btn-info">
                    <i class="fas fa-upload me-1"></i> Import
                </button>
                <a href="{{ url('/barang/export_excel') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-file-excel me-1"></i> Excel
                </a>
                <a href="{{ url('/barang/export_pdf') }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-file-pdf me-1"></i> PDF
                </a>
            </div>
        </div>

        <div class="card-body">
            <!-- Filter Data -->
            <div class="bg-light rounded p-3 mb-3">
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-filter me-1"></i>Filter Kategori
                        </label>
                        <select name="filter_kategori" class="form-select filter_kategori">
                            <option value="">Semua Kategori</option>
                            @foreach ($kategori as $l)
                                <option value="{{ $l->kategori_id }}">{{ $l->kategori_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Alert Success/Error -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped" id="table-barang">
                    <thead class="table-light">
                        <tr>
                            <th width="40">No</th>
                            <th width="100">Kode</th>
                            <th>Nama Barang</th>
                            <th width="120">Harga Beli</th>
                            <th width="120">Harga Jual</th>
                            <th width="80">Margin</th>
                            <th width="120">Kategori</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"></div>
@endsection


@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                var modal = new bootstrap.Modal(document.getElementById('myModal'));
                modal.show();
            });
        }

        var tableBarang;
        $(document).ready(function() {
            tableBarang = $('#table-barang').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('barang/list') }}",
                    type: "POST",
                    dataType: "json",
                    data: function(d) {
                        d.filter_kategori = $('.filter_kategori').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "barang_kode",
                        render: function(data) {
                            return '<code class="text-primary">' + data + '</code>';
                        }
                    },
                    {
                        data: "barang_nama",
                        render: function(data) {
                            return '<strong>' + data + '</strong>';
                        }
                    },
                    {
                        data: "harga_beli",
                        className: "text-end",
                        render: function(data) {
                            return '<span class="text-success">Rp ' + new Intl.NumberFormat('id-ID').format(data) + '</span>';
                        }
                    },
                    {
                        data: "harga_jual",
                        className: "text-end",
                        render: function(data) {
                            return '<span class="text-primary fw-bold">Rp ' + new Intl.NumberFormat('id-ID').format(data) + '</span>';
                        }
                    },
                    {
                        data: null,
                        className: "text-center",
                        render: function(data) {
                            var margin = data.margin_persen || 0;
                            var badgeClass = margin > 20 ? 'bg-success' : margin > 10 ? 'bg-warning' : 'bg-secondary';
                            return '<span class="badge ' + badgeClass + '">' + parseFloat(margin).toFixed(2) + '%</span>';
                        }
                    },
                    {
                        data: "kategori.kategori_nama",
                        render: function(data) {
                            return '<span class="badge bg-info">' + data + '</span>';
                        }
                    },
                    {
                        data: "aksi",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }
                ],
                language: {
                    processing: '<i class="fas fa-spinner fa-spin fa-2x"></i>',
                    emptyTable: '<i class="fas fa-inbox fa-2x text-muted mb-2"></i><br>Tidak ada data',
                    zeroRecords: '<i class="fas fa-search fa-2x text-muted mb-2"></i><br>Data tidak ditemukan'
                }
            });

            // Trigger search on enter
            $('#table-barang_filter input').unbind().bind('keyup', function(e) {
                if (e.keyCode == 13) {
                    tableBarang.search(this.value).draw();
                }
            });

            // Filter kategori
            $('.filter_kategori').change(function() {
                tableBarang.draw();
            });
        });
    </script>
@endpush
