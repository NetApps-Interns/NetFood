<?php

function output_json(array $msg, bool $flag, array $data = [], bool $auth = true):string 
{
    return json_encode([
                        'msg'=>$msg,
                        'flag'=> $flag, 
                        'data'=> $data,
                        'auth'=> $auth
                    ]);
};

function input_strings(string $input):string{
    return htmlentities($input, ENT_QUOTES, 'UTF-8');
}

function input_int($input):int{
    return (int)($input);
}

function input_email(string $input):string{
    return htmlentities($input, ENT_QUOTES, 'UTF-8');
}
function input_name(string $input):string{
    return htmlentities($input, ENT_QUOTES, 'UTF-8');
} 
function input_phone(string $input):string{
    return htmlentities($input, ENT_QUOTES, 'UTF-8');
}


