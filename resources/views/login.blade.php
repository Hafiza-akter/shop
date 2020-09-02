<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Bhai | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}" >
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container" style="margin-top:5%">
    <div class="col-md-3 offset-md-5 mb-3">
        <img src="{{asset('images/login.png')}}" style="width:100px"><span class="brand-text font-weight-light brand-name">এডমিন ভাই</span>
    </div>
    <div class="col-md-6 offset-md-3 ">
    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Login</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('message'))
            <p id="flashMessage" class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
        @endif
        <form class="form-horizontal" method="post" action="{{route('login')}}">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group row required">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" required class="form-control" name="email" placeholder="Email">
            </div>
            </div>
            <div class="form-group row required">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="password" required class="form-control" name="password" placeholder="Password">
            </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Sign in</button>
        </div>
        <!-- /.card-footer -->
        </form>
    </div>
    </div>
</div>
</body>
</html>