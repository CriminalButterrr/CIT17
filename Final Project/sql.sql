CREATE TABLE users (
    UserId INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    PhoneNum VARCHAR(15) NOT NULL,
    PRIMARY KEY (UserId)
);

ALTER TABLE users AUTO_INCREMENT=401;
INSERT INTO users (FirstName, LastName, Email, PhoneNum)
VALUES ('Haro','Itadori','y.itadori@gmail.com','+8157-594-9963'),
SELECT * FROM users;

CREATE TABLE students (
    StudentId INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    BirthDate DATE NOT NULL,
    Email VARCHAR(255) NOT NULL,
    PhoneNum VARCHAR(15) NOT NULL,
    PRIMARY KEY (StudentId)
);

ALTER TABLE students AUTO_INCREMENT=301;
INSERT INTO students (FirstName, LastName, BirthDate, Email, PhoneNum)
VALUES ('Yuji','Itadori','2002-03-20','y.itadori@gmail.com','+8157-594-9963'),
('Nobara','Kugasaki','2001-08-17','n.kugasaki@gmail.com','+8167-714-6237'),
('Megumi','Fushiguro','2003-12-22','m.fushigurog@gmail.com','+8156-774-3079 ');
SELECT * FROM students;

CREATE TABLE instructors (
    InstructorId INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    PhoneNum VARCHAR(15) NOT NULL,
    PRIMARY KEY(InstructorId)
);
ALTER TABLE instructors AUTO_INCREMENT=201;
INSERT INTO instructors (FirstName, LastName, Email, PhoneNum)
VALUES ('Gojo', 'Satoru', 'g.satoru@gmail.com', '+8141-028-9061'),
('Iori', 'Utahime', 'i.utahime@gmail.com', '+8191-321-7154'),
('Ieiri', 'Shoko', 'i.shoko@gmail.com', '+8110-068-4107 ');
SELECT * FROM instructor;

CREATE TABLE courses (
    CourseId INT NOT NULL AUTO_INCREMENT,
    CourseName VARCHAR(50) NOT NULL,
    Credits DECIMAL(2,1) NOT NULL,
    InstructorId INT NOT NULL,
    PRIMARY KEY (CourseID),
    FOREIGN KEY (InstructorId) REFERENCES instructors(InstructorId)
);

ALTER TABLE courses AUTO_INCREMENT=101;
    INSERT INTO courses (CourseName, Credits, InstructorId)
    VALUES ('Introudction to Curses','3.0', 201),
    ('Curse Manipulation and Techniques Fundamentals','3.0', 202),
    ('Barriers and Domain Fundamentals','3.0', 202);
SELECT * FROM courses;

CREATE TABLE enrollments (
    EnrollmentId INT NOT NULL AUTO_INCREMENT,
    StudentId INT NOT NULL,
    CourseId INT NOT NULL,
    EnrollmentDate DATE NOT NULL,
    Grade INT NOT NULL,
    PRIMARY KEY(EnrollmentId),
    FOREIGN KEY(StudentId) REFERENCES students(StudentId),
    FOREIGN KEY(CourseId) REFERENCES courses(CourseId)
);

INSERT INTO enrollments (StudentId, CourseId, EnrollmentDate, Grade)
VALUES (301, 101, '2023-11-15', 85),
(301, 102, '2023-11-15', 80),
(301, 103, '2023-11-15', 78),
(302, 101, '2023-11-15', 88),
(302, 102, '2023-11-15', 90),
(302, 103, '2023-11-15', 83),
(303, 101, '2023-11-15', 96),
(303, 102, '2023-11-15', 98),
(303, 103, '2023-11-15', 95);
SELECT * FROM enrollments;