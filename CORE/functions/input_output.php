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

function sanitizeString(string $input):string{
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


function name($name): string {
    $allowedChar = ["\-", ".", "'", " "];
    $name = sanitizeString($name);
    //Remove all non name characters
    $pattern = "/[^\w" . implode("", $allowedChar) . "]*[\d_]*/";
    $name = preg_replace($pattern, "", $name);

    if ($name){
        //Replace two or more spaces with one, trim, make lower case
        $name = strtolower(trim(preg_replace("/\s{2,}/", " ", $name)));
        //Format: Capitalize first letters of each word
        foreach ($allowedChar as $char) {
            $char = str_replace("\\", "", $char);
            $names = explode($char, $name);
            foreach ($names as $key => $val) {
                $names[$key] = ucwords($val);
            }
            $name = implode($char, $names);
        }
    }
    return $name;
}


/**
 * @param $email
 * @return false|string
 */
function email($email): string {
    $email = strtolower($email);
    $e = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($e) {
        $g = explode('@', $e);
        if (preg_match("/(gmail)+/", $g[1])){
            $g[0] = str_replace('.', '', $g[0]);
            $g[0] = explode('+', $g[0]);
            $g[0] = $g[0][0];

            $e = $g[0] . '@' . $g[1];
        }
        return $e;
    }
    return false;
}

/**
 * @param $phone
 * @param string $type
 * @param bool $acceptLandline
 * @return string
 */
function phone($phone, string $type = 'ngn', bool $acceptLandline = true): string {
    $phone = trim($phone);
    switch (strtolower($type)) {
        case 'ng':
        case 'ngn':
            $landline = '/^(707|709|804|819)(\d{7})$/';
            $landline2 = '/^(7020|7028|7029|7027)(\d{6})$/';

            $mobile = '/^(701|703|704|705|706|708|801|802|803|805|806|807|808|809|810|811|812|813|814|815|816|817|818|909|908|901|902|903|904|905|906|907|915|913|912|916)(\d{7})$/';
            $mobile2 = '/^(7020|7021|7022|7025|7026)(\d{6})$/';

            //Clean number
            $phone = preg_replace("/[-(). ]/", "", $phone);
            //Remove country code +234
            $phone = preg_replace("/^(\+)/", "", $phone);
            $phone = preg_replace("/^(234)/", "", $phone);
            //Remove leading zero (0)
            $phone = preg_replace("/^(0)/", "", $phone);
            //Test number
            if (preg_match('/^(702)/', $phone)) {
                if ($acceptLandline) {
                    return preg_match($landline2, $phone) || preg_match($mobile2, $phone) ? '+234' . $phone : false;
                }
                return preg_match($mobile2, $phone) ? '+234' . $phone : false;
            }
            if ($acceptLandline) {
                return preg_match($landline, $phone) || preg_match($mobile, $phone) ? '+234' . $phone : false;
            }
            return preg_match($mobile, $phone) ? '+234' . $phone : false;

        case 'ngland':
            $pattern = "/^((0)[129]|(3)([01]|[3-9])|(4)[1-8]|(5)[0-9]|(6)[0-9]|(7)([1-3]|[5-9])|(8)[2-9])(\d{7})$/";
            //Clean number
            $phone = preg_replace("/[-(). ]/", "", $phone);
            //Remove country code +234
            $phone = preg_replace("/^(\+)/", "", $phone);
            $phone = preg_replace("/^(234)/", "", $phone);
            //Remove leading zero (0)
            $phone = preg_replace("/^(0)/", "", $phone);

            if (preg_match('/^[129]/', $phone)) {
                return preg_match($pattern, '0' . $phone) ? '+234' . $phone : '';
            }
            return preg_match($pattern, $phone) ? '+234' . $phone : '';

        case 'uk':
            $pattern = "/^(7)(\d{9})$/";
            //Clean number
            $phone = preg_replace("/[-(). ]/", "", $phone);
            //Remove country code +44
            $phone = preg_replace("/^(\+)/", "", $phone);
            $phone = preg_replace("/^(44)/", "", $phone);
            //Remove leading zero (0)
            $phone = preg_replace("/^(0)/", "", $phone);
            //Test number
            return preg_match($pattern, $phone) ? '+44' . $phone : '';

        case 'usa':
            $pattern = '/^(\d{10})$/';
            //Clean number
            $phone = preg_replace("/[-(). ]/", "", $phone);
            //Remove country code +1
            $phone = preg_replace("/^(\+1)/", "", $phone);
            //Test number
            return preg_match($pattern, $phone) ? '+1' . $phone : '';
    }
    return '';
}

