package Mobile;

import java.util.Scanner;

public class detectMain {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.print("Masukkan berat: ");
        int berat = scanner.nextInt();

        Mobile mobileDevice = new Mobile();

        if (berat < 4) { 
            System.out.print("Masukkan layar kecil (ya/tidak): ");
            String layarkecil = scanner.next();
            System.out.print("Masukkan keyboard (ada/tidak): ");
            String keyboard = scanner.next();

            boolean isHandphone = layarkecil.equalsIgnoreCase("ya") && keyboard.equalsIgnoreCase("tidak");
            boolean isLaptop = layarkecil.equalsIgnoreCase("tidak") && keyboard.equalsIgnoreCase("ada");

            // Instansiasi objek berdasarkan input pengguna
            if (isHandphone) {
                System.out.print("Masukkan camera: ");
                String camera = scanner.next();
                System.out.print("Masukkan speaker: ");
                String speaker = scanner.next();
                mobileDevice = new handphone(layarkecil.equalsIgnoreCase("ya"), camera, speaker, berat);
            } else if (isLaptop) {
                System.out.print("Masukkan RAM: ");
                int ram = scanner.nextInt();
                System.out.print("Masukkan hardisk: ");
                int hardisk = scanner.nextInt();
                System.out.print("Masukkan prosesor: ");
                String proccessor = scanner.next();
                mobileDevice = new Laptop(berat, ram, hardisk, true, true, proccessor);
            } 
            mobileDevice.isMobile();
            if (mobileDevice instanceof handphone) {
                System.out.println("Perangkat ini adalah Handphone.");
            } else if (mobileDevice instanceof Laptop) {
                System.out.println("Perangkat ini adalah Laptop.");
            } else {
                System.out.println("Perangkat ini tidak dapat dikenali.");
            } 

            mobileDevice.info();

        } else {
            System.out.println("Perangkat tidak mobile");
        }

       
        scanner.close();
    }
}
