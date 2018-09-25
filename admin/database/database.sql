drop database if exists db_avinstal_crm;
create database db_avinstal_crm character set utf8;
use db_avinstal_crm;

alter database default character set utf8;

create table users(
  user_id         int not null primary key auto_increment,
  username        varchar(255) not null,
  user_password   varchar(255) not null,
  user_firstname  varchar(255) not null,
  user_lastname   varchar(255) not null,
  user_email      varchar(255) not null,
  user_image      text,
  user_role       varchar(255) not null,
  user_randSalt   varchar(255)
);

create table vrsta_opreme(
  sifra         int not null primary key auto_increment,
  vrsta_opreme  varchar(255) not null,
  napomena      varchar(255)
);

create table vrsta_servisa(
  sifra         int not null primary key auto_increment,
  vrsta_servisa varchar(255) not null,
  napomena      varchar(255)
);

create table vrsta_verzije(
  sifra         int not null primary key auto_increment,
  vrsta_verzije varchar(255) not null,
  napomena      varchar(255)
);

create table vrsta_garancije(
  sifra               int not null primary key auto_increment,
  vrsta_garancije     varchar(255) not null,
  trajanje_garancije  int not null,
  napomena            varchar(255)
);

create table equipment(
  equipment_id            int not null primary key auto_increment,
  equipment_active        varchar(2) not null,
  equipment_client        int(4) not null,
  equipment_type          int(4) not null,
  equipment               varchar(255) not null,
  equipment_serial        varchar(255),
  equipment_ip            varchar(16),
  equipment_artical       varchar(255),
  equipment_key_num       varchar(255),
  equipment_purchase      date,
  equipment_warranty      int(4),
  equipment_warranty_exp  date,
  equipment_note          varchar(500)
);

create table client(
  client_id             int not null primary key auto_increment,
  client                varchar(255) not null,
  client_address        varchar(255) not null,
  client_phone          varchar(255),
  client_email          varchar(255),
  client_contact_person varchar(255),
  client_contact_phone varchar(255),
  client_contact_email  varchar(255),
  client_note           varchar(500)
);

insert into vrsta_opreme (vrsta_opreme) values
('3D sustav'),
('Leća projektora'),
('Pojačalo'),
('Procesor zvuka'),
('Projektor'),
('Server'),
('Server - HDD'),
('Server - napajanje'),
('Xenon lampa'),
('Zvučnik');

insert into vrsta_servisa (vrsta_servisa) values
('Izvanredna izmjena lampe'),
('Izvanredna servisna intervencija'),
('Redovan godišnji servis'),
('Redovna izmjena lampe');

insert into vrsta_verzije (vrsta_verzije) values
('FW ALT verzija'),
('FW verzija'),
('SM verzija'),
('SW verzija'),
('TI LINK decryptor'),
('TI verzija'),
('WEB UI verzija');

insert into vrsta_garancije (vrsta_garancije, trajanje_garancije) values
('Garancija 1 mjesec', 30),
('Garancija 3 mjeseca', 90),
('Garancija 6 mjeseci', 180),
('Garancija 12 mjeseci', 365),
('Garancija 24 mjeseca', 730),
('Garancija 36 mjeseci', 1095),
('Garancija 60 mjeseci', 1825),
('Garancija 74 mjeseca', 2190),
('Garancija 120 mjeseci', 3650);

insert into users (username, user_password, user_firstname, user_lastname, user_email, user_role) values
('ivica.samu', 'pomb.26R', 'Ivica', 'Šamu', 'ivica.samu@avinstal.hr', 'Administrator'),
('marina.samu', 'pomb.26R', 'Marina', 'Šamu', 'marina.samu@gmail.com', 'Operater');

