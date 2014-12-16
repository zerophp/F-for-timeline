<?php
namespace Core\Router\model;
/**
 * Valid URLs
 * /users/select/id/1/param2/val2/param3/val3 (controller=users, action=select)
 * /users/select/id/1       (controller=users, action=select)
 * /users/select            (controller=users, action=select)
 * /users                   (controller=users, action=default)
 * /                        (controller=default, action=default)
 *
 * Invalid URLs
 * /users/select/id/1/param2/val2/param3    (controller=error, action=403)
 * /users/select/id                         (controller=error, action=403)
 * /users/kaka                              (controller=error, action=404)
 * /kaka/select                             (controller=error, action=404)
 * /kaka                                    (controller=error, action=404)
 *
 * Formato del request
 * request = array ('controller'=>'',
 *                  'action'=>,
 *                  'params'=>array('param1'=>'val1',
 *                                  'parm2'=>'val2',
 *                                  ...
 *                                  ...
 *                                  )
 *                  );
 */
class parseUrl
{
    public static function parseURL()
    {
        $request = array();
        $action='';
        $controller='';
        $params=array();
    
        $data = explode('/',$_SERVER['REQUEST_URI']);
    
        if(isset($data[1]))
            $controller = $data[1];
    
        if(isset($data[2]))
            $action = $data[2];
         
    
    
        if(sizeof($data)>3)
        {
            for($a=3;$a<sizeof($data);$a+=2)
            {
                $params[$data[$a]] = $data[$a+1];
            }
        }
         
        if(sizeof($data)>3 && sizeof($data)%2==0)
        {
            $controller = 'error';
            $action = '403';
        }
    

        if($controller !='')
        {
            if(!is_file($_SERVER['DOCUMENT_ROOT'].'/../modules/Application/src/Application/controllers/'.$controller.'.php'))
            {
                $controller = 'error';
                $action = '404';
            }
        }
    
        $request = array(
            'method'=>$_SERVER['REQUEST_METHOD'],
            'controller'=>$controller,
            'action'=>$action,
            'params'=>$params
        );
        
        
         
        return $request;
    }
    
}













