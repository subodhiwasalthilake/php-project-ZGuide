use zguide;

create table course(
	faculty varchar(200),
	courseID varchar(50),
	courseName varchar(100),
	stream varchar(100),
	subject1 varchar(100),
	subject2 varchar(100),
	subject3 varchar(100),
	District varchar(50),
	minZ double,
	primary key(faculty,courseID,courseName,district)

);

create table AllCourse(
	courseID varchar(50),
	courseName varchar(100)

);

insert into AllCourse(courseID,courseName) values
('mechEng','Mechanical Engineering'),
('civilEng','Civil Engineering'),
('Low','Low'),
('ICT','Information and Communication Technology'),
('CS','Computer Science');

create table district(
	districtID int primary key,
	districtName varchar(50)
);

create table institute(
	instituteID varchar(50),
	instituteName varchar(100),
	faculty varchar(200),
	primary key(instituteName,faculty)
);

insert into institute(instituteID,instituteName,faculty)values
('pera','University Of Peradeniya','Faculty of Medicine'),
('pera','University Of Peradeniya','Faculty Engineering'),
('pera','University Of Peradeniya','Faculty of Management'),
('col','University Of Colombo','Faculty of Medicine'),
('col','University Of Colombo','Faculty of Science'),
('col','University Of Colombo','Faculty of Low'),
('jfn','University Of Jaffna','Faculty of Medicine'),
('jfn','University Of Jaffna','Faculty of Engineering'),
('mora','University Of Moratuwa','Faculty of Medicine'),
('jpura','University Of Sri Jayawardanapura','Faculty of Engineering'),
('rhuna','University Of Ruhuna','Faculty of Medicine');

create table stream(
	streamID int primary key auto increment,
	stream varchar(100)

);

create table notification(
	notificationID int primary key auto_increment,
	institute varchar(100),
	faculty varchar(200),
	course varchar(100),
	Notification varchar(1000)

);

create table facultyInformation(
facultyID varchar(20) primary key,
faculty varchar(200),
contactNumber int,
email varchar(200),
address varchar(500),
information varchar(5000)
);


insert into facultyInformation(facultyID,faculty,contactNumber,email,address,information)values
('pera/Med','Faculty of Medicine',0812589647,'abc@gmail.com','Galaha Road,Peradeniya','sdfghjkloiuytrewq'),
('pera/Eng','Faculty of Engineering',0812589647,'abc@gmail.com','Galaha Road,Peradeniya','sdfghjkloiuytrewq'),
('col/Med','Faculty of Medicine',0812589647,'abc@gmail.com','colombo 07','sdfghjkloiuytrewq'),
('col/Sci','Faculty of Science',0812589647,'abc@gmail.com','Colombo 07','sdfghjkloiuytrewq'),
('jfn/Apl','Faculty of Applied Science',0812589647,'abc@gmail.com','Mannar road,Vavuniya','sdfghjkloiuytrewq');