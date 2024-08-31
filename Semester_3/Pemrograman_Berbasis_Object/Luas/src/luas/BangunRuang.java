/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package luas;

/**
 *
 * @author HP
 */
import java.util.Scanner;

// Struktural 
public class BangunRuang {
    public static void main(String[] args) { 
        Scanner sc = new Scanner(System.in);
        int menu, alas, tinggi, luas, sisi, panjang, lebar;

        System.out.println("1. Segitiga");
        System.out.println("2. Bujur Sangkar");
        System.out.println("3. Persegi Panjang");
        System.out.print("Masukkan pilihan: ");
        
        menu = sc.nextInt();
        
        switch (menu) {
            case 1:
                System.out.print("Masukkan alas: ");
                alas = sc.nextInt();
                System.out.print("Masukkan tinggi: ");
                tinggi = sc.nextInt();
                luas = alas * tinggi / 2;
                System.out.println("Luas segitiga: " + luas);
                break;
            case 2:
                System.out.print("Masukkan sisi: ");
                sisi = sc.nextInt();
                luas = sisi * sisi;
                System.out.println("Luas bujur sangkar: " + luas);
                break;
            case 3:
                System.out.print("Masukkan panjang: ");
                panjang = sc.nextInt();
                System.out.print("Masukkan lebar: ");
                lebar = sc.nextInt();
                luas = panjang * lebar;
                System.out.println("Luas persegi panjang: " + luas);
                break;
            default:
                System.out.println("Pilihan tidak valid");
            }
        
    }
 }

 