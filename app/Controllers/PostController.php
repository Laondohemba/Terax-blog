<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\LikeModel;
use App\Models\PostModel;
use CodeIgniter\HTTP\ResponseInterface;

class PostController extends BaseController
{
    protected $postModel;
    public function __construct()
    {
        $this->postModel = new PostModel();
    }
    public function index()
    {
        $postModel = new PostModel();
        $posts = $postModel->orderBy('updated_at', 'DESC')->get()->getResultArray();
        return view('home', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $rules = [
            'title' => 'required|max_length[255]',
            'body' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png]'
        ];

        if (!$this->validate($rules)) {
            return view('posts/create', ['validation' => $this->validator]);
        }

        $image = $this->request->getFile('image');
        $postImage = '';
        $uploadPath = 'uploads/post_images';
        
        
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        
        if ($image->isValid() && !$image->hasMoved()) {
            $image->move($uploadPath, $image->getName()); 
            $postImage = $uploadPath . '/' . $image->getName();
        }
        

        $postModel = new PostModel();
        $postData = [
            'user_id' => session()->get('user_id'),
            'title' => $this->request->getVar('title'),
            'body' => $this->request->getVar('body'),
            'image' => $postImage,
        ];

        if ($postModel->insert($postData)) {
            return redirect()->to('/user/dashboard')->with('success', 'Post created successfully.');
        } else {
            return view('/posts/create', ['postError' => 'An error occured while creating your post']);
        }
    }

    //show complete post for admin
    public function show($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);

        return view('posts/view', ['post' => $post]);
    }
    //show complete post for users
    public function view($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);

        $commentModel = new CommentModel();
        $comments = $commentModel->select('comments.*,users.username')
                                ->join('users', 'users.id = comments.user_id')
                                ->where('comments.post_id', $id)
                                ->orderBy('comments.created_at', 'DESC')
                                ->get()
                                ->getResultArray();
        
        $likeModel = new LikeModel();
        $likes = $likeModel->where('post_id', $id)->countAllResults();

        return view('view', ['post' => $post, 'comments' => $comments, 'likes' => $likes]);
    }

    public function edit($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);
        return view('posts/edit', ['post' => $post]);
    }

    public function update($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id);
        $rules = [
            'title' => 'required|max_length[255]',
            'body' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png]',
        ];

        if (!$this->validate($rules)) {
            return view('posts/edit', ['validation' => $this->validator, 'post' => $post]);
        }
        $image = $this->request->getFile('image');
        $postImage = '';
        $uploadPath = 'uploads/post_images';
        
        
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        
        if ($image->isValid() && !$image->hasMoved()) {
            $image->move($uploadPath, $image->getName()); 
            $postImage = $uploadPath . '/' . $image->getName();
        }

        $postData = [
            'title' => $this->request->getVar('title'),
            'body' => $this->request->getVar('body'),
            'image' => $postImage,
        ];

        //check to allow only rightful owners update a post
        if ($post['user_id'] == session()->get('user_id')) {
            if ($postModel->update($id, $postData)) {
                return redirect()->to('user/dashboard')->with('success', 'Post updated successfully');
            }
        } else {
            return view('posts/edit', ['editError' => 'Post not updated. Only post owners can edit them.', 'post' => $post]);
        }
    }

    public function destroy($id)
    {
        $postModel = new PostModel();
        // $post = $postModel->find($id);
        if ($postModel->delete($id)) {
            return redirect()->to('user/dashboard')->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->to('user/dashboard')->with('error', 'Failed to delete post!');
        }
    }
}
