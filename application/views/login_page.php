<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .center-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  </style>
</head>

<body>
  <div class="container center-container">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center">Login</h1>
        <?php if (isset($error)) { ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form method="post" action="<?php echo base_url('auth/authenticate'); ?>">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>