CREATE TABLE Ovelse (
OvelseId int not null auto_increment,
OvelseNavn varchar (255),
OvelseKjonn varchar(10),
OvelseTidspunkt varchar (6),primary key(OvelseId)
);

CREATE TABLE Tilskuer (
TilskuerId int not null auto_increment,
TilskuerNavn varchar (255),
TilskuerBosted varchar(255),
TilskuerNationalitet varchar (255), primary key(TilskuerId)
);

CREATE TABLE Utover (
UtoverId int not null auto_increment,
UtoverNavn varchar (255),
UtoverKjonn varchar(10),
UtoverNationalitet varchar (255), primary key(UtoverId)
);

CREATE TABLE OvelseTilskuer (
    OvelseID int NOT NULL,
    TilskuerId int NOT NULL,
    PRIMARY KEY (OvelseId, TilskuerID)    
);