<?php

namespace app\Controllers;

use App\Models\LikeModel;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    //show login form
    public function index()
    {
        return view('user/login');
    }

    //show register form
    public function create()
    {
        return view('user/register');
    }

    //show dashboard
    public function dashboard()
    {
        $postsModel = new PostModel();
        $userPosts = $postsModel->where('user_id', session()->get('user_id'))->orderBy('updated_at', 'DESC')->get()->getResultArray();
        
        return view('user/dashboard', ['posts' => $userPosts]);
    }

    //register user
    public function store()
    {

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'username' => [
                    'rules' => 'required|min_length[5]|max_length[100]|is_unique[users.username]',
                    'errors' => [
                        'is_unique' => 'This username is already taken!'
                    ]
                ],

                'email' => 'required|valid_email',

                'password' => [
                    'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W]).+$/]',
                    'errors' => [
                        'regex_match' => 'The password must contain at least one uppercase letter, lowercase letter, number, and a special character.'
                    ],
                ]
            ];

            if (!$this->validate($rules)) {
                return view('user/register', ['validation' => $this->validator]);
            }

            $user = new UserModel();
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            if ($user->insert($data)) {
                return redirect()->to('/login');
            } else {
                return view('/user/create', ['error' => 'An error occured while creating the account!']);
            }
        }
    }

    //login user

    public function login()
    {

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('user/login', ['validation' => $this->validator]);
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'is_logged_in' => true
            ]);
            return redirect()->to('/user/dashboard');
        }
        else{
            return view('user/login', ['loginError' => 'Username or password error! Note that passwords are case sensitive']);
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/login');
    }
}
