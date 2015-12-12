<?

class BookWidget extends CWidget
{   public $datos;
    public function init()
    {
        parent::init();
        $this->datos=$_REQUEST;
        $this->datos['activo']='bookin-inactive';
        
        if(Yii::app()->params['screen']!="D"){
            $this->datos['activo']='bookin-active';    
        }
        //parametros para activar o desactivar el bookin en ciertas url 
        /*if($_SERVER['REQUEST_URI']=='/tour' || $_SERVER['REQUEST_URI']=='/transaction_denied' || $_SERVER['REQUEST_URI']=='/transaction_denied.html' || $_SERVER['REQUEST_URI']=='/transaction_error.html' || $_SERVER['REQUEST_URI']=='/transaction_error'){
        	$this->datos['activo']='bookin-inactive';
        }*/

    }

    public function run()
    {
/*        print_r($this->datos['activo']);
        exit();*/
        return $this->render('bookin',array('datos'=>$this->datos));
    }
}
?>