package Mobile;

public class Laptop extends Mobile {
    public int ram;
    public int hardisk;
    public String processor;
    public boolean keyboard;
    public boolean layarlebar;

    public Laptop(int berat, int ram, int hardisk, boolean keyboard, boolean layarlebar, String processor) {
        super(berat);
        this.ram = ram;
        this.hardisk = hardisk;
        this.keyboard = keyboard;
        this.layarlebar = layarlebar;
        this.processor = processor;
    }


    @Override
    public void info() {
        super.info();
        System.out.println("RAM: " + ram + " GB");
        System.out.println("Hardisk: " + hardisk + " GB");
        System.out.println("Keyboard: " + (keyboard ? "Ada" : "Tidak Ada"));
        System.out.println("Layar Lebar: " + (layarlebar ? "Ya" : "Tidak"));
        System.out.println("Processor: " + processor);
    }
}
