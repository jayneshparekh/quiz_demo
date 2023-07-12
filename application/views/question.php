<!DOCTYPE html>
<html>

<head>
  <title>Quiz Question</title>
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
      <?php if ($question != null) { ?>
        <div class="card-body">
          <a href="logout">Logout</a>

          <?php if ($que_no != null) { ?>
            <h1 class="card-title text-center">Question <?php echo $que_no; ?></h1>
          <?php } ?>
          <?php if ($question['question'] != null) { ?>
            <p class="card-text"><?php echo $question['question']; ?></p>
          <?php } ?>
          <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
          <?php } ?>
          <form method="post" action="<?php echo base_url('quizController/saveAnswer'); ?>">
            <input type="hidden" name="question_number" value="<?php echo $que_no; ?>">
            <input type="hidden" name="question_id" value="<?php echo $question['id']; ?>">
            <input type="hidden" name="total_questions" value="<?php echo $totalQuestions; ?>">
            <div class="form-group">
              <div class="form-check">
                <?php if ($question['option_1'] != null) { ?>
                  <input type="radio" id="option_1" name="answer" value="<?php echo $question['option_1']; ?>" class="form-check-input">
                  <label for="option_1" class="form-check-label"><?php echo $question['option_1']; ?></label>
                <?php } else { ?>
                  <input type="radio" id="option_1" name="answer" value="" class="form-check-input">
                <?php } ?>
              </div>
              <div class="form-check">
                <?php if ($question['option_2'] != null) { ?>
                  <input type="radio" id="option_2" name="answer" value="<?php echo $question['option_2']; ?>" class="form-check-input">
                  <label for="option_2" class="form-check-label"><?php echo $question['option_2']; ?></label>
                <?php } else { ?>
                  <input type="radio" id="option_2" name="answer" value="" class="form-check-input">
                <?php } ?>
              </div>
              <div class="form-check">
                <?php if ($question['option_3'] != null) { ?>
                  <input type="radio" id="option_3" name="answer" value="<?php echo $question['option_3']; ?>" class="form-check-input">
                  <label for="option_3" class="form-check-label"><?php echo $question['option_3']; ?></label>
                <?php } else { ?>
                  <input type="radio" id="option_3" name="answer" value="" class="form-check-input">
                <?php } ?>
              </div>
              <div class="form-check">
                <?php if ($question['option_4'] != null) { ?>
                  <input type="radio" id="option_4" name="answer" value="<?php echo $question['option_4']; ?>" class="form-check-input">
                  <label for="option_4" class="form-check-label"><?php echo $question['option_4']; ?></label>
                <?php } else { ?>
                  <input type="radio" id="option_4" name="answer" value="" class="form-check-input">
                <?php } ?>
              </div>
            </div>
            <div class="text-center">
              <?php if ($que_no != 1) { ?>
                <button type="submit" name="action" value="previous" class="btn btn-primary">Previous</button>
              <?php } ?>
              <?php if ($totalQuestions != $que_no) { ?>
                <button type="submit" name="action" value="next" class="btn btn-primary">Next</button>
              <?php } else { ?>
                <button type="submit" name="action" value="next" class="btn btn-primary">Finish</button>
              <?php } ?>
              <button type="submit" name="action" value="skip" class="btn btn-primary">Skip</button>
            </div>
          </form>
        </div>
      <?php } else { ?>
        <a href="<?php echo base_url('quizController/finish'); ?>"></a>
      <?php } ?>
    </div>
  </div>
</body>

</html>