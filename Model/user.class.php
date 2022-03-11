<?php
    require_once 'bdd.php';

    class User {
        // function d'ajout user
        public function add_user_to_db ($display_name, $username, $email, $password, $birthdate, $firstname, $lastname) {
            
            $password = hash('ripemd160',"vive le projet tweet_academy" . $password);
            $request = MyDatabase::$db->prepare("INSERT INTO user(display_name, username, email, password, birthdate, firstname, lastname) VALUES(:display_name, :username, :email, :password, :birthdate, :firstname, :lastname)");
            return $request->execute(array(
                'display_name' => $display_name,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'birthdate' => $birthdate,
                'firstname' => $firstname,
                'lastname' => $lastname,
            ));
        }
        // function de check user
        public function do_email_exists($email) {
            if(!empty($email)) {
                $request = MyDatabase::$db->prepare('SELECT * FROM user WHERE email = :email');
                $request->execute(array(
                    'email' => $email
                ));
                $result = $request->fetch();
                if(!empty($result)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        public function do_user_exists($username) {
            if(!empty($username)) {
                $request = MyDatabase::$db->prepare('SELECT * FROM user WHERE username = :username');
                $request->execute(array(
                    'username' => $username
                ));
                $result = $request->fetch();
                if(!empty($result)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        public function checkAge($date) {
            $today = date("Y-m-d");
            $diff = date_diff(date_create($date), date_create($today));
            $diff = $diff->format('%y');
            if($diff >= 13) {
                return true;
            } else {
                return false;
            }
        }
        // function de check du password
        public function do_pass_match($email, $password) {
            if(!empty($email) && !empty($password)) {
                // $password = sha1($password);
                $request = MyDatabase::$db->prepare('SELECT password FROM user WHERE email = :email');
                $request->execute(array(
                    'email' => $email
                ));
                $result = $request->fetch();
                if($result["password"] == $password) {
                    return true;
                } else{
                    return false;
                }
            }
        }
        public function check_similar_pass($email, $confirm) {
            if(!empty($email) && !empty($confirm)) {
                if($email === $confirm) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        public function get_id_from_email($email){
            if(!empty($email)) {
                $request = MyDatabase::$db->prepare('SELECT id FROM user WHERE email = :email');
                $request->execute(array(
                    'email' => $email
                ));
                return $request->fetch();
           }
        }
    
        public function get_user_info($id) {
            if(isset($id)) {
                $request = MyDatabase::$db->prepare('SELECT firstname, lastname, username, YEAR(inscription_date), display_name, about, path FROM user LEFT JOIN asset ON user.profile_pic = asset.id WHERE user.id = :id');
                $request->execute(array(
                    'id' => $id
                ));
                return $request->fetchAll(); 
            }
        }

        public function updateUser($display_name, $about, $id_user) {
            $request = MyDatabase::$db->prepare("UPDATE user SET display_name = :display_name, about = :about WHERE user.id = :id_user");
            return $request->execute(array(
                "display_name" => $display_name,
                "about" => $about,
                "id_user" => $id_user
            ));
            
        }
        public function insertSingleAsset($path) {
            $request = MyDatabase::$db->prepare('INSERT INTO asset(path) VALUES(:path)');
            $request->execute(array(
                'path' => $path
            ));
            return MyDatabase::$db->lastInsertId();
        }

        public function updateProfilPic($id_user, $file) {
            $folder = "../../assets/img/profile/" . $id_user . "/";
            if(!is_dir($folder)) {
                mkdir($folder,0777, true);
            }
            $uploads_dir = $folder;
            $tmp_name = $file['tmp_name'];
            $path = $uploads_dir . $file['name'];        
            move_uploaded_file($tmp_name, $path);
            $id_image = $this->insertSingleAsset($path);
            $request = MyDatabase::$db->prepare('UPDATE user SET profile_pic = :profil WHERE user.id = :id_user');
            return $request->execute(array(
                "profil" => $id_image,
                'id_user' => $id_user
            ));
            
        }
        
        // check du password en fonction d'un email donné
        public function connexion($email,$password){

            $salt = 'vive le projet tweet_academy';

            $hashedPassword = hash('ripemd160',$salt.$password);

            $request = MyDatabase::$db->prepare('SELECT id, password FROM user WHERE email = :email');
            $request->execute(array(
                'email' => $email
            ));
            $auth = $request->fetch();
            
            $authPwd= $auth['password'];
            $idUser= $auth['id'];

            //vérif de l'égalité des password
            if(hash_equals($authPwd, $hashedPassword)){
                // retourne l'id du User pour le rentrer en $_SESSION
                return $idUser;

            }else{
                return false;
            }
        }
    }