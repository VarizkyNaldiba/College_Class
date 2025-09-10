void main() {
  for (int i = 2; i <= 201; i++) {
    bool BilPrima = true;
    for (int j = 2; j <= i / 2; j++) {
      if (i % j == 0) {
        BilPrima = false;
        break;
      }
    }
    if (BilPrima) {
      print('Varizky Naldiba Rimra (2341720243) angka prima = ' + i.toString());
    }
  }
}
