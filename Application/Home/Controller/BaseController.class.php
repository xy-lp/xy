<?PHP
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function __construct(){
        parent::__construct();

    }

    public function system_path(){
        $web=new \Library\Web();
    } 
}
