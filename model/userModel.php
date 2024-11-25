<?php
require_once "database.php";
class User{
    // public static function emailVerify($id_user){
    //     $db = Database::dbConnect();
    //     $request = $db->prepare("");

    //     try{
    //         $request->execute();
    //         $catalog = $request->fetch(PDO::FETCH_ASSOC);
    //         return $catalog;
    //     }catch(PDOException $e){
    //         $e->getMessage();
    //     }
    // }
    public static function inscription($email, $password, $pseudo){
        $db = Database::dbConnect();
        $request = $db->prepare("");

        try{
            $request->execute();
            $catalog = $request->fetch(PDO::FETCH_ASSOC);
            return $catalog;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
}
