<?php

class Pages extends Controller {
    public function __construct(){
        $this -> pageModel = $this -> model('Page');
    }

    public function index() {
        $data = [
            'current' => 'Home'
        ];
        $this -> view('pages/index', $data);
    }

    public function about(){
        $data = [
            'current' => 'About'
        ];
        $this -> view('pages/about', $data);
    }

    public function contact() {
        $data = [
            'current' => 'Contact'
        ];
        $this -> view('pages/contact', $data);
    }

    public function FAQ() {
        $data = [
            'current' => 'FAQ'
        ];
        $this -> view('pages/FAQ', $data);
    }

    public function plan() {
        $data = [
            'current' => 'Plan'
        ];
        $this -> view('pages/plan', $data);
    }

    public function login() {
        // Sanitize POSt Data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'emailPhone' => trim($_POST['emailPhone']),
                'password' => trim($_POST['password']),
                // Validation
                'emailPhone_err' => '',
                'password_err' => ''
            ];

            // Validate from
            if (empty($data['emailPhone'])) {
                $data['emailPhone_err'] = 'Email Address or Phone Number is Required';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Password is Required';
            }

            if (empty($data['emailPhone_err']) && $data['password']) {
                die('Erudite');
            } else {
                // Load View
                $this -> view('pages/login', $data);
            }
        } else {
            // Init Data
            $data = [
                'emailPhone' => '',
                'password' => '',
                // Validation
                'emailPhone_err' => '',
                'password_err' => ''
            ];

            // Load view
            $this -> view('pages/login', $data);
        }
    }

    public function register() {
        // Sanitize POSt Data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // check for POST
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $data = [
                'emailPhone' => trim($_POST['emailPhone']),
                'email' => trim($_POST['email']),
                'number' => trim($_POST['number']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                // Validation
                'emailPhone_err' => '',
                'email_err' => '',
                'number_err' => '',
                'password_err' => '',
                'confirmPassword_err' => ''
            ];

            // Validate Form
            if (empty($data['emailPhone'])) {
                $data['emailPhone_err'] = 'Referral Email or Mobile Number is Required';
            }

            if (empty($data['email'])) {
                $data['email_err'] = 'Email Address is Required';
            } elseif ($this -> pageModel -> findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taking';
            }

            if (empty($data['number'])) {
                $data['number_err'] = 'Mobile Number is Required';
            } elseif ($this -> pageModel -> findUserByNumber($data['number'])) {
                $data['number_err'] = 'Mobile number already taking';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Password is Required';
            } elseif ($data['confirmPassword'] != $data['password']) {
                $data['password_err'] = "Password doesn't Match";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 character';
            }

            if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPassword_err'] = "Password doesn't Match";
            } elseif (empty($data['confirmPassword'])) {
                $data['confirmPassword_err'] = 'Confirm Password is Required';
            } elseif (strlen($data['password']) < 6) {
                $data['confirmPassword_err'] = 'Password must be at least 6 character';
            }

            if (empty($data['emailPhone_err']) && empty($data['email_err']) && empty($data['number']) && empty($data['password']) && empty($data['confirmPassword_err'])) {
                // Validated
                

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register Users
                if ($this -> pageModel -> Register($data)) {
                    redirect('pages/login');
                } else {
                    die('Something went wrong');
                }

            } else {
                // Load views
                $this -> view('pages/register', $data);
            }

        } else {
            // Init Data
            $data = [
                'emailPhone' => '',
                'email' => '',
                'number' => '',
                'password' => '',
                'confirmPassword' => '',
                // Validation
                'emailPhone_err' => '',
                'email_err' => '',
                'number_err' => '',
                'password_err' => '',
                'confirmPassword_err' => ''
            ];


            // Load view
            $this -> view('pages/register', $data);
        }
    }

    public function forget() {
        // Sanitize POSt Data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'email' => trim($_POST['email']),
                // Validation
                'email_err' => ''
            ];

            // Validate Form
            if (empty($data['email'])) {
                $data['email_err'] = 'Registered Email Address Required';
            } elseif ($this -> pageModel -> findnonUsers($data['email'])) {
                $data['email_err'] = 'Email Address not Registered';
            }

            if (empty($data['email_err'])) {
                // Validated
                die('you are a Badass');
            } else {
                // Load views
                $this -> view('pages/forget', $data);
            }
        } else {
            // Init Data
            $data = [
                'email' => '',
                // Validation
                'email_err' => ''
            ];

            // Load view
            $this -> view('pages/forget', $data);
        }
    }

    public function recover() {
        // Sanitize POSt Data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                // Validation
                'password_err' => '',
                'confirmPassword_err' => ''
            ];

            // Validate form
            if (empty($data['password'])) {
                $data['password_err'] = 'New password is required';
            } elseif ($data['password'] != $data['confirmPassword']) {
                $data['password_err'] = "New password doesn't match";
            }

            if (empty($data['confirmPassword'])) {
                $data['confirmPassword_err'] = 'New confirm password is required';
            } elseif ($data['confirmPassword'] != $data['password']) {
                $data['confirmPassword_err'] = "New confirm password doesn't match";
            }

            if (empty($data['password_err']) && empty($data['confirmPassword_err'])) {
                die('Erudite');
            } else {
                // Load views
                $this -> view('pages/recover', $data);
            }

        } else {
            // Init Data
            $data = [
                'password' => '',
                'confirmPassword' => '',
                // Validation
                'password_err' => '',
                'confirmPassword_err' => ''
            ];

            // Load view
            $this -> view('pages/recover', $data);
        }
    }

    public function terms() {
        $data = [
            'current' => 'FAQ'
        ];
        $this -> view('pages/terms', $data);
    }
}