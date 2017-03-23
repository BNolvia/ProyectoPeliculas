
create table actor(
	idactor int unsigned not null,
	nombreactor varchar (50),
	biografia varchar (250),
	foto varchar (40),
	primary key (idactor) 
);

create table cine(
	idcine int unsigned not null,
	nombrecine varchar (50),
	direccion varchar (150),
	primary key (idcine) 
);

create table director(
	iddirector int unsigned not null,
	nombre varchar (50),
	primary key (iddirector) 
);

create table estudio(
	idestudio int unsigned not null,
	nombreestudio varchar (50),
	paginaweb varchar (50),
	primary key (idestudio)
);

create table usuario(
	idusuario int unsigned not null,
	nombreusuario varchar (50),
	contrasenia varchar (50),
	correo varchar (50),
	primary key (idusuario)
);

create table sala(
	idsala int unsigned not null,
	sala varchar (50),
	primary key (idsala) 
);

create table pelicula (
	idpelicula int unsigned not null,
	nombrepelicula varchar (50),
	descripcion varchar (50),
	genero varchar (50),
	clasificacion varchar (50),
	imagen varchar (50),
	primary key (idpelicula)
);

create table pelicula_director(
	idpelicula int unsigned not null,
	iddirector int unsigned not null,
	primary key (idpelicula,iddirector),
	foreign key (iddirector) references director (iddirector) on delete cascade on update cascade,
	foreign key (idpelicula) references pelicula (idpelicula) on delete cascade on update cascade
);

create table horario(
	idhorario int unsigned not null,
	idpelicula int unsigned not null,
	hora varchar (10),
	fecha date,
	primary key (idhorario),
	foreign key (idpelicula) references pelicula (idpelicula) on delete cascade on update cascade
);

create table horario_sala(
	idhorario int unsigned not null,
	idsala int unsigned not null,
	primary key (idhorario,idsala),
	foreign key (idhorario) references horario (idhorario) on delete cascade on update cascade,
	foreign key (idsala) references sala (idsala) on delete cascade on update cascade
);

create table estudio_pelicula(
	idestudio int unsigned not null,
	idpelicula int unsigned not null,
	primary key (idestudio,idpelicula),
	foreign key (idpelicula) references pelicula (idpelicula) on delete cascade on update cascade,
	foreign key (idestudio) references estudio(idestudio) on delete cascade on update cascade
);


create table comentario(
	idcomentario int unsigned not null,
	idusuario int unsigned not null,
	idpelicula int unsigned not null,
	comentario varchar (250),
	calificacion int,
	fecha date,
	primary key (idcomentario),
	foreign key (idusuario) references usuario (idusuario) on delete cascade on update cascade,
	foreign key (idpelicula) references pelicula (idpelicula) on delete cascade on update cascade
);
  
create table actor_pelicula(
	idactormovie int unsigned not null,
	idpelicula int unsigned not null,
	idactor int unsigned not null,
	personaje varchar (150),
	primary key (idactormovie),
	foreign key (idpelicula) references pelicula (idpelicula) on delete cascade on update cascade,
	foreign key (idactor) references actor(idactor) on delete cascade on update cascade
);

create table sala_cine(
	idcine int unsigned not null,
	idsala int unsigned not null,
	primary key (idcine,idsala),
	foreign key (idcine) references cine (idcine) on delete cascade on update cascade,
	foreign key (idsala) references sala (idsala) on delete cascade on update cascade
);

create table cartelera(
	idpelicula int unsigned not null,
	idcine int unsigned not null,
	idsala int unsigned not null,
	idhorario int unsigned not null,
	primary key (idpelicula,idcine,idsala,idhorario),
	foreign key (idpelicula) references pelicula (idpelicula) on delete cascade on update cascade,
	foreign key (idhorario) references horario (idhorario) on delete cascade on update cascade,
	foreign key (idcine) references cine (idcine) on delete cascade on update cascade,
	foreign key (idsala) references sala (idsala) on delete cascade on update cascade
);

