create database blog_db;
use blog_db;

drop table if exist posts;
create table posts(
	id int primary key auto_increment,
	title varchar(255),
	content text,
	author varchar(100),
	created_at timestamp,
	updated_at timestamp nullable default current_timestamp(),
);