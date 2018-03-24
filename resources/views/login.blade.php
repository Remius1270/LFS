@extends('partials.head')

<body class="login">
  <div class="col-lg-4 center">
    <div class="card ">
      <div class="card-header">
        <h5 class="card-category">Lightning Fast Scrim</h5>
        <h4 class="card-title login-card-category">Login</h4>
      </div>
      <div class="card-body">
        <div class="col-sm-12">
          <form action="login" method="post">
            {{ csrf_field() }}
            <div class="form-group login-form">
              <input type="email" value="" placeholder="email" class="form-control" name="email">
              <hr/>
              <input type="password" value="" placeholder="password" class="form-control" name="password">
              <hr/>
              <input type="submit" class="btn btn-primary btn-round" value="Login">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
      <div class="background-video">

      </div>
    </body>
