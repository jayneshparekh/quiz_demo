<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_data_by_id1($tbl, $field = 0, $value = 0)
  {
    if (!empty($field)) {
      $this->db->where($field, $value);
    }
    return $this->db->get($tbl)->result_array();
  }

  public function saveAnswer($technology, $questionNumber, $answer)
  {
    $userId = $this->session->userdata('user_id');

    $this->db->where('user_id', $userId);
    $this->db->where('technology', $technology);
    $this->db->where('question_number', $questionNumber);
    $query = $this->db->get('user_answers');

    if ($query->num_rows() > 0) {
      $data = array('answer' => $answer);
      $this->db->where('user_id', $userId);
      $this->db->where('technology', $technology);
      $this->db->where('question_number', $questionNumber);
      $this->db->update('user_answers', $data);
    } else {
      $data = array(
        'user_id' => $userId,
        'technology' => $technology,
        'question_number' => $questionNumber,
        'answer' => $answer
      );
      $this->db->insert('user_answers', $data);
    }
  }

  public function calculateScore($technology)
  {
    $userId = $this->session->userdata('user_id');

    $this->db->where('technology', $technology);
    $query = $this->db->get('questions');
    $totalQuestions = $query->num_rows();

    $this->db->where('user_id', $userId);
    $this->db->where('technology', $technology);
    $query = $this->db->get('user_answers');
    $userAnswers = $query->result();

    $correctAnswers = 0;

    foreach ($userAnswers as $answer) {
      $this->db->where('id', $answer->question_number);
      $this->db->where('technology', $technology);
      $query = $this->db->get('questions');
      $question = $query->row();
      if ($question->answer === $answer->answer) {
        $correctAnswers++;
      }
    }

    return ($totalQuestions > 0) ? round(($correctAnswers / $totalQuestions) * 100) : 0;
  }

  public function saveResult($technology, $score)
  {
    $userId = $this->session->userdata('user_id');

    $this->db->where('user_id', $userId);
    $this->db->where('technology', $technology);
    $query = $this->db->get('quiz_results');

    if ($query->num_rows() > 0) {
      $data = array('score' => $score);
      $this->db->where('user_id', $userId);
      $this->db->where('technology', $technology);
      $this->db->update('quiz_results', $data);
    } else {
      $data = array(
        'user_id' => $userId,
        'technology' => $technology,
        'score' => $score
      );
      $this->db->insert('quiz_results', $data);
    }
  }

  public function restartQuiz($technology)
  {
    $userId = $this->session->userdata('user_id');

    $this->db->where('technology', $technology);
    $query = $this->db->get('questions');
    $questions = $query->result();

    $this->db->where('user_id', $userId);
    $this->db->where('technology', $technology);
    $this->db->delete('user_answers');

    foreach ($questions as $question) {
      $data = array(
        'user_id' => $userId,
        'technology' => $technology,
        'question_number' => $question->id,
        'answer' => ''
      );
      $this->db->insert('user_answers', $data);
    }
  }
}
