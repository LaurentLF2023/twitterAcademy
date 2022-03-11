<?php
require_once('bdd.php');

class tchat{

    function displayFriends($id_from){

        // if($_POST['search'] ==''){
        //     return [];
        // } else if (!empty($_POST['search'])){
            $request = MyDatabase::$db->prepare(
                'SELECT user.id,
                id_from,
                id_to,
                message_content,
                message_date,
                username
                FROM user
                LEFT JOIN message
                ON message.id_from = user.id
                GROUP BY user.id
                ORDER BY user.id DESC ,
                message.id DESC');
            $request->execute(array(
                ':id' => $id_from
            ));
            return $request->fetchAll();
        }
    // }

    function activeChat($id_from, $id_to){

        $request = MyDatabase::$db->prepare(
            'SELECT 
                user.id
                id_from,
                id_to,
                message_content, 
                message_date 
                FROM user 
                LEFT JOIN message
                ON message.id_from = user.id
                WHERE id_from 
                IN (:id_from, :id_to)
                AND id_to 
                IN (:id_to, :id_from)
                ORDER BY message_date ASC'
            );
        $request->execute(array(
            ':id_from' => $id_from,
            ':id_to'   => $id_to
        ));
        return $request->fetchAll();
    }
    
    function checkLast($my_id){

        $request = MyDatabase::$db->prepare(
            'SELECT id
                FROM message
                WHERE id_from
                IN (:my_id)
                OR id_to 
                IN (:my_id)
                ORDER BY id DESC
                LIMIT 1'
            );
        $request->execute(array(
            'my_id' => $my_id,
        ));
        return $request->fetch();
    }

    function sendMessage($id_from,$id_to,$msg){
        $request = MyDatabase::$db->prepare(
            'INSERT INTO message (
                id_from,
                id_to,
                message_content)
                VALUES (
                :id_from,
                :id_to,
                :message_content)');
         return $request->execute(array(
            'id_from'           => $id_from,
            'id_to'             => $id_to,
            'message_content'  => $msg
        ));        
    }

}