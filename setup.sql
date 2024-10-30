CREATE DATABASE dark77;

USE dark77;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
);

CREATE TABLE pages (
    page_id INT AUTO_INCREMENT PRIMARY KEY,
    page_name VARCHAR(50) NOT NULL UNIQUE,
    content TEXT NOT NULL
);

INSERT INTO users (username, password_hash) VALUES ('Dark Alzyod', PASSWORD('alzyod77'));
INSERT INTO pages (page_name, content) VALUES ('Dark_H!k!r', 'محتوى الصفحة الافتراضي هنا.');