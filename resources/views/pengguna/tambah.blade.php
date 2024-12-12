@extends('layouts.app')

@section('content')

<div class="bg-white rounded shadow p-4">
  <div class="container">
    <form id="form_users">
      <h2 class="text-base/7 font-semibold text-gray-900">Tambah Pengguna</h2>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-5">
        <div class="">
          <label for="fullname" class="block text-sm/6 font-medium text-gray-900">Nama Lengkap</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input
                type="text"
                name="fullname"
                id="fullname"
                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="janesmith"
                required
              />
            </div>
          </div>
        </div>
        <div class="">
          <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input
                type="email"
                name="email"
                id="email"
                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="janesmith@email.com"
                required
              />
            </div>
          </div>
        </div>
        <div class="">
          <label for="no_hp" class="block text-sm/6 font-medium text-gray-900">No HP</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input
                type="text"
                name="no_hp"
                id="no_hp"
                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                placeholder="No Hp"
                required
              />
            </div>
          </div>
        </div>
        <div class="">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input
                type="password"
                name="password"
                id="password"
                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                placeholder="Password"
                required
              />
            </div>
          </div>
        </div>
        <div class="">
          <label for="password-confirm" class="block text-sm/6 font-medium text-gray-900">Konfirmasi Password</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input
                type="password"
                name="confirm_password"
                id="confirm_password"
                class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                placeholder="Konfirmasi Password"
                required
              />
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center gap-x-6">
        <button type="button" class="text-sm/6 font-semibold text-gray-900" onclick="window.location.href='{{ url('/pengguna') }}'">Cancel</button>
        <button type="button" id="btn_simpan" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>

  </div>
</div>

@endsection


@section('script')

<script type="text/javascript">
$(document).ready(function () {

  $('#btn_simpan').click(function() {
    let fullname = $('#fullname').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let conf_password = $('#confirm_password').val();
    let no_hp = $('#no_hp').val();

    if (fullname <= 0 || fullname == '') {
      return alert('Fullname Tidak Boleh Kosong');
    }

    if (email <= 0 || email == '') {
      return alert('Email Tidak Boleh Kosong');
    }

    if (no_hp <= 0 || no_hp == '') {
      return alert('No Hp Tidak Boleh Kosong');
    }

    if (password <= 0 || password == '') {
      return alert('Password Tidak Boleh Kosong');
    }

    if (conf_password <= 0 || conf_password == '') {
      return alert('Konfirmasi Password Tidak Boleh Kosong');
    }

    if (password != conf_password) {
      return alert('Password dan Konfirmasi Password Tidak Sama');
    }

    $.ajax({
      url: `{{ url('/pengguna/save') }}`,
      type: "post",
      data: {
        fullname: fullname,
        email: email,
        password: password,
        no_hp: no_hp,
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function ({result, error}) {

        if (result) {
          window.location.href = `{{ url('/pengguna') }}`;
        }

        if (error) {
          alert(error);
        }
      },
      error: function (data) {
        alert(data.responseJSON.message);
      }
    })
  });
});
</script>
@endsection
