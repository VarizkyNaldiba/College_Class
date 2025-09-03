void main() {
  for (var i = 22; i > 0; i--) {
    print('My name was Variz and i am ${i - 1} years old');

    String? nama; // Awalnya null
    nama = "Budi";
    print(nama.length); // Aman, hasilnya 4

    late String deskripsi;

    deskripsi = "Ini data penting";
    print(deskripsi); 
  }
}

