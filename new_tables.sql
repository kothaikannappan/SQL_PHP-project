DROP TABLE if exists Customer;
#
Create table if not exists Customer (C_Id INT not null auto_increment, lname varchar(30),fname varchar(30),ph_no varchar(15), street varchar(20),city varchar(20),country varchar(20),c_type varchar(20),primary key(c_id));


DROP TABLE if exists Transaction;
#
Create table if not exists Transaction (T_id INT not null auto_increment,C_Id INT,DATE datetime, Quantity int, total_price float(20,2), Discount_code varchar(20),primary key(T_id));


DROP TABLE if exists orders;
#
Create table if not exists orders ( Order_ID  INT not null auto_increment, T_Number int, Item_Id int, Price float(8,2),primary key(Order_ID));


DROP TABLE if exists Volume;
#
Create table if not exists Volume (Volume_id int, Mag_id int, yr int,  primary key(Volume_id,Mag_id) );



DROP TABLE if exists Article;
#
Create table if not exists Article (Art_id INT not null auto_increment, title varchar(20), Mag_id int, Volume_id int,pg_no int, Author_id int, primary key(Art_id) );
select * from Article;

DROP TABLE if exists AUTHOR;
#
create table if not exists AUTHOR (
  _id INT not null auto_increment,
  _name varchar(30) not null,
  primary key(_id)
) engine = innodb;

DROP TABLE if exists MAGAZINE;
#
create table if not exists MAGAZINE (
  _id INT not null auto_increment,
  name varchar(50) not null,
  primary key(_id),
  check(name != '')
) engine = innodb;

DROP TABLE if exists ITEM;
#
create table if not exists ITEM (
  _id BIGINT not null auto_increment,
  price FLOAT(8,2) not null,
  primary key(_id)
) engine = innodb;

insert into MAGAZINE (name) values
("Theor. Comput. Sci."),
("Linguistics and Philosophy"),
("Lecture Notes in Computer Science");

insert into ITEM (price) values
(10.00),
(10.50),
(10.90),
(50.00),
(50.50),
(100.00),
(100.50),
(150.00);

select * from Article;
insert into AUTHOR (_name) values
("Houda"),
("Hideo"),
("Mutlu"),
("Francine"),
("Janusz"),
("Cezar"),
("Mathieu"),
("Pascal"),
("Jean-Marc"),
("Dmitry"),
("Christian"),
("Stefano"),
("Denis"),
("Pierpaolo"),
("Akim"),
("Michael"),
("Frank"),
("Alexandre"),
("Gianluigi"),
("Olivier"),
("Thomas"),
("Daniela"),
("Yuri"),
("Yo-Sub"),
("MdMahbubul"),
("Pierre-Cyrille"),
("Fritz"),
("Jan"),
("Markus"),
("Tomohiro")
;



