<?php

class Users extends Model{

    static function getUser($id){

        return json_decode(R::findOne("users", "id = ?", [$id]));

    }



    static function addUser($login, $password, $name, $surname, $fname, $access_level, $class = null){

        $users = R::dispense("users");
        $users->login = $login;
        $users->password = $password;
        $users->name = $name;
        $users->surname = $surname;
        $users->fname = $fname;
        $users->access_level = $access_level;
        $users->class = $class;
        return R::store($users);

    }



    static function setLogin($id, $login){

        $users = R::load("users", $id);
        $users->login = $login.$id;
        R::store($users);

    }



    static function getFullName($id){

        $data = R::load("users", $id);
        return $data->surname." ".$data->name." ".$data->fname;

    }



    static function findUser($id){

        $data = R::load("users", $id);
        return count($data) > 0;

    }



    static function isTeacher($id){

        $user = json_decode(R::findOne("users", "id = ?", [$id]));
        if($user->access_level == 2)
            return true;

        return false;

    }



    static function isStudent($id){

        $user = json_decode(R::findOne("users", "id = ?", [$id]));
        if($user->access_level == 1)
            return true;

        return false;

    }



    static function isAccount($login){

        return R::findOne("users", "login = ?", [$login]);

    }



    static function rename($id, $name, $surname, $fname){

        $users = R::load("users", $id);
        $users->name = $name;
        $users->surname = $surname;
        $users->fname = $fname;
        R::store($users);

    }


    static function edit($id, $name, $surname, $fname, $access_level, $class, $letter){

        $users = R::load("users", $id);
        $users->name = $name;
        $users->surname = $surname;
        $users->fname = $fname;
        $users->access_level = $access_level;
        $users->class = $class;
        $users->letter = $letter;
        R::store($users);

    }



    static function passwordHash($password){

        return password_hash($password, PASSWORD_BCRYPT);

    }


    static function getPassword($login){

        return R::findOne("users", "login = ?", [$login])["password"];
        
    }


    static function verifyPassword(string $password, string $currentPassword){

        return password_verify($password, $currentPassword);
    
    }



    static function generatePassword(){
		
		$chars = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
		$max = 10; 


		$size = StrLen($chars) - 1; 


		$password = null; 

		while($max--)
			$password .= $chars[rand(0,$size)];
		
		return $password;
	
	}

}