SET FOREIGN_KEY_CHECKS = 0;
drop table if exists store;
drop table if exists customer;
drop table if exists item;
drop table if exists customerorder;
drop table if exists storeshipment;
drop table if exists shipmentcenter;
drop table if exists storeinventory;
drop table if exists employee;
SET FOREIGN_KEY_CHECKS = 1;  

create table Store(
	StoreNo int(1) primary key,
	Location varchar(25) unique key);

create table customer(
	Uname varchar(25) primary key, 
	Fname varchar(25) not null, 
	Minit varchar (1),
	Lname varchar (25) not null, 
	Pwd varchar(25) not null, 
	Address varchar(40) not null, 
	CardNo bigint(16) unique key not null,
	Store int(1),
	foreign key fk_CS(Store) references Store(StoreNo) on delete set null);

create table item(
	Itemno int(7) primary key, 
	ItemName varchar(100) unique key, 
	Price float(8,2),
	ItemType varchar(25));

create table customerOrder(
	Orderno int(3) primary key auto_increment,
	TotalPrice float(5,2) not null, 
	OrderDate timestamp, 
	Cust varchar(25), 
	foreign key fk_custO(Cust) references customer(Uname) on delete cascade);

create table StoreShipment(
	ShipmentNo int(10) primary key, 
	ShQuantity int(10) not null, 
	StoreNo int(1) not null, 
	ItemId int(7),
	foreign key fk_Items(ItemId) references item(Itemno));

create table ShipmentCenter(
	CenterId int(2) primary key, 
	Location varchar(25) not null, 
	StId int(1), 
	foreign key fk_ShipStore(StId) references Store(StoreNo) on delete set null);

create table StoreInventory(
	InventoryId int(7), 
	InventoryQuantity int(3), 
	storeNO int(1), 
	dateAdded timestamp, 
	foreign key fk_Iid(InventoryId) references Item(ItemNo) on delete set null,
	foreign key fk_store(storeNO) references Store(StoreNo) on delete cascade);

create table employee(
	empID int(9) primary key, 
	Fname varchar(25) not null, 
	Minit varchar(1), 
	Lname varchar(25) not null, 
	Title varchar(25),
	Addrese varchar(50), 
	Wage int(6), 
	storeNo int(1),
	foreign key fk_eStore(storeNo) references Store(StoreNo) on delete set null);

create table refund(
	ServiceId int(7) primary key,
	Amount float(5, 2),
	Cust varchar(25),
	Emp int(9),
	foreign key fk_cust(Cust) references customer(Uname) on delete cascade,
	foreign key fk_emp(Emp) references employee(empID) on delete cascade);
 

 
