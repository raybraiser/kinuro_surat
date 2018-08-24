<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('periode_mulai'))
{
    function periode_mulai($thn_mulai)
    {
        for ($i=1900; $i < 2100; $i++) { 
            $values[] = $i;
        }

        $d = array_search($thn_mulai, $values);
        $xxx = $values[$d];

        for ($i=1900; $i < 2100; $i++) { 
            if ($i == $xxx)
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
    }   
}

if ( ! function_exists('periode_akhir'))
{
    function periode_akhir($thn_akhir)
    {
        for ($i=1900; $i < 2100; $i++) { 
            $values[] = $i;
        }

        $d = array_search($thn_akhir, $values);
        $xxx = $values[$d];

        for ($i=1900; $i < 2100; $i++) { 
            if ($i == $xxx)
                echo '<option value="'.$i.'" selected>'.$i.'</option>';
            else
                echo '<option value="'.$i.'">'.$i.'</option>';
        }
    }   
}

if ( ! function_exists('periode'))
{
    function periode()
    {
        for ($i=1900; $i < 2100; $i++) { 
            echo '<option value="'.$i.'">'.$i.'</option>';
        }
    }   
}
