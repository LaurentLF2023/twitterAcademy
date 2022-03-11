DROP DATABASE IF EXISTS tweet_academy;

CREATE DATABASE tweet_academy;

USE tweet_academy;

CREATE TABLE collection (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT
);

CREATE TABLE asset(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    path VARCHAR(255)
);

CREATE TABLE asset_collection(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_asset int(11) NOT NULL,
    id_collection int(11) NOT NULL,
    FOREIGN KEY (id_collection) REFERENCES collection(id),
    FOREIGN KEY (id_asset) REFERENCES asset(id)
);

CREATE TABLE user(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    display_name VARCHAR(20) NOT NULL,
    username VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(320) UNIQUE NOT NULL,
    telephone VARCHAR(42) UNIQUE,
    password VARCHAR(40) NOT NULL,
    birthdate DATETIME NOT NULL,
    inscription_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    about VARCHAR(280) DEFAULT NULL,
    firstname VARCHAR(60) NOT NULL,
    lastname VARCHAR(60) NOT NULL,
    theme BOOLEAN DEFAULT 0,
    banner INT(11) DEFAULT NULL,
    profile_pic INT(11) DEFAULT NULL,
    FOREIGN KEY (banner) REFERENCES asset(id),
    FOREIGN KEY (profile_pic) REFERENCES asset(id)
);

CREATE TABLE follow (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    is_following int(11) NOT NULL,
    is_followed int(11) NOT NULL,
    FOREIGN KEY (is_following) REFERENCES user(id),
    FOREIGN KEY (is_followed) REFERENCES user(id)
);

CREATE TABLE message (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_from int(11) NOT NULL,
    id_to int(11) NOT NULL,
    FOREIGN KEY(id_from) REFERENCES user(id),
    FOREIGN KEY(id_to) REFERENCES user(id),
    message_content text NOT NULL,
    message_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tweet (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    content VARCHAR(280) NOT NULL,
    id_user int(11) NOT NULL,
    id_response int(11) DEFAULT NULL,
    id_collection int(11) DEFAULT NULL,
    FOREIGN KEY(id_user) REFERENCES user(id),
    FOREIGN KEY(id_collection) REFERENCES collection(id)
);

CREATE TABLE retweet (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_tweet int(11) NOT NULL,
    id_user int(11) NOT NULL,
    FOREIGN KEY (id_tweet) REFERENCES tweet(id),
    FOREIGN KEY (id_tweet) REFERENCES tweet(id),
    FOREIGN KEY (id_user) REFERENCES user(id)
);

CREATE TABLE hashtag (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_tweet int(11) NOT NULL,
    content VARCHAR(280) NOT NULL,
    FOREIGN KEY (id_tweet) REFERENCES tweet(id)
);

CREATE TABLE mentions (
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_tweet int(11) NOT NULL,
    id_user int(11) NOT NULL,
    FOREIGN KEY(id_tweet) REFERENCES tweet(id),
    FOREIGN KEY(id_user) REFERENCES user(id)
);