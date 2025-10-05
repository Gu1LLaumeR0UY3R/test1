create database contrib;
create user contrib_root@'%' identified by '123abc';
grant all on contrib.* to contrib_root@'%';



