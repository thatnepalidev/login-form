CREATE DATABASE website;

CREATE TABLE login_info(
    id int auto_increment primary key,
    username varchar(20) not null,
    email text not null,
    password text not null
);