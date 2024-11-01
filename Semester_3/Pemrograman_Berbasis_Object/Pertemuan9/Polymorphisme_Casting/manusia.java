package Polymorphisme_Casting;

public class manusia {
    public void makanBuah(Buah x) {
        if(x instanceof Apel) {
            System.out.println("Apel langsung dimakan");
            ((Apel) x).tampilkanBiji();
        } else if(x instanceof pisang) {
            System.out.println("Pisang dikupas");
            ((pisang) x).tampilkanKulit();
    }
    System.out.println("Rasanya : " + x.rasa);
}
}

