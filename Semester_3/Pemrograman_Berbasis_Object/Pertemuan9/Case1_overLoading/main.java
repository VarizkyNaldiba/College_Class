package Case1_overLoading;

public class main {
    public static void main(String[] args) {
        GasStasion gs = new GasStasion();
        MobilKuno kijang = new MobilKuno();
        MobilMewah Bugatti = new MobilMewah();
        gs.isiBahanBakar(kijang);
        gs.isiBahanBakar(Bugatti);
    }
}
