<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .min-vh-100 {
      min-height: 100vh !important;
    }
    .banner {
      background: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg') no-repeat center center/cover;
      position: relative;
    }
    .banner::after {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(255, 102, 0, 0.7); /* overlay orange */
    }
    .banner-content {
      position: relative;
      z-index: 2;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row min-vh-100">
    <!-- Left side form -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="w-75">
        <h3 class="fw-bold mb-3">Sign In</h3>
        <p class="mb-4">Enter your email and password to sign in</p>
        <form>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <div class="d-grid">
            <button class="btn btn-warning text-white fw-bold">Sign in</button>
          </div>
        </form>
        <p class="mt-3 mb-1 text-sm">
          Forgot your password? Reset it <a href="#" class="text-danger fw-bold">here</a>
        </p>
        <p class="text-sm">Don't have an account? <a href="#" class="text-warning fw-bold">Sign up</a></p>
      </div>
    </div>
    <div class="col-md-6 d-none d-md-flex banner text-white align-items-center justify-content-center">
      <div class="banner-content text-center px-4">
        <h4 class="fw-bold">"Attention is the new currency"</h4>
        <p>The more effortless the writing looks, the more effort the writer actually put into the process.</p>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>