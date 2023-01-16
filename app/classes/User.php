<?php
class User
{
    public static function login($data)
    {
        $_SESSION['user_id']=$data['user_id'];
        $_SESSION['user_name']=$data['user_name'];
        $_SESSION['user_sure_name']=$data['user_sure_name'];
        $_SESSION['user_email']=$data['user_email'];
        $_SESSION['user_role_id']=$data['user_role_id'];
    }
    public static function UserExist($user_email)
    {
        global $db;
        $query=$db->prepare('SELECT * FROM users WHERE user_email=?');
        $query->execute([
            $user_email,
        ]);
         return $query->fetch(PDO::FETCH_ASSOC);

    }
    public static function  Register($data)
    {
        global $db;
        $query=$db->prepare("INSERT INTO users SET 
                                                user_name= ? ,
                                                user_sure_name= ? ,
                                                user_email = ? ,
                                                user_password=?,
                                                user_url= ? ,
                                                user_role_id=?,
                                                user_code=?");
        return $query->execute($data);
    }
}