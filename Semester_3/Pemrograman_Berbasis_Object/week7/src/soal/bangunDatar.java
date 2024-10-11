package soal;

public class bangunDatar {
    public float keliling, luas;
    
    
   public float luas(String bentuk, float... parameter) {
        if (bentuk.equalsIgnoreCase("lingkaran")) {
            // Rumus luas lingkaran: πr^2
            float r = parameter[0];  // Jari-jari lingkaran
            luas = (float) (Math.PI * r * r);
        } else if (bentuk.equalsIgnoreCase("persegi panjang")) {
            // Rumus luas persegi panjang: panjang * lebar
            float panjang = parameter[0];  // Panjang persegi panjang
            float lebar = parameter[1];    // Lebar persegi panjang
            luas = panjang * lebar;
        } else if (bentuk.equalsIgnoreCase("segitiga")) {
            // Rumus luas segitiga: 0.5 * alas * tinggi
            float alas = parameter[0];     // Alas segitiga
            float tinggi = parameter[1];   // Tinggi segitiga
            luas = 0.5f * alas * tinggi;
        } else {
            System.out.println("Bentuk tidak dikenal!");
        }
        return luas;
    }

    // Method keliling
 public float keliling(String bentuk, float... parameter) {
        if (bentuk.equalsIgnoreCase("lingkaran")) {
            // Rumus keliling lingkaran: 2πr
            float r = parameter[0];  // Jari-jari lingkaran
            keliling = (float) (2 * Math.PI * r);
        } else if (bentuk.equalsIgnoreCase("persegi panjang")) {
            // Rumus keliling persegi panjang: 2 * (panjang + lebar)
            float panjang = parameter[0];  // Panjang persegi panjang
            float lebar = parameter[1];    // Lebar persegi panjang
            keliling = 2 * (panjang + lebar);
        } else if (bentuk.equalsIgnoreCase("segitiga")) {
            // Rumus keliling segitiga: sisi1 + sisi2 + sisi3
            float sisi1 = parameter[0];    // Sisi pertama segitiga
            float sisi2 = parameter[1];    // Sisi kedua segitiga
            float sisi3 = parameter[2];    // Sisi ketiga segitiga
            keliling = sisi1 + sisi2 + sisi3;
        } else {
            System.out.println("Bentuk tidak dikenal!");
        }
        return keliling;
    }
    
        }


