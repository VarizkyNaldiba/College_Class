package Mobile;

public class handphone extends Mobile {
    private String camera;
    private String speaker;
    private boolean layarkecil;
    
    public handphone(boolean layarkecil, String camera, String speaker, int berat) {
        super(berat);
        this.layarkecil = layarkecil;
        this.camera = camera;
        this.speaker = speaker;
    }

    @Override
    public void info() {
        super.info();
        System.out.println("Layar Kecil: " + (layarkecil ? "Ya" : "Tidak"));
        System.out.println("Camera: " + camera);
        System.out.println("Speaker: " + speaker);
    }
}
