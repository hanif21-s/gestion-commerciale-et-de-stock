@include('backend.header')

	<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  		<div class="wrapper">
  			@include('backend.navbar')

  			@include('backend.sidebar')

  			    <!-- Content Wrapper. Contains page content -->
			    <div class="content-wrapper">

				    <!-- Content Header (Page header) -->
				     <div class="content-header">
				        <div class="container-fluid">
				          <div class="row mb-2">
				            <div class="col-sm-6">

				              @yield('button')
				            </div><!-- /.col -->

				            <div class="col-sm-6">
				              <ol class="breadcrumb float-sm-right">

				                <li class="breadcrumb-item"><a href="">Home</a></li>
				                <li class="breadcrumb-item active">@yield('page')</li>
				              </ol>
				            </div><!-- /.col -->

				          </div><!-- /.row -->
				        </div><!-- /.container-fluid -->
				    </div>
				    <!-- /.content-header -->

				    <!-- Main content -->
      				<section class="content">
	      				<div class="container-fluid">
	      					@yield('content')
	      				</div><!--/. container-fluid -->
					</section>
					<!-- /.content -->



				</div>
			    <!-- /.content-wrapper -->

			@include('backend.footerCopyright')

		</div>

@include('backend.footer')
@yield('custum_js')