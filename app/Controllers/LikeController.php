<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LikeModel;
use CodeIgniter\HTTP\ResponseInterface;

class LikeController extends BaseController
{
    public function index()
    {
        //
    }

    public function store($id)
    {
        $data = [
            'user_id' => session()->get('user_id'),
            'post_id' => $id,
        ]; 

        $likeModel = new LikeModel();
        $like = $likeModel->where('user_id', session()->get('user_id'))
                            ->where('post_id', $id)
                            ->get()
                            ->getRowArray();
        if($like)
        {
            $likeModel->delete($like);
            return redirect()->to('posts/view/' . $id);
        }
        else
        {
            $likeModel->insert($data);
            return redirect()->to('posts/view/' . $id);
        }
    }
}
