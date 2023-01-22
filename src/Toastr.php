<?php
namespace Jeybin\Toastr;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Jeybin\Toastr\Services\StatusCodeService;

final class Toastr{
    

    public string $success;

    public string $error;

    public string $warning;

    public string $info;

    public bool $rtl = false;

    public bool $closeBtn;
    
    public bool $preventDuplicates;

    public bool $progressBar;

    public int $timeOut = 1000;


    public function __construct(){
        $this->timeOut = config('toastr-config.timeout');
        $this->closeBtn = config('toastr-config.show_close_btn');
        $this->progressBar = config('toastr-config.show_progress_bar');
        $this->preventDuplicates = config('toastr-config.prevent_duplicates');
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

    }

    public function toast(){
        $this->notify();
    }


}