INSERT INTO `equipment` VALUES (1, 'Da', 4, 11, 'BARCO DP2k-10S', '2590109553', '192.168.1.100', 'R90047028', '', '1969-12-31', 1, '1969-12-31', ' ');
INSERT INTO `equipment` VALUES (2, 'Da', 4, 2, 'BARCO ICMP', '9730370882', '192.168.1.100', '', '9730370882', NULL, NULL, NULL, NULL);
INSERT INTO `equipment` VALUES (3, 'Da', 4, 7, 'HGST HCC541010A9E630', 'JDD0A2DP2GW00U', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `equipment` VALUES (4, 'Da', 4, 7, 'HGST HCC541010A9E630', 'JDD0A2DP2GYBNU', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `equipment` VALUES (5, 'Da', 4, 7, 'HGST HCC541010A9E630', 'JDD0A2DP2GPXAU', '', '', '', NULL, NULL, NULL, NULL);
INSERT INTO `equipment` VALUES (6, 'Da', 4, 6, 'MINOLTA 0.69" DCAK 1.7-2.55 F/2.5', '', '', 'R9856523', '', NULL, NULL, NULL, NULL);
INSERT INTO `equipment` VALUES (7, 'Da', 4, 9, 'USHIO DXL-22BAF', 'UIE822', '', 'R9855971', '', NULL, NULL, NULL, NULL);
INSERT INTO `equipment` VALUES (8, 'Da', 5, 10, 'DepthQ 3D', 'DPM-L 92135', '', '', '', '0000-00-00', 1, '0000-00-00', '  ');
INSERT INTO `equipment` VALUES (9, 'Da', 5, 6, 'FUJINON 0,98 DC2K 1.95-3.2', '314A004407', '', 'R9855934', '', '2015-01-27', 6, '2018-01-31', '     ');
INSERT INTO `equipment` VALUES (10, 'Da', 5, 3, 'DOLBY CP750', 'G5030544', '172.20.21.51', '', '', '0000-00-00', 1, '0000-00-00', '   ');
INSERT INTO `equipment` VALUES (11, 'Da', 5, 9, 'OSRAM XBO 2000W/DHP OFR', 'EQA5C i4c8', '', 'R9855956', '', '1969-12-31', 1, '1969-12-31', '24.04.2018. - lampa je odradila 837 h (2400h garantni rok)');
INSERT INTO `equipment` VALUES (12, 'Da', 5, 11, 'BARCO DP2k 15C', '1190152434', '172.20.21.21', 'R90044482', '', '2015-01-27', 6, '2018-01-31', '  ');
INSERT INTO `equipment` VALUES (13, 'Da', 6, 6, 'FUJINON 0,98" DC2k 1.95-3.2', '314A002636', '', 'R9855934', '', '2013-06-04', 5, '2015-06-03', '    ');
INSERT INTO `equipment` VALUES (14, 'Da', 6, 2, 'DOREMI ShowVault', 'SV4-023751', '10.1.25.2', '', '271311-01', '2013-06-04', 5, '2015-06-03', '   ');
INSERT INTO `equipment` VALUES (15, 'Da', 6, 7, 'WDC WD2003FYYS-02W0B1', 'WD-WMAY04241329', '', '', '', '2013-06-04', 5, '2015-06-03', 'Disk se nalazi u serveru na poziciji sda2 ');
INSERT INTO `equipment` VALUES (16, 'Da', 6, 7, 'WDC WD2003FYYS-02W0B1', 'WD-WMAY04224828', '', '', '', '2013-06-04', 5, '2015-06-03', 'Disk se nalazi u serveru na poziciji sdb2');
INSERT INTO `equipment` VALUES (17, 'Da', 6, 7, 'HGST HUS724020ALA640', 'PN2134P6KRZGMX', '', '', '', '2013-06-04', 5, '2015-06-03', 'Disk se nalazi u serveru na poziciji sdc2 ');
INSERT INTO `equipment` VALUES (18, 'Da', 6, 3, 'DOLBY CP650', '5942', '10.1.25.7', '', '', '0000-00-00', 1, '0000-00-00', ' ');
INSERT INTO `equipment` VALUES (19, 'Da', 6, 11, 'BARCO DP2k 15C', '1190128904', '10.1.25.3', 'R90044482', '', '2013-06-04', 5, '2015-06-03', '  ');
INSERT INTO `equipment` VALUES (20, 'Da', 8, 9, 'OSRAM XBO 3000W/DHP OFR', 'EXZjTi738', '', 'R9855938', '', '0000-00-00', 1, '0000-00-00', '26.04.2018. - lampa je imala 239 sati ');
INSERT INTO `equipment` VALUES (21, 'Da', 6, 9, 'OSRAM XBO 3000W/DHP OFR', 'EZMD1 i798', '', 'R9855938', '', '0000-00-00', 1, '0000-00-00', '24.05.2018. - lampa je imala 931 h ');
INSERT INTO `equipment` VALUES (22, 'Da', 8, 11, 'BARCO DP2k 15C', '1190130973', '10.1.22.3', 'R90044482', '', '2013-07-08', 5, '2015-07-07', '  ');
INSERT INTO `equipment` VALUES (23, 'Da', 8, 6, 'MINOLTA 0,98" DC2k 1.6-2.5', '9600003205', '', 'R9855933', '', '2013-07-08', 5, '2015-07-07', ' ');
INSERT INTO `equipment` VALUES (24, 'Da', 8, 2, 'DOREMI ShowVault', 'SV4-023491', '10.1.22.2', '', '260889', '2013-07-08', 5, '2015-07-07', ' ');
INSERT INTO `equipment` VALUES (25, 'Da', 8, 7, 'WDC WD2003FYYS-02W0B1', 'WD-WMAY04241133', '', '', '', '2013-07-08', 5, '2015-07-07', 'Disk se nalazi u serveru na poziciji sda2 ');
INSERT INTO `equipment` VALUES (26, 'Da', 8, 7, 'WDC WD2003FYYS-02W0B1', 'WD-WMAY04249212', '', '', '', '2013-07-08', 5, '2015-07-07', 'Disk se nalazi u serveru na poziciji sdb2 ');
INSERT INTO `equipment` VALUES (27, 'Da', 8, 7, 'WDC WD2003FYYS-02W0B1', 'WD-WMAY05091286', '', '', '', '2013-07-08', 5, '2015-07-07', 'Disk se nalazi u serveru na lokaciji sdc2 ');
INSERT INTO `equipment` VALUES (28, 'Da', 8, 3, 'DOLBY CP60', '11601', '10.1.22.7', '', '', '0000-00-00', 1, '0000-00-00', ' ');
INSERT INTO `equipment` VALUES (29, 'Da', 7, 1, 'BARCO DP2k 20C', '1190051263', '192.168.1.122', 'R9005507', '', '2010-06-01', 5, '2012-05-31', '  ');
INSERT INTO `equipment` VALUES (30, 'Da', 7, 7, 'Hitachi HDE721010SLA330', 'STN607MS2310EK', '', '', '', '2010-06-01', 5, '2012-05-31', 'Disk se nalazi u serveru na poziciji sda2 ');
INSERT INTO `equipment` VALUES (31, 'Da', 7, 7, 'Hitachi HDE721010SLA330', 'STN607MS25J18F', '', '', '', '2010-06-01', 5, '2012-05-31', 'Disk se nalazi u serveru na pozicji sdb2 ');
INSERT INTO `equipment` VALUES (32, 'Da', 6, 7, 'Hitachi HDE721010SLA330', 'STN607MS1V1PKF', '', '', '', '2010-06-01', 5, '2012-05-31', 'Disk se nalazi u serveru na poziciji sdc2 ');
INSERT INTO `equipment` VALUES (33, 'Da', 7, 2, 'DOREMI DCP2000', '2141430', '192.168.1.', '', '254290', '2010-06-01', 5, '2012-05-31', '  ');
INSERT INTO `equipment` VALUES (34, 'Da', 7, 9, 'OSRAM XBO 3000W/DHP OFR', 'EZMDY i798', '', '', '', '0000-00-00', 1, '0000-00-00', '13.06.2018. - lampa je imala 646 h (garantni rok 1500h) ');
INSERT INTO `equipment` VALUES (35, 'Da', 7, 3, 'MINOLTA 0.98" DC2k 1.2-1.81', '334A000804', '', '', '', '2010-06-01', 5, '2012-05-31', ' ');
INSERT INTO `equipment` VALUES (36, 'Da', 9, 11, 'BARCO DP2k 19B', '2590003838', '172.20.21.21', 'R90059028', '', '2015-09-10', 5, '2017-09-09', '  ');
INSERT INTO `equipment` VALUES (37, 'Da', 9, 2, 'BARCO ICMP', '9730054936', '172.20.21.21', 'R7681061', '9730054936', '2015-09-10', 5, '2017-09-09', ' ');
INSERT INTO `equipment` VALUES (38, 'Da', 9, 3, 'DOLBY CP750', 'G5034461', '172.20.21.51', '', '', '0000-00-00', 1, '0000-00-00', ' ');
INSERT INTO `equipment` VALUES (39, 'Da', 9, 6, '1.2" DC2k 2.8-5.5', '', '', '', '', '2015-09-10', 5, '2017-09-09', '  ');
INSERT INTO `equipment` VALUES (40, 'Da', 10, 6, 'FUJINON 0,98" DC2k 1.95-3.2', '314A003904', '', 'R9855934', '', '2013-06-04', 5, '2015-06-03', ' ');
INSERT INTO `equipment` VALUES (42, 'Da', 10, 7, 'WDC WD2003FYYS-02W0B1', 'WD-WMAY04291182', '', '', '', '2013-06-04', 5, '2015-06-03', 'Disk se nalazi u serveru na poziciji sda2  ');
INSERT INTO `equipment` VALUES (43, 'Da', 10, 7, 'WDC WD2003FYYS-02W0B1', 'WD-WMAY05109119', '', '', '', '2013-06-04', 5, '2015-06-03', 'Disk se nalazi u serveru na poziciji sdb2 ');
INSERT INTO `equipment` VALUES (44, 'Da', 10, 7, 'WDC WD2003FYYS-02W0B1', 'WD-WMAY05109188', '', '', '', '2013-06-04', 5, '2015-06-03', 'Disk se nalazi u serveru na poziciji sdc2 ');
INSERT INTO `equipment` VALUES (45, 'Da', 10, 11, 'BARCO DP2k 12C', '1190126659', '10.1.29.3', 'R90057072', '', '2013-06-04', 5, '2015-06-03', '  ');
INSERT INTO `equipment` VALUES (46, 'Da', 10, 6, 'OSRAM XBO 3000W/DHP OFR', 'EVI65 i678', '', '', '', '0000-00-00', 1, '0000-00-00', ' 14.06.2018. - lampa je imala 2229h (garantni rok 2400h)');

INSERT INTO `client` VALUES (4, 'Grad Krk', 'Trg bana Jelačića 2, 51500 Krk' , '', '', '', '', '', NULL);
INSERT INTO `client` VALUES (5, 'Kino Pobjeda Metković', 'Stjepana Radića 1, 20350 Metković',  '', '', '', '', '', NULL);
INSERT INTO `client` VALUES (6, 'Kino Sloboda Dubrovnik', 'Luža 66, 20000 Dubrovnik',  '', '', '', '', '', 'Ovo kino je u sastavu Kinomatografa Dubrovnik');
INSERT INTO `client` VALUES (7, 'Kino Visia Dubrovnik', 'Branitelja Dubrovnika 4 , 20000 Dubrovnik', '', '', '', '', '', 'Ovo kino je u sastavu Kinematografa Dubrovnik ');
INSERT INTO `client` VALUES (8, 'Centar za kulturu Korčula', 'Obala korčulanskih brodograditelj , 20260 Korčula', '020 716 529', '', '', '', '', NULL);
INSERT INTO `client` VALUES (9, 'POU Mali Lošinj', 'Vladimira Gortana 35, 51550 Mali Lošinj', '+385 51 231 173', 'uciliste.losinj@ri.htnet.hr', 'Duško', '+385 91 210 441', '', NULL);
INSERT INTO `client` VALUES (10, 'Kino Karaman Split', 'Ilićev prolaz 1, 21000 Split', '', '', '', '', '', 'Kino je u sastavu firme Ekran');