<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Banner -->
  <div class="bg-dark text-white text-center" 
       style="background: url('https://wallpaperaccess.com/full/171076.jpg') no-repeat center center/cover; height:250px;">
    <div class="d-flex flex-column justify-content-center h-100">
      <h1 class="fw-bold">Welcome</h1>
    </div>
  </div>

  <!-- Card Login -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow-lg mt-n5">
          <div class="card-body p-4">
            <h3 class="text-center mb-4">Sign In</h3>
            <form>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" required>
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" required>
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="d-grid">
                <button class="btn btn-dark">Login</button>
              </div>
            </form>
            <p class="mt-3 mb-0 text-center">
              Don’t have an account? <a href="#">Register</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>