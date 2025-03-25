@extends('layouts.template')

@section('content')
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">{{ $page->title }}</h3>
      <div class="card-tools">
        <a class="btn btn-sm btn-primary mt-1" href="{{ url('level/create') }}">Tambah</a>
        <button onclick="modalAction('{{ url('level/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
      </div>
    </div>
    <div class="card-body">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <!-- Filter -->
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="level_kode">Filter Level Kode:</label>
          <select class="form-control" name="level_kode" id="level_kode">
            <option value="">- Semua -</option>
            @foreach($level ?? [] as $item) 
              <option value="{{ $item->level_kode }}">{{ $item->level_nama }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <!-- Tabel Data -->
      <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
        <thead>
          <tr>
            <th>No</th>
            <th>Level Kode</th>
            <th>Level Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>

  <!-- Modal -->
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          <!-- Konten modal dari AJAX -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Form Tambah Level -->
  <div id="modal-master" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form id="form-tambah" action="{{ route('level.store_ajax') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Level</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>ID Level</label>
              <input type="text" name="level_id" id="level_id" class="form-control" required>
              <small id="error-level_id" class="error-text form-text text-danger"></small>
            </div>
            <div class="form-group">
              <label>Nama Level</label>
              <input type="text" name="level_nama" id="level_nama" class="form-control" required>
              <small id="error-level_nama" class="error-text form-text text-danger"></small>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endpush

@push('js')
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    function modalAction(url = '') {
      $('#modal-body').html('<p class="text-center">Loading...</p>');
      $('#myModal').modal('show');
      $.get(url, function(data) {
        $('#modal-body').html(data);
      });
    }

    var dataLevel;
    $(document).ready(function() {
      dataLevel = $('#table_level').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ url('level/list') }}",
          type: "POST",
          data: function(d) {
            d.level_kode = $('#level_kode').val();
            d._token = "{{ csrf_token() }}";
          }
        },
        columns: [
          { data: "DT_RowIndex", orderable: false, searchable: false },
          { data: "level_kode", orderable: true, searchable: true },
          { data: "level_nama", orderable: true, searchable: true },
          { data: "aksi", orderable: false, searchable: false }
        ]
      });

      $('#level_kode').on('change', function(){
        dataLevel.ajax.reload();
      });

      $('#form-tambah').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
          url: $(this).attr('action'),
          type: 'POST',
          data: $(this).serialize(),
          dataType: 'json',
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          beforeSend: function() {
            $('.error-text').text('');
          },
          success: function(response) {
            if (response.status) {
              $('#modal-master').modal('hide');
              Swal.fire({ icon: 'success', title: 'Berhasil!', text: response.message });
              $('#table_level').DataTable().ajax.reload(null, false);
            } else {
              $.each(response.errors, function(key, value) {
                $('#error-' + key).text(value);
              });
              Swal.fire({ icon: 'error', title: 'Terjadi Kesalahan!', text: 'Silakan periksa kembali inputan Anda.' });
            }
          },
          error: function() {
            Swal.fire({ icon: 'error', title: 'Gagal!', text: 'Terjadi kesalahan pada server.' });
          }
        });
      });
    });
  </script>
@endpush
