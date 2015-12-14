CREATE TABLE IF NOT EXISTS Curso(
	ID INTEGER  NOT NULL AUTO_INCREMENT ,
	Nombre VARCHAR(30)  NOT NULL,
	CONSTRAINT PK_Curso PRIMARY KEY(ID)
);

CREATE TABLE IF NOT EXISTS Assignatura(
	ID INTEGER  NOT NULL AUTO_INCREMENT ,
	Nombre VARCHAR(30)  NOT NULL,
	ID_Curso INTEGER NOT NULL,
	CONSTRAINT PK_Assignatura PRIMARY KEY(ID),
	CONSTRAINT FK_Curso_Assignatura FOREIGN KEY (ID_Curso) REFERENCES Curso(ID)
);

CREATE TABLE IF NOT EXISTS Alumno(
	ID INTEGER  NOT NULL AUTO_INCREMENT ,
	Nombre VARCHAR(30)  NOT NULL,
	Apellido VARCHAR(30) NOT NULL,
	DNI VARCHAR(9) NOT NULL,
	CONSTRAINT PK_Assignatura PRIMARY KEY(ID),
	CONSTRAINT UQ_Alumno UNIQUE(DNI)
);

CREATE TABLE IF NOT EXISTS Nota(
	ID_Assignatura INTEGER  NOT NULL,
	ID_Alumno INTEGER NOT NULL,
	Nota INT,
	CONSTRAINT PK_Nota PRIMARY KEY(ID_Assignatura,ID_Alumno),
	CONSTRAINT FK_Nota_Assignatura FOREIGN KEY (ID_Assignatura) REFERENCES Assignatura(ID),
	CONSTRAINT FK_Nota_Alumno FOREIGN KEY (ID_Alumno) REFERENCES Alumno(ID)
);

insert into curso(nombre) values("DAW"),("DAM"),("ASIX"),("SMX");


insert into Assignatura(nombre,ID_Curso) values("Java",1),("JS",1),("PHP",1),("Node",1),("UML",1);
insert into Assignatura(nombre,ID_Curso) values("Java",2),("QT",2),("Android",2),("C#",2),("Unity3D",2);
insert into Assignatura(nombre,ID_Curso) values("Servidor",3),("Cisco",2),("Seguridad",2),("Windows Server",2),("Zentyal",2);
insert into Assignatura(nombre,ID_Curso) values("ofimatica",4),("html",4),("linux",4),("Windows",4),("redes",4);

insert into Alumno(nombre,Apellido,DNI) values("David","Postigo","20389608Q"),("Oscar","Viciana","34967872O"),("Sergi","Grau","12345678A"),("Dani","Colllados","87654321Z"),("Hector","Lopez","54637289G");

insert into Nota(ID_Assignatura,ID_Alumno,Nota) values(1,1,8),(2,1,9),(3,1,10),(4,1,1),(5,1,4);
insert into Nota(ID_Assignatura,ID_Alumno,Nota) values(1,2,8),(2,2,9),(3,2,10),(4,2,10),(5,2,5);
insert into Nota(ID_Assignatura,ID_Alumno,Nota) values(6,3,2),(7,3,5),(8,3,10),(9,3,7),(10,3,8);
insert into Nota(ID_Assignatura,ID_Alumno,Nota) values(11,4,7),(12,4,6),(13,4,9),(14,4,3),(15,4,10);
insert into Nota(ID_Assignatura,ID_Alumno,Nota) values(16,5,7),(17,5,3),(18,5,9),(19,5,6),(20,5,10);








