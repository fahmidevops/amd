<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ url('/dashboard') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/documents*') ? 'active' : '' }}" href="{{ url('/dashboard/documents') }}"> {{-- /post* semua link akan aktif dibawah url post --}}
          <span data-feather="file-text" class="align-text-bottom"></span>
          Manajemen Dokumen
        </a>
      </li>
    </ul>

    @can('admin')

    @endcan

    
  </div>
</nav>