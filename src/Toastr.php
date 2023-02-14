<?php
namespace Jeybin\Toastr;

use Exception;
use Illuminate\Support\Facades\Route;

final class Toastr{
    

    protected string $success;

    protected string $error;

    protected string $warning;

    protected string $info;

    protected bool $rtl = false;

    protected bool $closeBtn;
    
    protected bool $preventDuplicates;

    protected bool $progressBar;

    protected int $timeOut = 1000;


    /**
     * @var integer
     * 
     * The HTTP response status code 302 Found is a common way of 
     * performing URL redirection. 
     * The HTTP/1.0 specification (RFC 1945) initially defined this code, 
     * and gave it the description phrase 
     * "Moved Temporarily" rather than "Found".
     */ 
    public int $redirectStatusCode = 302;

    public function __construct(){
        $this->timeOut = config('toastr-config.timeout');
        $this->closeBtn = config('toastr-config.show_close_btn');
        $this->progressBar = config('toastr-config.show_progress_bar');
        $this->preventDuplicates = config('toastr-config.prevent_duplicates');
        $this->redirectStatusCode = config('toastr-config.redirect_status_code');
    }

    public static function success(string $success='Success'){
        $obj = new self;
        $obj->success = $success;
        return $obj;
    }

    public static function error(string $error='error'){
        $obj = new self;
        $obj->error = $error;
        return $obj;
    }

    public static function warning(string $warning='warning'){
        $obj = new self;
        $obj->warning = $warning;
        return $obj;
    }

    public static function info(string $info='info'){
        $obj = new self;
        $obj->info = $info;
        return $obj;
    }

    public function closeBtn(bool $closeBtn){
        $this->closeBtn = $closeBtn;
        return $this;
    }

    public function progressBar(bool $progressBar){
        $this->progressBar = $progressBar;
        return $this;
    }

    public function rtl(bool $rtl){
        $this->rtl = $rtl;
        return $this;
    }

    public function preventDuplicates(bool $preventDuplicates){
        $this->preventDuplicates = $preventDuplicates;
        return $this;
    }

    public function timeOut(int $timeOut){
        $this->timeOut = $timeOut;
        return $this;
    }

    public function notify(){
       $toastr =  toastr()->closeButton($this->closeBtn)
                          ->preventDuplicates($this->preventDuplicates)
                          ->timeOut($this->timeOut)
                          ->rtl($this->rtl)
                          ->progressBar($this->progressBar);

        if(!empty($this->success)){
            $toastr->addSuccess($this->success);
        }

        if(!empty($this->error)){
            $toastr->addError($this->error);
        }

        if(!empty($this->warning)){
            $toastr->addWarning($this->warning);
        }

        if(!empty($this->info)){
            $toastr->addInfo($this->info);
        }

        return $this;

    }

    public function toast(){
        return $this->notify();
    }

    public function redirectStatusCode(int $statusCode){
        $this->redirectStatusCode = $statusCode;
        return $this;
    }

    public function redirect(string $route=''){
 
        /**
         * Generating the notifications
         */
        $this->notify();

        /**
         * If not empty route will check 
         * if the string passed is a valid url or not
         * if it is valid url will redirect to that one
         * else will take the previous url from the 
         * route and redirect to that one
         * 
         */
        $redirectUrl = (!empty($route))
                                ? ((filter_var($route, FILTER_VALIDATE_URL)) 
                                        ? $route 
                                        : (Route::has($route) 
                                            ? route($route) 
                                            : (url()->previous())))
                                : (url()->previous());


        /**
         * Redirecting to the specified url
         */
        if(!empty($redirectUrl)){
            return redirect()->to($redirectUrl,$this->redirectStatusCode);
        }

        return $this;
    }


}