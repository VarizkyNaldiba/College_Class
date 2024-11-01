package Mobile;

import java.util.Scanner;

public class detectMain {
    public static void main(String[] args) {
        Scanner device = new Scanner(System.in);

        System.out.print("Masukkan berat: ");
        int berat = device.nextInt();

        Mobile myDevice;
        if (berat < 4) {
            System.out.print("Masukkan jenis perangkat (Laptop/Handphone): ");
            String type = device.next();

            if (type.equalsIgnoreCase("Laptop")) {
                System.out.print("Masukkan RAM: ");
                int ram = device.nextInt();
                System.out.print("Masukkan hardisk: ");
                int hardisk = device.nextInt();
                System.out.print("Masukkan keyboard: ");
                String keyboard = device.next();
                System.out.print("Masukkan layar lebar: ");
                String layarlebar = device.next();
                System.out.print("Masukkan proccessor: ");
                String proccessor = device.next();

                myDevice = new Laptop(berat, ram, hardisk, keyboard, layarlebar, proccessor);

            } else if (type.equalsIgnoreCase("Handphone")) {
                System.out.print("Masukkan layar kecil: ");
                String layarkecil = device.next();
                System.out.print("Masukkan camera: ");
                String camera = device.next();
                System.out.print("Masukkan speaker: ");
                String speaker = device.next();
                System.out.print("Masukkan merk (Android/iOS): ");
                String merk = device.next();

                if (merk.equalsIgnoreCase("Android")) {
                    myDevice = new android(layarkecil, camera, speaker, berat, merk);
                } else {
                    myDevice = new ios(layarkecil, camera, speaker, berat);
                }

            } else {
                System.out.println("Jenis perangkat tidak dikenal.");
                myDevice = new Mobile(berat);
            }
        } else {
            System.out.println("Perangkat ini bukan Mobile");
            myDevice = new Mobile(berat);
        }

        System.out.println(myDevice.deteksiPerangkat());
        myDevice.isMobile();
        device.close();
    }
}
