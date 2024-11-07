public class P1 {

    public static void main(String[] args) {
        System.out.println("Program Testing Class Manager and Staff");
        Manajer man[] = new Manajer[2];
        Staff staff1[] = new Staff[2];
        Staff staff2[] = new Staff[3];

        man[0] = new Manajer();
        man[0].setNama("Tedjo");
        man[0].setNip("101");
        man[0].setGolongan("1");
        man[0].setTunjangan(5000000);
        man[0].setBagian("Administrasi");

    }
}
