<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
   @if(session('fail'))
   <span class="text-danger d-flex justify-content-center mt-2">{{session('fail')}}</span>
   @endif
    
<div class="container">
        <div class="card m-4 p-4">
    <h5>Login</h5>
    <form action="{{url('login')}}" method="post">
        @csrf
  <div class="form-group mt-2">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" name="email" value="{{old('email')}}" aria-describedby="emailHelp" placeholder="Enter email">
    @error('email')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <div class="form-group mt-2">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Password">
    @error('password')
    <span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  <button type="submit" class="btn btn-outline-primary mt-4">Login</button>
    <br>
  <a href="{{url('registration')}}">Register here</a>
</form>
</div></div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>