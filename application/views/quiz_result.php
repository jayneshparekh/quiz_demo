<!DOCTYPE html>
<html>

<head>
  <title>Quiz Result</title>
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
        <h1 class="card-title text-center">Quiz Result</h1>
        <p class="card-text">Your score is <?php echo $score; ?>%</p>
        <div class="text-center">
          <a href="<?php echo base_url('quizController/restart'); ?>" class="btn btn-primary">Restart Quiz</a>
          <a href="<?php echo base_url('quizController'); ?>" class="btn btn-primary">Start New Quiz</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>