CREATE DATABASE IF NOT EXISTS vexabank_db;
USE vexabank_db;

CREATE TABLE questionnaire (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  age INT,
  rating VARCHAR(20),
  services VARCHAR(100),
  branch VARCHAR(50),
  feedback TEXT
);

INSERT INTO questionnaire (full_name, email, age, rating, services, branch, feedback) VALUES
('Ali Hassan', 'ali@gmail.com', 25, 'Good', 'Transfers', 'Muscat', 'Good service'),
('Sara Ahmed', 'sara@gmail.com', 22, 'Excellent', 'Payments,Savings', 'Sohar', 'Very satisfied'),
('Omar Said', 'omar@gmail.com', 30, 'Average', 'Transfers', 'Salalah', 'Needs improvement'),
('Nora Salem', 'nora@gmail.com', 27, 'Good', 'Savings', 'Muscat', 'Easy to use'),
('Fatema Ali', 'fatema@gmail.com', 24, 'Excellent', 'Payments', 'Sohar', 'Great experience');

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  role VARCHAR(20)
);

INSERT INTO users (username, email, password, role) VALUES
('sumaiya', 'sumaiya@gmail.com', '123456', 'customer'),
('fatema', 'fatema@gmail.com', '123456', 'customer'),
('admin1', 'admin@vexabank.com', 'admin123', 'admin'),
('ali', 'ali@gmail.com', '123456', 'customer'),
('sara', 'sara@gmail.com', '123456', 'customer');

CREATE TABLE transfers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  recipient_name VARCHAR(100) NOT NULL,
  account_number VARCHAR(20) NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  note TEXT,
  transfer_date DATE
);

INSERT INTO transfers (recipient_name, account_number, amount, note, transfer_date) VALUES
('Ali Hassan', '112233', 150.00, 'Monthly transfer', '2025-03-01'),
('Sara Ahmed', '223344', 200.50, 'Payment for services', '2025-03-02'),
('Omar Said', '334455', 75.25, 'Gift', '2025-03-03'),
('Nora Salem', '445566', 300.00, 'Rent payment', '2025-03-04'),
('Fatema Ali', '556677', 120.00, 'Shopping transfer', '2025-03-05');