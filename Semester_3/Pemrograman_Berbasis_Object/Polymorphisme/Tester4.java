public class Tester4{
    public static void main(String[] args) {
    owner owner = new owner();
    electricityBill eBill = new electricityBill(5, "R-1");
    PermanentEmployee pEmp = new PermanentEmployee("Dedik", 500);
    InternshipEmployee iEmp = new InternshipEmployee("Sunarto", 5);
    owner.pay(eBill);
    owner.pay(pEmp);
    owner.showMyEmployee(pEmp);
    owner.showMyEmployee(iEmp);
    }
} 
    

