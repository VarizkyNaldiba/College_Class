package Tugas;

public class segitiga {
    private int sudut;

    public int totalSudut(int sudutA) {
        return 180 - sudutA;
    }

    public int totalSudut(int sudutA, int sudutB) {
        return 180 - (sudutA + sudutB);
    }

    public int keliling(int sisiA, int sisiB, int sisiC) {
        return sisiA + sisiB + sisiC;
    }

    public double keliling(int sisiA, int sisiB) {
        return Math.sqrt(sisiA * sisiA) + Math.sqrt(sisiB * sisiB);
    }

    public static void main(String[] args) {
        segitiga segitiga = new segitiga();

        System.out.println("Total sudut dengan 1 sudut: " + segitiga.totalSudut(60));
        System.out.println("Total sudut dengan 2 sudut: " + segitiga.totalSudut(60, 30));

        System.out.println("Keliling dengan 3 sisi: " + segitiga.keliling(3, 4, 5));
        System.out.println("Keliling dengan 2 sisi (hipotenusa): " + segitiga.keliling(3, 4));
    }
}
