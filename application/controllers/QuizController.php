<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QuizController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('quiz_model');
    }

    public function index()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }

        $this->load->view('technology_selection');
    }

    public function start()
    {
        $technology = $this->input->post('technology');
        $this->session->set_userdata('technology', $technology);
        $this->question(1);
    }

    public function question($questionNumber)
    {
        $technology = $this->session->userdata('technology');

        $fetchAllQuestions = $this->quiz_model->get_data_by_id1("questions", 'technology', $technology);

        $totalRecord = sizeof($fetchAllQuestions);

        $data['question'] = $fetchAllQuestions[(int)$questionNumber - 1];
        $data['que_no'] = $questionNumber;
        $data['totalQuestions'] = $totalRecord;

        $this->load->view('question', $data);
    }

    public function saveAnswer()
    {
        $technology = $this->session->userdata('technology');
        $questionId = (int)$this->input->post('question_id');
        $questionNumber = (int)$this->input->post('question_number');
        $totalQuestions = (int)$this->input->post('total_questions');

        $answer = $this->input->post('answer');
        $action = $this->input->post('action');

        if ($action == 'previous') {
            $previousQuestionNumber = $questionNumber - 1;

            $this->question($previousQuestionNumber);
        } elseif ($action == 'next') {
            if ($answer != "") {
                $this->quiz_model->saveAnswer($technology, $questionId, $answer);

                if ($totalQuestions == $questionNumber) {
                    redirect('quizController/finish');
                } else {
                    $nextQuestionNumber = $questionNumber + 1;
                    $this->question($nextQuestionNumber);
                }
            } else {
                $this->session->set_flashdata('error', 'Please select an answer.');
                $this->question($questionNumber);
            }
        } elseif ($action == 'skip') {
            if ($totalQuestions == $questionNumber) {
                redirect('quizController/finish');
            } else {
                $this->quiz_model->saveAnswer($technology, $questionId, "");

                $nextQuestionNumber = $questionNumber + 1;
                $this->question($nextQuestionNumber);
            }
        } else {
            $this->question(1);
        }
    }

    public function finish()
    {
        $technology = $this->session->userdata('technology');

        $score = $this->quiz_model->calculateScore($technology);
        $this->quiz_model->saveResult($technology, $score);

        $data['score'] = $score;
        $this->load->view('quiz_result', $data);
    }

    public function restart()
    {
        $technology = $this->session->userdata('technology');

        $this->quiz_model->restartQuiz($technology);
        $this->question(1);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . "auth");
    }
}
