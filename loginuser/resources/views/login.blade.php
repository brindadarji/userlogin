<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->   
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <h4 style="margin-top:20px;">Login</h4>
                <form action="{{route('login_user')}}" method="post">
                @if(Session::has('success'))
                    <div class=" alert alert-success">{{session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class=" alert alert-danger">{{session::get('fail')}}</div>
                @endif
                @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="">
                        <span class="text-danger">@error ('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="">
                        <span class="text-danger">@error ('password') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit" style="margin-top:20px;">Login</button>
                    </div>
                    <a href="registration" style="margin-top:20px;">Don't have an Account? Register</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>