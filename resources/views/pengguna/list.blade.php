@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div class="bg-white rounded shadow p-4">
  <div class="container">
    <button
      class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4"
      onclick="window.location.href='{{ url('pengguna/tambah') }}'"
    >Tambah</button>
    <table id="example" class="table-auto w-full border border-gray-200 rounded-lg shadow-md">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">No</th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Email</th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Nama Lengkap</th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

@endsection


@section('script')
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
var table
$(document).ready(function () {
  table = $('#example').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: `{{ url('/pengguna/search') }}`,
      type: "post",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    },
    columns: [
      {
        data: null,
        sortable: false,
        searchable: false,
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1
        }
      },
      {
        data: 'user_email',
        sortable: false,
        searchable: false,
      },
      {
        data: 'user_fullname',
        sortable: false,
        searchable: false,
      },
      {
				data: "user_id",
        sortable: false,
        searchable: false,
				render: function(data, type, full, meta) {
					var str = '';
					str += '<button onclick="handleEdit('+data+')" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"> Edit </button>&nbsp';
					str += '<button onclick="handleDelete('+data+')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"> Delete </button>';
					return str;
				}
			},
    ]
  });
});

function handleDelete(id) {
  $.ajax({
      url: `{{ url('pengguna/remove') }}/` + id,
      type: "delete",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function ({result, error}) {

        if (result) {
          table.ajax.reload();
        }

        if (error) {
          alert(error);
        }
      },
      error: function (data) {
        alert(data.responseJSON.message);
      }
    })
}

function handleEdit(id) {
  window.location.href = `{{ url('pengguna/edit') }}/${id}`
}
</script>
@endsection
