package Mobile;

public class Laptop extends Mobile {
    public int ram, hardisk;
    public String keyboard, layarlebar, proccessor;

    public Laptop(int berat, int ram, int hardisk, String keyboard, String layarlebar, String proccessor) {
        super(berat);
        this.ram = ram;
        this.hardisk = hardisk;
        this.keyboard = keyboard;
        this.layarlebar = layarlebar;
        this.proccessor = proccessor;
    }

    @Override
    public int isMobile() {
        if (berat < 4) {
            System.out.println("Perangkat ini Mobile");
        } else {
            System.out.println("Perangkat ini bukan Mobile");
        }
        return berat;
    }

    @Override
    public String deteksiPerangkat() {
        return "Perangkat ini adalah Laptop.";
    }

}
