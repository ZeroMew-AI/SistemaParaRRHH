create database rr_hh;

use rr_hh;

create table empleado(id_e int auto_increment primary key,
nombre varchar (100) not null, apellido varchar(100) not null,
fecha_nacimiento date not null, 
edad int generated always as (TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())),
foto varchar(255) not null);

create table contrato(id_c int primary key not null, fecha_inicio date not null,
fecha_fin date not null, salario_base decimal(12,2) not null, 
antiguedad int GENERATED ALWAYS AS(TIMESTAMPDIFF(YEAR, fecha_inicio, CURDATE())), 
bono decimal(12,2) GENERATED ALWAYS AS (0.05 * salario_base * antiguedad), 
duracion int GENERATED ALWAYS AS (TIMESTAMPDIFF(MONTH, fecha_inicio, fecha_fin)),
foreign key(id_c) references empleado(id_e));

create table usuario(id_u int auto_increment primary key,
username varchar(30) not null, password varchar(30) not null, 
rol varchar(60) not null);

create table departamento(id_d int primary key not null, nombre varchar(60) not null, 
ubicacion varchar(100) not null, foreign key(id_d) references empleado(id_e));
