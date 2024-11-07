public class main {
    public static void main(String[] args) {
        PermanentEmployee pEmp = new PermanentEmployee("Dedik", 500);
       InternshipEmployee iEmp = new InternshipEmployee("Sunarto", 5);
       electricityBill eBill = new electricityBill(5,"A-1");
       employee e;
       payable p;
       e = pEmp;
       e = iEmp;
       p = pEmp;
       p = eBill;

    }
}