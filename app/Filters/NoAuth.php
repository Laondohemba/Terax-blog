<?php
namespace app\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponsableInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuth implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('is_logged_in')){
            return redirect()->to('/user/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}