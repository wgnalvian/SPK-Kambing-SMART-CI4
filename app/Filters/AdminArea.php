<?
namespace App\Filters;


use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminArea implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
    

    if(session()->get('user')['username'] != 'Admin'){
        session()->setFlashdata('notification','Anda bukan admin dan tidak berhak masuk');
        return redirect()->back();
    }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}