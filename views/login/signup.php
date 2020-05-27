<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <title>webmail</title>
  <link rel="shortcut icon" href="asset/images/icons/logo.png" />
  <link rel="stylesheet" type="text/css" href="asset/styles/signup.css">
  <link rel="stylesheet" type="text/css" href="asset/styles/index.css">
  <script src="asset/scripts/signup.js"></script>
</head>

<body>
  <div class='container-fluid p-0 h-100'>
    <div class='row h-100'>
      <div class='col-xl-4 col-md-4 bg-main'>
      </div>
      <form action="" class='col-sm-8 col-xl-8 col-12 col-md-8 p-5 signup-form'>
        <h2 class='font-weight-bold mb-5'>Sign up to webmail</h2>
        <div class='row h-100'>
          <div class='col-xl-6 col-md-6 form-group'>
            <label for="name" class='font-weight-bold'>Name:</label>
            <input type="name" class="form-control signup-input" id="name" onclick="onFocus()" name="name">
          </div>
          <div class='col-xl-6 col-md-6 form-group'>
            <label for="username" class='font-weight-bold'>Username:</label>
            <input type="username" class="form-control signup-input" id="username" onclick="onFocus()" name="username">
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="email" class='font-weight-bold'>Email Address:</label>
          <input type="email" class="form-control signup-input" id="email" onclick="onFocus()" name="email">
        </div>
        <div class="form-group">
          <label for="pwd" class='font-weight-bold'>Password:</label>
          <input type="password" class="signup-input form-control" id="pwd" onclick="onFocus()" name="pwd">
          <p id='error-message'></p>
        </div>
        <div class="sign-up d-flex justify-content-start">
          <p>Already a member?</p>
          <a href='' class='signup-action'>Sign In</a>
        </div>
        <button type="submit" class=" button btn btn-primary font-weight-bold">Create Account</button>
      </form>
    </div>
  </div>
</body>

</html>