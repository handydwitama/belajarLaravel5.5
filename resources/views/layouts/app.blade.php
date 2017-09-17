<html>
    <head>
        <title>Laravel 5.5</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
    	@yield('header')
    	<div class="container-fluid text-center">    
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    @yield('leftbar')
                </div>
                	
            	<div class="col-sm-8 text-left"> 
                    @include('temp.error_message')
            		@yield('content')
    			</div>

    			<div class="col-sm-2 sidenav">
    				@yield('rightbar')
                </div>
            </div>
        </div>         
        @include('temp.footer')

    </body>
</html>