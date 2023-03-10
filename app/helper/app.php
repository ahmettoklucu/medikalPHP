<?php
function controller($controllerName){
    $controllerName=strtolower($controllerName);
    return PATH.'/app/controller/'.$controllerName.'.php';
}
function view($viewName){
    $viewName=strtolower($viewName);
    return PATH.'/app/view/'.$viewName.'.php';
}
function route($index){
    global $route;
    return isset($route[$index])?$route[$index]:false;
}
function selflink($str, $options = array())
{
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true
    );
    $options = array_merge($defaults, $options);
    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y',
        // Latin symbols
        '©' => '(c)',
        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',
        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z',
        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',
        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}
function session($name){
    return isset($_SESSION[$name])?$_SESSION[$name]:null;
}
function images_control($name)
{
    $result['dosya']=null;
    $result['hata']=null;
        if ($name['name']!=null){
        if (is_uploaded_file($name['tmp_name'])){
            $gecerli_dosya_uzantilari =[
                'image/jpeg',
                'image/png',
                'image/gif'
            ];

            $gecerli_dosya_boyutu = (1024 * 1014) * 2;

            $dosya_uzantisi = $name['type'];

            if (in_array($dosya_uzantisi, $gecerli_dosya_uzantilari)){

                if ($gecerli_dosya_boyutu >= $name['size'])
                {
                    $uzanti = explode('.', $name['name']);
                    $uzanti = $uzanti[1];
                    $ad = uniqid();
                    $file=move_uploaded_file($name['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/Medical/public/upload/images/' . $ad . '.' . $uzanti);
                    if($file){
                        $result['dosya']= $ad . '.' . $uzanti;
                    }

                } else {
                    $result['hata'] = 'Yükleyeceğiniz dosya en fazla 2MB olabilir.';
                }

            } else {
                $result['hata'] = 'Yüklediğiniz dosya geçerli bir formatta değil.';
            }

        } else {
            $result['hata'] = 'Dosya yüklenirken bir sorun oluştu.';
        }

    }
    return $result;
}
function pdf_control($name)
{
    $result['dosya']=null;
    $result['hata']=null;
    if ($name['name']!=null){
        if (is_uploaded_file($name['tmp_name'])){
            $gecerli_dosya_uzantilari =[
                'application/pdf'
            ];

            $gecerli_dosya_boyutu = (1024 * 1014) * 2;

            $dosya_uzantisi = $name['type'];

            if (in_array($dosya_uzantisi, $gecerli_dosya_uzantilari)){

                if ($gecerli_dosya_boyutu >= $name['size'])
                {
                    $uzanti = explode('.', $name['name']);
                    $uzanti = $uzanti[1];
                    $ad = uniqid();
                    $file=move_uploaded_file($name['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/Medical/public/upload/cv/' . $ad . '.' . $uzanti);
                    if($file){
                        $result['dosya']= $ad . '.' . $uzanti;
                    }

                } else {
                    $result['hata'] = 'Yükleyeceğiniz dosya en fazla 2MB olabilir.';
                }

            } else {
                $result['hata'] = 'Yüklediğiniz dosya geçerli bir formatta değil.';
            }

        } else {
            $result['hata'] = 'Dosya yüklenirken bir sorun oluştu.';
        }

    }
    return $result;
}
function videos_control($name)
{
    $result['dosya']=null;
    $result['hata']=null;
    if ($name['name']!=null){
        if (is_uploaded_file($name['tmp_name'])){
            $gecerli_dosya_uzantilari =[
                'video/mp4',
            ];

            $gecerli_dosya_boyutu = (1024 * 1014) * 15;

            $dosya_uzantisi = $name['type'];

            if (in_array($dosya_uzantisi, $gecerli_dosya_uzantilari)){

                if ($gecerli_dosya_boyutu >= $name['size'])
                {
                    $uzanti = explode('.', $name['name']);
                    $uzanti = $uzanti[1];
                    $ad = uniqid();
                    $file=move_uploaded_file($name['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/Medical/public/upload/images/' . $ad . '.' . $uzanti);
                    if($file){
                        $result['dosya']= $ad . '.' . $uzanti;
                    }

                } else {
                    $result['hata'] = 'video dosya boyutu en fazla 15MB olabilir.';
                }

            } else {
                $result['hata'] = 'Yüklediğiniz dosya geçerli bir formatta değil.';
            }

        } else {
            $result['hata'] = 'Dosya yüklenirken bir sorun oluştu.';
        }

    }
    if(!isset($name['dosya'])){
        $name['dosya']='';
    }
    return $result;

}
function files_error($name){
    if($name!=true){
        return $name;
    }
}
function image_delete($name)
{
    if($name!=null){
        $name=public_url('upload/images/'.$name);
        if(isset($name)){
            unlink($name);
        }
    }


}
function video_delete($name)
{
    $name=public_url('upload/videos/'.$name);
    if(isset($name)){
        unlink($name);
    }

}
    function mailsend($user_email,$user_name,$user_sure_name,$subject,$message){
    require public_url('PHPMailerAutoload');
    $mail=new PHPMailer;
    try {
        $mail=new PHPMailer(true);
        $user_name=$user_name.' '.$user_sure_name;
        if (isset($mail)) {
            $mail->isSMTP();
            $mail->Host       = 'smtp.yandex.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'nedikal2023@yandex.com';
            $mail->Password   = '_jVwvf9QbDakePk';
            $mail->SMTPSecure ='tls';
            $mail->Port       = 587;
            $mail->Charset    ='UTF-8';
            //maili gönderen
            $mail->setFrom('biyomedikal2023@gmail.com', 'Biyomedikal');
            $mail->addAddress($user_email, $user_name);
            $mail->addReplyTo('info@biyomedikal.com', 'Biyomedikal');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->send();
            if($mail){
                return $result=true;
            }
            else{
                return  $result=false;
            }
        }

    }catch (Exception $result){
        return $result->errorMessage();
    }
}