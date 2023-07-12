<!DOCTYPE html>
<html>

<head>
  <title>Technology Selection</title>
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

        <a href="quizController/logout">Logout</a>
        <h1 class="card-title text-center">Select a Technology</h1>

        <form method="post" action="<?php echo base_url('quizController/start'); ?>">
          <div class="form-group">
            <label for="technology">Technology:</label>
            <select id="technology" name="technology" class="form-control">
              <option value="HTML">HTML</option>
              <option value="CSS">CSS</option>
              <option value="JavaScript">JavaScript</option>
            </select>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Start Quiz</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>