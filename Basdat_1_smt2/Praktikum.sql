show DATABASES;
CREATE database db_polinema;
use db_polinema;    
CREATE TABLE prodi (
    kode_prodi VARCHAR(6) PRIMARY KEY,
    nama_prodi VARCHAR(30) 
    );  
DROP TABLE prodi;

CREATE TABLE mahasiswa (
    nim INTEGER(8) PRIMARY KEY,
    nama_mhs VARCHAR(50),
    jenis_kelamin ENUM('L','P') DEFAULT 'L',
    alamat VARCHAR(50),
    kota VARCHAR(20) DEFAULT 'Malang',
    asal_sma VARCHAR(30),
    no_hp VARCHAR(12),
    umur INT,
    kode_prodi VARCHAR(30), Foreign Key fk0 (kode_prodi) REFERENCES prodi (kode_prodi)
    );
DROP Table mahasiswa;
CREATE TABLE mataKuliah (
    mk_id VARCHAR(10) PRIMARY KEY,
    nama_mk VARCHAR(50),
    jumlah_jam FLOAT(4,2),
    sks INTEGER
);
DROP Table mataKuliah;

CREATE table ruang (
    ruang_id VARCHAR(3) PRIMARY KEY,
    nama_ruang VARCHAR(20),
    Kapasitas INT
);
drop table ruang;

create table dosen ( 
nidn INT(20) PRIMARY KEY,
nama_dosen VARCHAR(50),
status ENUM('PNS', 'KONTRAK') DEFAULT'PNS',
jenis_kelamin ENUM('L','P') DEFAULT 'L',
no_hp VARCHAR(15)
);
drop table dosen;

-- nambah kolom

ALTER table mahasiswa ADD COLUMN agama VARCHAR(10) after kode_prodi;
ALTER table dosen ADD alamat VARCHAR(50) after no_hp;

-- insert data

INSERT INTO prodi (kode_prodi,nama_prodi) 
VALUES ('001', 'techno');
SELECT * FROM prodi;
INSERT INTO mahasiswa (nim, nama_mhs, jenis_kelamin, alamat, kota, asal_sma, no_hp, umur, kode_prodi, agama) 
VALUES (234, 'Variz', 'L' , 'Jatimulyo', 'Malang', 'Sman 1 Malang', '0813652xxx', 17, '001', 'islam');
SELECT * FROM mahasiswa;
INSERT INTO mataKuliah (mk_id, nama_mk, jumlah_jam, sks) 
VALUES ('002', 'Basis Data', 10, 4 );
SELECT * FROM mataKuliah;

INSERT INTO ruang (ruang_id, nama_ruang, kapasitas)
VALUES ('003','Ruang 7b', 20);
SELECT * FROM ruang;
INSERT INTO dosen (nidn, nama_dosen, status, jenis_kelamin, no_hp, alamat) 
VALUES (004, 'Bunga', 'PNS', 'P', '08xxxxxx', 'Padang');
SELECT * FROM dosen;

show TABLES ;
DESC mahasiswa;
ALTER Table mahasiswa DROP COLUMN asal_sma;




