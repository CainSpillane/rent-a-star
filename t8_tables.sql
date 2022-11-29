-- Team 8 tables mySQL -- Kyle Wright, Aurn Singh, Evan Spillane, Justin Sterlacci
drop table if exists t8_trans_history;
drop table if exists t8_stars;
drop table if exists t8_users;
drop table if exists t8_user_questions;

create table t8_users (
	u_id int primary key auto_increment,
	user_type enum('Customer', 'Admin') not null,
	user_username varchar(20) unique,
	user_password varchar(20),
	user_pass_change datetime default CURRENT_TIMESTAMP(),
	user_email varchar(64),
	user_fname text,
	user_lname text,
	user_active enum('Y', 'N') not null default 'Y');
	
create table t8_stars (
	star_id int primary key auto_increment,
	star_name text,
	star_declination double not null,
	star_distance double not null,
	star_right_ascension time not null,
	star_owner int,
	star_active enum('Y', 'N') not null default 'Y',
	foreign key(star_owner) references t8_users(u_id));
	
create table t8_user_questions (
	qa_id int primary key auto_increment,
	user_question text not null,
	company_reply text,
	question_active enum('Y', 'N') not null default 'Y');
	
create table t8_trans_history (
	trans_id int primary key auto_increment,
	star_id int not null,
	u_id int not null,
	card_info varchar(16),
	trans_value double,
	user_address varchar(32),
	date_processed datetime,
	trans_active enum('Y', 'N') not null default 'Y',
	foreign key(star_id) references t8_stars(star_id),
	foreign key(u_id) references t8_users(u_id));
	
explain t8_users;
explain t8_stars;
explain t8_trans_history;
explain t8_user_questions;

insert into t8_users (user_type, user_username, user_password, user_email, user_fname, user_lname) values ('Admin', 'atokash', 'ProfAPT0', 'atokash@marist.edu', 'Andrew', 'Tokash');
insert into t8_users (user_type, user_username, user_password, user_fname, user_lname) values ('Admin', 'kyle', 'admin', 'Kyle', 'Wright');
insert into t8_users (user_type, user_username, user_password, user_fname, user_lname) values ('Admin', 'evan', 'admin', 'Evan', 'Spillane');
insert into t8_users (user_type, user_username, user_password, user_fname, user_lname) values ('Admin', 'aurn', 'admin', 'Aurn', 'Singh');
insert into t8_users (user_type, user_username, user_password, user_fname, user_lname) values ('Admin', 'justin', 'admin', 'Justin', 'Sterlacci');

insert into t8_stars (star_name, star_declination, star_distance, star_right_ascension) values ('Polaris', 89.15, 447.6, '02:31:49');
insert into t8_stars (star_name, star_declination, star_distance, star_right_ascension) values ('Star 2', 65.35, 384.2, '12:15:44');
insert into t8_stars (star_name, star_declination, star_distance, star_right_ascension) values ('Star 3', 89.15, 447.6, '05:26:19');

insert into t8_user_questions (user_question, company_reply) values ('Sample question?', 'Sample answer');

insert into t8_trans_history (star_id, u_id, card_info, trans_value, date_processed) values (1, 2, 5462695545886233, 100.00, CURRENT_TIMESTAMP());
insert into t8_trans_history (star_id, u_id, card_info, trans_value, date_processed) values (2, 4, 1163156356219948, 100.00, CURRENT_TIMESTAMP());
insert into t8_trans_history (star_id, u_id, card_info, trans_value, date_processed) values (3, 2, 1357627893315328, 100.00, CURRENT_TIMESTAMP());

select * from t8_users;
select * from t8_stars;
select * from t8_user_questions;
select * from t8_trans_history;