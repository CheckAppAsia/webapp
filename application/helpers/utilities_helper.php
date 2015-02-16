<?php
/**
 * For Debugging Purposes
 * 
 * @author Rellmon P. Ponce de Leon <raremon@gmail.com>
 * @copyright 2013
 * @version 1.0
 * 
 * @param $data array
 * @param $exitFlag boolean
 * 
*/
if (! function_exists('debug'))
{
    function debug($msg="", $exit = false)
    {
        $today = date("Y-m-d H:i:s");

        if (is_array($msg) || is_object($msg))
        {
            echo "<hr>DEBUG ::[".$today."]<pre>\n";
            print_r($msg);
            echo "\n</pre><hr>";
        }
        else
        {
            echo "<hr>DEBUG ::[".$today."] $msg <hr>\n";
        }

        if ($exit) {
            $CI = get_instance();
            $CI->load->library('profiler');
            echo $CI->profiler->run();
            exit;
        }
    }
}

if (! function_exists('miltime'))
{
    function miltime($time)
    {
        $diff =  $time - 1200;

        if ($diff > 0 ) { $diff = strval($diff); return $diff{0}.':'.$diff{1}.$diff{2}.' PM'; }
        if ($diff < 0 ) return $time{0}.$time{1}.':'.$time{2}.$time{3}.' AM';        
        if ($diff == 0 ) return '12:00 PM';            
    }
} 