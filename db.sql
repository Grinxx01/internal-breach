CREATE DATABASE ctf_challenge;
USE ctf_challenge;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user'
);

CREATE TABLE secrets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    secret_key VARCHAR(100) NOT NULL
);

-- Data Awal
INSERT INTO users (username, password, role) VALUES 
('admin', 'SuperSecretPassword2026!', 'admin'),
('staff_it', 'p@ssword123', 'user');

INSERT INTO secrets (secret_key) VALUES ('CTF{SQL_InjeCTion_Is_STill_Aliv3}');