drop database if exists reproductor;

create database reproductor;

use reproductor;

drop table videos;

create table videos(
	videoID int not null primary key auto_increment,
	video varchar(100) not null,
	fecha_creacion date not null
);

drop table comentarios;

create table comentarios(
	comentarioID int not null  auto_increment,
	comentario varchar(500) not null,
	fecha_creacion date not null,
	videoID int not null,
	PRIMARY KEY (comentarioID),
    FOREIGN KEY (videoID) REFERENCES videos(videoID)
);

INSERT INTO videos (video, fecha_creacion)
VALUES ('video1.mp4', '2020-03-15');

INSERT INTO comentarios (comentario, fecha_creacion,videoID)
VALUES ('esta bueno', '2020-03-15',1);

grant select, insert, update, delete
on reproductor.*
to reproductor@localhost identified by "root@localhost";