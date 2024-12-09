
<!-- Sidebar -->
<aside class="w-64 bg-blue-600 text-white">
  <div class="p-4 text-center font-bold text-lg">Admin Panel</div>
  <nav class="mt-4">
    <a href="#" class="block py-2 px-4 hover:bg-blue-700">Dashboard</a>
    <a href="{{ url('/pengguna') }}" class="block py-2 px-4 hover:bg-blue-700">Pengguna</a>
    <a href="#" class="block py-2 px-4 hover:bg-blue-700">Pengaturan</a>
    <form method="POST" action="{{ url('/logout') }}" class="block py-2 px-4 hover:bg-blue-700">
      @csrf
      <button type="submit" class="w-full text-left">Logout</button>
  </form>
  </nav>
</aside>
