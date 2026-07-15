CREATE DATABASE peoplesync;

USE peoplesync;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    role ENUM('superadmin','supervisor','karyawan') NOT NULL
);


INSERT INTO users 
(username, password, nama, role)
VALUES

('admin', 'Admin123!', 'Administrator', 'superadmin'),

('elizamulyawan.spv', 'elizaspv1!', 'Eliza Mulyawan Supervisor', 'supervisor'),

('elizamulyawan', 'Eliza123!', 'Eliza Mulyawan', 'karyawan');