<?php
require_once "database.php";
class User{
    public static function emailStatuVerify($email, $pseudo){
        $db = Database::dbConnect();
        $request = $db->prepare("SELECT * FROM users WHERE user_email = ? OR pseudo = ?");

        try{
            $request->execute(array($email, $pseudo));
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
        $userInfo = self::emailStatuVerify($email, $pseudo);
        if(!empty($userInfo)){
            $userRetour = ['type1'];
            if($userInfo['user_email'] == $email){
                $userRetour []= 1;
            }else{
                $userRetour []= 2;
            }
            return $userRetour;
        }else{
            $userRetour = ['type2'];
            $db = Database::dbConnect();
            $request = $db->prepare("INSERT INTO users (`pseudo`, `user_email`, `password`, email_code) VALUES (?,?,?,?)");
            $code = self::genEmailCode(6);
    
            try{
                $request->execute(array($pseudo, $email, $password, $code));
                return "yes";
            }catch(PDOException $e){
                $e->getMessage();
            }
        }
    }
}
