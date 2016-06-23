<?php

/**
 * @param null $title
 * @param null $message
 * @return \Illuminate\Foundation\Application|mixed
 */

    function flash($title = null, $message = null)
    {
        $flash = app('DEVAPP\Http\Flash');

        if(func_num_args() == 0)
        {
            return $flash;
        }

        return $flash->info($title ,$message);
    }