<?php

require_once "bdd.php";

class tweet {

    public function addCollection() {
        $request = Mydatabase::$db->prepare("INSERT INTO collection VALUES()");
        $request->execute();
        return MyDatabase::$db->lastInsertId();
    }
    public function insertImageAssets($path) {
        $request = MyDatabase::$db->prepare('INSERT INTO asset(path) VALUES(:path)');
        $request->execute(array(
            'path' => $path
        ));
        return MyDatabase::$db->lastInsertId();
    }
    public function imageTreatment($files, $idCollection) {
        $tmp_arr = [];
        $folder = "../../assets/img/collection/" . $idCollection . "/";
        if(!is_dir($folder)) {
            mkdir($folder,0777, true);
        }
        $uploads_dir = $folder;
        foreach($files['name'] as $key => $value) {
            $tmp_name = $files['tmp_name'][$key];
            $path = $uploads_dir . $value;
            move_uploaded_file($tmp_name, $path);
            $id_of_assets = $this->insertImageAssets($path);
            array_push($tmp_arr, $id_of_assets);

        }
        return $tmp_arr;
    }

    public function addImagesCollection($imageIdArray, $idCollection) {
        foreach($imageIdArray as $idAsset) {
            $request = MyDatabase::$db->prepare('INSERT INTO asset_collection(id_asset, id_collection) VALUES(:asset, :collection)');
            $request->execute(array(
                "asset" => $idAsset,
                "collection" => $idCollection
            ));
        }
    }
    


    //creation tweet text

    public function crea_tweet ($id, $text_content, $collection = null) {
        if($collection != null) {
            $id_collection = $collection;
        } else {
            $id_collection = null;
        }
        $request = Mydatabase::$db->prepare("INSERT INTO tweet (content, id_user, id_collection) VALUES (:content, :id_user, :id_collection)");
        return $request->execute(array(
            "content" => $text_content,
            "id_user" => $id,
            "id_collection" => $id_collection
        ));
    }
    public function reTweet($id_tweet, $id_user) {
        $request = Mydatabase::$db->prepare("INSERT INTO retweet (id_tweet, id_user) VALUES (:id_tweet, :id_user)");
        return $request->execute(array(
            "id_tweet" => $id_tweet,
            "id_user" => $id_user
        ));
    }


    //section recherche des tweet
    public function searchTweets($id = null) {
        if($id != null) {
            $whereId = "WHERE user.id = " . $id;
        } else {
            $whereId = "";
        }
        $request = MyDatabase::$db->prepare("SELECT tweet.id as 'TweetId', user.id as 'UserId', display_name, username, content, creation_date, path FROM tweet INNER JOIN user ON tweet.id_user = user.id LEFT JOIN collection ON tweet.id_collection = collection.id LEFT JOIN asset_collection ON collection.id = asset_collection.id_collection LEFT JOIN asset ON asset_collection.id_asset = asset.id " . $whereId . " GROUP BY tweet.id ORDER BY tweet.id DESC");
        $request->execute();
        return $result = $request->fetchAll();
    }

    public function profilPicarr($id = null) {
        $whereId = "";
        $request = MyDatabase::$db->prepare("SELECT tweet.id as 'TweetId', user.id as 'UserId', display_name, username, content, creation_date, path AS 'profilpic' FROM tweet INNER JOIN user ON tweet.id_user = user.id INNER JOIN asset ON user.profile_pic = asset.id " . $whereId . " GROUP BY tweet.id ORDER BY tweet.id DESC");
        $request->execute();
        return $result = $request->fetchAll();
    }

    public function searchReTweets($id = null) {
        if($id != null) {
            $whereId = "WHERE user.id = " . $id;
        } else {
            $whereId = "";
        }
        $request = MyDatabase::$db->prepare("SELECT retweet.id as 'RetweetId', user.id as 'UserId', display_name, username,  retweet.creation_date FROM user INNER JOIN retweet ON user.id = retweet.id_user " . $whereId . " ORDER BY retweet.id DESC");
        $request->execute();
        return $result = $request->fetchAll();
    }


    public function searchByHashtag($hashtag) {
        // $hashtag = "%#" . $hashtag;
        $request = MyDatabase::$db->prepare("SELECT user.id as 'UserId', display_name, username, tweet.content as 'content', path FROM tweet INNER JOIN user ON tweet.id_user = user.id INNER JOIN hashtag ON tweet.id = hashtag.id_tweet LEFT JOIN collection ON tweet.id_collection = collection.id LEFT JOIN asset_collection ON collection.id = asset_collection.id_collection LEFT JOIN asset ON asset_collection.id_asset = asset.id WHERE hashtag.content LIKE :hashtag GROUP BY tweet.id ORDER BY tweet.id DESC");
        $request->execute(array(
            'hashtag' => $hashtag
        ));
        return $result = $request->fetchAll();
    }


    public function lastTweetId($id = null) {
        if($id != null) {
            $whereId = "WHERE user.id = " . $id;
        } else {
            $whereId = "";
        }
        $request = MyDatabase::$db->prepare("SELECT tweet.id FROM tweet INNER JOIN user ON tweet.id_user = user.id " . $whereId . "ORDER BY tweet.id DESC LIMIT 1");
        $request->execute();
        return $result= $request->fetch();
    }


    // recherche hashtag

    public function InsertHashtag($id_tweet, $text) {
        $hash = "#";
        $split = explode(' ', $text);
        $insert_hash = "";

        for($i=0; $i < count($split); $i++) {
            if(substr($split[$i], 0, 1) === $hash) {
                $insert_hash = $split[$i];
            }
        }
        if(!empty($insert_hash)) {
            $request = MyDatabase::$db->prepare("INSERT INTO hashtag (id_tweet, content) VALUES (:id_tweet, :content)");
            return $request->execute(array(
                'id_tweet' => $id_tweet,
                'content' => $insert_hash
            ));
        } else {
            return true;
        }
    }

}