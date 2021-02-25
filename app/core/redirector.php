<?php

namespace PROJECT\CORE;

trait redirector {
    
    public function redirect($path)
    {
        session_write_close();
        header("location: \\".$path);
        exit();
    }
}
