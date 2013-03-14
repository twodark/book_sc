create database book_sc;
use book_sc;

create table customer(
	customerid int unsigned not null auto_increment primary key ,
	name char(60) not null,
	address char(80) not null,
	city char(20) not null,
	state char(20),
	zip char(10),
	country char(20) not null
)engine=InnoDB;

create table cus_order(
	orderid int unsigned not null auto_increment primary key,
	customerid int unsigned not null,
	amount float(6,2) not null,
	date date not null,
	order_status char(10),
	ship_name char(60) not null,
	ship_address char(80) not null,
	ship_city char(30) not null,
	ship_state char(20),
	ship_zip char(10),
	ship_country char(20) not null,
	index(customerid),
	foreign key(customerid) references customer(customerid)
)engine=InnoDB;

create table book(
	isbn char(13) not null primary key,
	catid int unsigned not null,
	title char(20) not null,
	author char(30) not null,
	price float(4,2) not null,
	description varchar(255),
	index(catid)
--	foreign key(catid) references catagory(catid)
)engine=InnoDB;

create table catagory(
	catid int unsigned not null auto_increment primary key,
	cat_name char(60) not null
)engine=InnoDB;

create table order_item(
	orderid int unsigned not null,
	isbn char(13) not null,
	item_price float(4,2) not null,
	quantity tinyint unsigned not null,
	primary key(orderid, isbn),
	foreign key(orderid) references cus_order(orderid),
	foreign key(isbn) references book(isbn)
)engine=InnoDB;

create table admin(
	username char(16) not null primary key,
	password char(40) not null
);

grant select, insert, update, delete 
	on book_sc.* 
	to book_sc@localhost identified by 'passwd';
