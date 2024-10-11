package pbo_prt5;


import pbo_prt5.rapor;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */


/**
 *
 * @author HP
 */
public class siswa {
    // Method naikKelas
    boolean naikKelas(rapor r, int kelas) {
        return !r.getNim().isBlank() && !r.getNama().isBlank() && r.getNilai() > 50 && kelas >= 1;
    }

    // Method getRapor
    rapor getRapor(int kelas, int semester, rapor a) {
        if (kelas>1semester=8) {
            a.cetak();
            return a;
        } else {
            return null;
        }
    }
}
