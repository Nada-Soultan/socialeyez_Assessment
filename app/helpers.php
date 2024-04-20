<?php
use Illuminate\Support\Carbon;



// alert success
if (!function_exists('alertSuccess')) {
    function alertSuccess($success)
    {
       
            
            session()->flash('success', $success);
    }
}


// alert error
if (!function_exists('alertError')) {
    function alertError($error)
    {
    
        
            session()->flash('error', $error);
    }
}

// calculate date
if (!function_exists('interval')) {
    function interval($old)
    {
        $date = Carbon::now();
        return $interval = $old->diffForHumans();
    }
}
