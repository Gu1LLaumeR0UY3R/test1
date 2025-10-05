create table membre(
    id varchar(20) primary key,
    nom varchar(50) not null,
	-- login => le champ id sera le login
	password varchar(100) not null,
	droit varchar(50) default 'dev'
);

create table projet(
    id varchar(20) primary key,
    nom varchar(50) not null
);

create table contribution(
    id int auto_increment primary key,
    membre_id varchar(20) not null references membre(id),
    projet_id varchar(20) not null references projet(id),
    duree int default 0
);

