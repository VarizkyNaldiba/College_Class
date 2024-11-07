public class Tester2 {
    public static void main(String[] args) {
        // Membuat objek PermanentEmployee
        PermanentEmployee pEmp = new PermanentEmployee("Dedik", 500);
        
        // Mendeklarasikan variabel bertipe Employee
        employee e;
        
        // Menugaskan objek pEmp ke variabel e
        e = pEmp;
        
        // Menampilkan informasi karyawan dari variabel e
        System.out.println("" + e.getEmployeeInfo());
        System.out.println("--");
        
        // Menampilkan informasi karyawan dari objek pEmp
        System.out.println("" + pEmp.getEmployeeInfo());
    }
}
