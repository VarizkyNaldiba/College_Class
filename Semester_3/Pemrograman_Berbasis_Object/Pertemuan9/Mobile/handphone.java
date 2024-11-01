package Mobile;

public class handphone extends Mobile {
    public String layarkecil, camera, speaker;
    
    public handphone(String layarkecil, String camera, String speaker, int berat) {
        super(berat);
        this.layarkecil = layarkecil;
        this.camera = camera;
        this.speaker = speaker;
    }

    @Override
    public String deteksiPerangkat() {
        return "Perangkat ini adalah Handphone.";
    }

    @Override
    public int isMobile() {
        if (berat < 4) {
            System.out.println("Perangkat ini Mobile");
        } 
            System.out.println("Perangkat ini bukan Mobile");
        return berat;
    }
}

