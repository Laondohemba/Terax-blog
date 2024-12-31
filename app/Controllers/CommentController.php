<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Controllers\BaseController;
use App\Models\CommentModel;
use CodeIgniter\HTTP\ResponseInterface;

class CommentController extends BaseController
{
    public function index()
    {
        //
    }

    //store comment in db
    public function store($id){
        
        $postModel = new PostModel();
        $post = $postModel->find($id);

        if(!session()->get('user_id'))
        {
            return view('view', ['post' => $post, 'error' => 'Only logged in users can make comments.']);
        }
        $rules = [
            'comment' => 'required|max_length[500]',
        ];

        if(!$this->validate($rules))
        {
            return view('view', ['post' => $post, 'validation' => $this->validator]);
        }

        $data = [
            'user_id' => session()->get('user_id'),
            'post_id' => $id,
            'comment_body' => $this->request->getVar('comment'),
        ];
        $commentModel = new CommentModel();

        if($commentModel->insert($data))
        {
            return redirect()->to('posts/view/' . $post['id'])->with('success', 'Comment created successfully.');
        }
        else{
            return view('view', ['post' => $post, 'error' => 'Sorry! Unable to save comment']);
        }
    }
}
