<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-2" alt="User Image">
      </div>

      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admins.welcome')}}" class="nav-link" :focus>
            <i class="nav-icon fas fa-door-open"></i>
              <p>
                Dashboard
              </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admins.utilisateurs')}}" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Utilisateurs
            </p>
          </a>
        </li>
        @role('admin|gerant')
        <li class="nav-item">
          <a href="{{ route('admins.remises')}}" class="nav-link">
            <i class="nav-icon fab fa-resolving"></i>
            <p>
              Remises
            </p>
          </a>
        </li>
        @endrole
        <li class="nav-item">
          <a href="{{ route('admins.categories')}}" class="nav-link">
            <i class="nav-icon fab fa-cuttlefish"></i>
            <p>
              Catégories
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admins.produits')}}" class="nav-link">
            <i class="nav-icon fab fa-product-hunt"></i>
            <p>
              Produits
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admins.commandes')}}" class="nav-link">
            <i class="nav-icon fas fa-cart-arrow-down"></i>
            <p>
              Commandes
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admins.ravitaillements')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-in-alt"></i>
            <p>
              Ravitaillements
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admins.clients')}}" class="nav-link">
            <i class="nav-icon fas fa-street-view"></i>
            <p>
              Clients
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admins.fournisseurs')}}" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Fournisseurs
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admins.allfactures')}}" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>
              Factures
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admins.bilan')}}" class="nav-link">
            <i class="nav-icon fas fa-balance-scale"></i>
            <p>
              Bilan Journalier de vente
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('test')}}" class="nav-link">
            <i class="nav-icon fas fa-money-check-alt"></i>
            <p>
              Billetage
            </p>
          </a>
        </li>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
