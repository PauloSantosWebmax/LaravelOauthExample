<?php 

namespace App\Traits;

trait Guest
{
    public function __construct()
    {
        $this->middleware('guest');
    }
}
