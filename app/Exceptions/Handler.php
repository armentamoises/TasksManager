<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Session;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // return parent::render($request, $e);

        $error_array = (object) array(
                    'error_msg'  => $e->getMessage()
                    ,'error_file'=> $e->getFile()
                    ,'error_line'=> $e->getLine()
                    ,'error_url' => $request->getrequestUri()
                );

        if ($e instanceof \Symfony\Component\Debug\Exception\FatalErrorException) {
            //return response()->view('errors.errores', array('ErrorCode'=>'404','e'=>$arrError));
            return parent::render($request, $e);
        }   

        
        if (Session::get('user_id') != '' ){
            $view = 'errors.error';
        }
        else{
            $view = 'errors.error-no-session';  
        }

        if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return response()->view($view, array('error_code'=>'404','e'=>$error_array, 'menu'=>'', 'submenu' => ''));
        }                   
            
        if ( ! $this->isHttpException($e)) {
            return response()->view($view, array('error_code'=>'500','e'=>$error_array, 'menu'=>'', 'submenu' => ''));
        }           
        
        if ( get_class($e) =='PDOException') {
            return response()->view($view, array('error_code'=>'500','e'=>$error_array, 'menu'=>'', 'submenu' => ''));
        }
        
        
        return parent::render($request, $e); 
    }
}
