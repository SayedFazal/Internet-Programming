CREATE DATABASE voting_system;
USE voting_system;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mobile VARCHAR(15) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    photo VARCHAR(255),
    role TINYINT(1) NOT NULL,  -- 1 = Voter, 2 = Group
    status TINYINT(1) DEFAULT 0, -- 0 = Not Voted, 1 = Voted
    votes INT DEFAULT 0
);
