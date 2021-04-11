DROP DATABASE IF EXISTS services;
CREATE DATABASE services;
USE services;

CREATE TABLE user(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_password  VARCHAR(255) NOT NULL,
)