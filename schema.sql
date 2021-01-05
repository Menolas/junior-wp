CREATE DATABASE junior_corporation
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE junior_corporation;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    education VARCHAR(255) REFERENCES partners (id),
    address VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL,
    skills
    image VARCHAR(255),
    profession VARCHAR(255) NOT NULL
);

CREATE TABLE actions (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	image VARCHAR(255) NOT NULL,
	describtion TEXT
);

CREATE TABLE internships (
	id INT AUTO_INCREMENT PRIMARY KEY,
	category VARCHAR(255) REFERENCES categories (id) NOT NULL,
	name VARCHAR(255) NOT NULL,
	project VARCHAR(255) NOT NULL,
	description TEXT NOT NULL,
	logo  VARCHAR(255) NOT NULL,
	image  VARCHAR(255) NOT NULL,
	skills TEXT, NOT NULL, /*стек технологий*/
	education VARCHAR(255) NOT NULL, /*оконченное, неоконченное*/
	employment VARCHAR(255) NOT NULL, /*частичная, полная*/
	type VARCHAR(255) NOT NULL, /*удаленная, в офисе*/
	schedule VARCHAR(255) NOT NULL
);

CREATE TABLE courses (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	description TEXT,
	category VARCHAR(255) NOT NULL,
	tag VARCHAR(255),
	school_name VARCHAR(255) NOT NULL,
	education_term VARCHAR(255) NOT NULL,
	link VARCHAR(255) NOT NULL,
	sertificate bit DEFAULT 1 NOT NULL,
	practice bit DEFAULT 1 NOT NULL,
	price INT(16) NOT NULL,
	studying_format VARCHAR(255) DEFAULT "online" NOT NULL,
	image VARCHAR(255)
);

CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL
);

CREATE TABLE partners (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	logo VARCHAR(255) NOT NULL,
	link VARCHAR(255) NOT NULL,
	description TEXT
);
