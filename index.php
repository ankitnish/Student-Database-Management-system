<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Student Records Management</h1>
        <p class="col-lg-10 fs-4">Our student record management system efficiently organizes student information, facilitating seamless access and updates.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="classes/login.php" method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="roll_number" required placeholder="Username">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign In</button>
          <hr class="my-4">
          <small class="text-body-secondary">Created By - Shivam, Harshita, Niharika, Ankit, Amit, Ashish and team.</small>
        </form>
      </div>
    </div>
  </div>

  </body>
</html>