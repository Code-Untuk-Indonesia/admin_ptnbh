<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>403 - Acces Denied</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{ asset('template-admin/favicon.ico') }}"> 
    
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('template-admin/assets/plugins/fontawesome/js/all.min.js') }}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('template-admin/assets/css/portal.css') }}">

</head> 

<body class="app app-403-page">   	
   
    <div class="container mb-5">
	    <div class="row">
		    <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
			    <div class="app-branding text-center mb-5">
		            <a class="app-logo" href="{{ url('/') }}"><img class="logo-icon me-2" src="{{ asset('template-admin/assets/images/app-logo.svg') }}" alt="logo"><span class="logo-text">PORTAL</span></a>
	
		        </div><!--//app-branding-->  
			    <div class="app-card p-5 text-center shadow-sm">
				    <h1 class="page-title mb-4">403<br><span class="font-weight-light">Access Denied</span></h1>
				    <div class="mb-4">
					    Sorry, you don't have permission to access this page.
				    </div>
				    <a class="btn app-btn-primary" href="{{ url('/dashboard') }}">Kembali ke Dashboard</a>
			    </div>
		    </div><!--//col-->
	    </div><!--//row-->
    </div><!--//container-->
   
    
    <footer class="app-footer">
	    <div class="container text-center py-3">
        <small class="copyright">Copyright by PTNBH UNTAN </small>
	       
	    </div>
    </footer><!--//app-footer-->

    <!-- Javascript -->          
    <script src="{{ asset('template-admin/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('template-admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>  
    
    

    
    
    <!-- Charts JS -->
    <script src="{{ asset('template-admin/assets/plugins/chart.js/chart.min.js') }}"></script> 
    <script src="{{ asset('template-admin/assets/js/charts-custom.js') }}"></script> 
    
    <!-- Page Specific JS -->
    <script src="{{ asset('template-admin/assets/js/app.js') }}"></script> 

</body>
</html> 
