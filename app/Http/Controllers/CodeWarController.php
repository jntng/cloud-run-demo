<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;

class CodeWarController extends Controller
{
    public function __invoke($id=0, $input=0)
    {
        switch($id) {
            case '1':
                return $this->q1($input);
            case '2':
                return $this->q2($input);
            case '3':
                return $this->q3($input);
            case '4':
                return $this->q4($input);
            default:
                return 'id not found';
        }
    }

    private function q1($input) {
        if( $input == 0 ) {
            return 0;
        }
        $ans = $input%10;
        $input = (integer)($input/10);
        while ( $input > 0 ) {
            $ans = $ans*10 + $input%10;
            $input = (integer)($input/10);
        }
        return $ans;
    }

    private function q2($input) {
        $input = (int)($input);
        if( $input === 0 ) {
            return 0;
        }
        $ans = 0;
        for( $i=1; $i<=$input; $i++ ){
            $ans += $i;
        }
        return $ans;
    }

    private function q3($input) {
        $input = (int)($input);
        if( $input === 0 ) {
            return 0;
        }
        $ans = 0;
        for( $i=1; $i<=$input; $i++ ){
            $ans += $i*$i;
        }
        return $ans;
    }

    private function q4($input) {
        $input = (int)($input);
        if( $input === 0 ) {
            return 0;
        }
        $ans = 1;
        for( $i=1; $i<=$input; $i++ ){
            $ans *= $i;
        }
        return $ans;
    }
}
