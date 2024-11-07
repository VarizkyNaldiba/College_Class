public class employee {
    protected String name;

    public employee(String name) {
        this.name = name;
    }

    public String getEmployeeInfo() {
        return "Name:"+ name; 
    }
}
