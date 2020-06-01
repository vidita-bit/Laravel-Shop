<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>JavasShop Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <link href="{{ url('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <link href="{{ url('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>

    <link href="{{ url('assets/css/themify-icons.css') }}" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                JavaShop Admin
            </a>
        </div>
    </div>
</nav>
<div class="wrapper">
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Sign In</strong></h3>
                    </div>

                    <div class="panel-body">
                  
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                   <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('msg'))
                    <div class="alert alert-danger">{{ session()->get('msg') }}</div>
                    @endif

                        <form method='post' action='register'>
                            
                           <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="text" placeholder="Name"
                                       class="form-control border-input">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" placeholder="Email"
                                       class="form-control border-input">
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                       class="form-control border-input">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                                       class="form-control border-input">
                            </div>
                            @csrf
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Sign Up</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</html>
