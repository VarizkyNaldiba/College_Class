show DATABASES;
CREATE DATABASE akademik;
use akademik;
CREATE TABLE mahasiswa (
    no_mhs VARCHAR(8) PRIMARY KEY,
    nama_mhs VARCHAR(50)
    
    );
DROP Table mahasiswa;

CREATE Table mataKuliah (
    kd_mk VARCHAR(8) PRIMARY KEY,
    nama_mk VARCHAR(50)
);
DROP Table mataKuliah;

CREATE Table nilai (
    kd_mk VARCHAR(50),
    nilai VARCHAR(50),
    no_mhs VARCHAR(8) ,
    Foreign Key fk0 (kd_mk) REFERENCES mataKuliah (kd_mk)
    
);
DROP TABLE nilai;

CREATE Table dosen (
    kd_dosen VARCHAR(8) ,
    nama_dosen VARCHAR(50)
);
drop Table dosen;


-- add column
ALTER TABLE mahasiswa ADD jurusan VARCHAR(20) after nama_mhs;

ALTER Table mataKuliah ADD kode_dosen VARCHAR(8) after nama_mk;

-- add values

INSERT INTO mahasiswa (no_mhs,nama_mhs, jurusan) 
VALUES ('1921000', 'Aminah', 'MI'),
       ('1921002', 'Budiman', 'MI'),
       ('1921003', 'Carina', 'MI'),
       ('1921004', 'Della', 'TI'),
       ('1921005', 'Firda', 'TI');
SELECT * FROM mahasiswa;

INSERT INTO mataKuliah (kd_mk,nama_mk, kode_dosen) 
VALUES ('MI350', 'BASIS DATA', 'B104'),
       ('MI465', 'PEMROGRAMAN', 'B105'),
       ('TI201', 'MOBILE', 'C102');

SELECT * FROM mataKuliah;

INSERT INTO Nilai (no_mhs, kd_mk, nilai) 
VALUES ('1921001', 'MI350', '85'),
    ('1921002', 'MI465', '87'),
    ('1921003', 'MI465', '85'),
    ('1921004', 'TI201', '78'),
    ('1921005', 'TI201', '80');

SELECT * FROM Nilai;

INSERT INTO dosen (kd_dosen, nama_dosen) 
VALUES ('B104', 'Ati'),
 ('B105', 'Dita'),
 ('B105', 'Dita'),
 ('C102', 'Leo'),
 ('C102', 'Leo');

SELECT * FROM Nilai;

