<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class TestController extends Controller
{
    public static function sum($a,$b){
        echo $a+$b;
        echo '<br>';
    }

    public static function another_sum(){
        $a = 50;
        $b = 50;
        $result = $a + $b;
        echo $result;
    }
}
