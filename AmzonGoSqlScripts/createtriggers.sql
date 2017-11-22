# creates triggers for our database and create sub employees 
SET FOREIGN_KEY_CHECKS = 0;
drop table if exists stocker;
drop table if exists customerservice;
drop table if exists shippingemp;
SET FOREIGN_KEY_CHECKS = 1;  

create table Stocker(
	EmpID int(9) primary key,
	Fname varchar(25),
	Minit varchar(1), 
	Lname varchar(25), 
	Title varchar(25), 
	Wage int(5), 
	StoreNo int(1),
	foreign key fk_Sstore(StoreNo) references Store(StoreNo) on delete set null);

create table CustomerService(
        EmpID int(9) primary key,
        Fname varchar(25),
	Minit varchar(1), 
        Lname varchar(25),       
        Title varchar(25), 
        Wage int(5), 
        StoreNo int(1),
        foreign key fk_CSstore(StoreNo) references Store(StoreNo) on delete set null);

create table ShippingEmp(
        EmpID int(9) primary key,
        Fname varchar(25), 
	Minit varchar(1),
        Lname varchar(25),       
        Title varchar(25), 
        Wage int(5), 
        StoreNo int(1),
        foreign key fk_Shipstore(StoreNo) references Store(StoreNo) on delete set null);

drop trigger if exists employ;

delimiter //
create trigger employ after insert on employee
for each row
begin
	if new.Title = 'Stocker' then 
		insert into stocker
		values(new.empID, new.Fname, new.Minit, new.Lname, new.Title,new.Wage, new.StoreNo);
	elseif new.Title = 'Customer Service' then
		insert into customerservice
		values(new.empID, new.Fname,new.Minit, new.Lname,new.Title,new.Wage, new.StoreNo);
	elseif new.Title = 'Shipping' then
		insert into shippingemp 
		values(new.empID, new.Fname,new.Minit, new.Lname,new.Title,new.Wage, new.StoreNo);
	end if;
end; //
delimiter ;

