<?php
require_once "database.php";
class User{
    public static function emailStatuVerify($email){
        $db = Database::dbConnect();
        $request = $db->prepare("SELECT id_user, email_verifier, email_code_date, user_actif FROM users WHERE user_email = ?");

        try{
            $request->execute(array($email));
            $userInfo = $request->fetch(PDO::FETCH_ASSOC);
            return $userInfo;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    
    public static function genEmailCode($length) {
        $maxNumber = pow(10, $length) - 1;
        $minNumber = pow(10, $length - 1);
        $code = rand($minNumber, $maxNumber);
    
        return str_pad($code, $length, '0', STR_PAD_LEFT);
    }
    

    public static function inscription($email, $pseudo, $password){
        $return = self::emailStatuVerify($email);
        $code = self::genEmailCode(6);
        if(!empty($return)){
            return $code;
        }else{
            // $db = Database::dbConnect();
            // $request = $db->prepare("");
    
            try{
                // $request->execute();
                // $catalog = $request->fetch(PDO::FETCH_ASSOC);
                return ",cj;sdbvjhsfjhwhfhjhfkjwhfkjhfkq";
            }catch(PDOException $e){
                $e->getMessage();
            }
        }
    }
}
