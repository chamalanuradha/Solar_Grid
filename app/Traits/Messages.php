<?php


namespace App\Traits;


trait Messages
{
    private $success = [
        'title' => 'Success',
        'message' => 'Successfully done!',
        'type' => 'success',
        'status' => 1
    ];

    private $danger = [
        'title' => 'Error',
        'message' => 'Something went wrong!',
        'type' => 'error',
        'status' => 1
    ];

    private $info = [
        'title' => 'Info',
        'message' => 'Something went wrong!',
        'type' => 'info',
        'status' => 1
    ];

    private $warning = [
        'title' => 'Warning',
        'message' => 'Something went wrong!',
        'type' => 'warning',
        'status' => 1
    ];

    public function successWithMessage($text){
        $this->success['message'] = $text;
        return $this->success;
    }

    public function dangerWithMessage($text){
        $this->danger['message'] = $text;
        return $this->danger;
    }

    public function infoWithMessage($text){
        $this->info['message'] = $text;
        return $this->info;
    }

    public function warningWithMessage($text){
        $this->warning['message'] = $text;
        return $this->warning;
    }

}
