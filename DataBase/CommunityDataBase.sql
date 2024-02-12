

CREATE DATABASE IF NOT EXISTS CommunityDataBase;

USE CommunityDataBase;

CREATE TABLE IF NOT EXISTS utenti(
    username VARCHAR(30) PRIMARY KEY NOT NULL,
    email  VARCHAR(30) NOT NULL,
    password  VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS documents(
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    tag ENUM('space', 'it', 'neuroscience'),
    title  VARCHAR(30) NOT NULL,
    username  VARCHAR(30) NOT NULL,
    path  VARCHAR(30) NOT NULL,
    content VARCHAR(30) NOT NULL,
    FOREIGN KEY (username) REFERENCES utenti(username)

);