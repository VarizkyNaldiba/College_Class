public class InternshipEmployee extends employee {
    private int length;

    public InternshipEmployee(String name, int length) {
        super(name);
        this.length = length;
    }

    public int getLength() {
        return length;
    }

    public void setLength(int length) {
        this.length = length;
    }

    @Override
    public String getEmployeeInfo() {
        String info = super.getEmployeeInfo()+"\n";
        info += "Registered as internship employee for " + length + " motnh/s\n";
        return info;
    }
}
