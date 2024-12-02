var jumlahKopi = 1;

function tambahkopi() {
    jumlahKopi++;
    updateTampilanKopi();
}

function kurangkopi() {
    if (jumlahKopi > 1) {
        jumlahKopi--;
    }
    updateTampilanKopi();
}
function updateTampilanKopi() {
    document.getElementById("banyak-kopi").innerText = jumlahKopi;
}
function printReceipt() {
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=300, initial-scale=1.0">
        <title>Struk</title>
    </head>
<body>
    <table border="1" width="100%" style="border-collapse: collapse;">
  <tr>
    <th colspan="2">Struk pembelian</th>
  </tr>
  <tr>
    <td>Store Name:</td>
    <td>CoffeinAja Sltg</td>
  </tr>
  <tr>
    <td>Date:</td>
    <td>2004-12-20</td>
  </tr>
  <tr>
    <td>Time:</td>
    <td>15:13:23</td>
  </tr>
  <tr>
    <td>Receipt No:</td>
    <td>TRCF001</td>
  </tr>
  <tr>
    <td colspan="2">Items:</td>
  </tr>
  <tr>
    <td>Jenis Kopi</td>
    <td>Kopi Arabica</td>
  </tr>
  <tr>
    <td>Ukuran</td>
    <td>Regular</td>
  </tr>
  <tr>
    <td>Jenis Penyajian</td>
    <td>Dingin</td>
  </tr>
  <tr>
    <td>Jenis Topping</td>
    <td>Ban</td>
  </tr>
  <tr>
    <td colspan="2">Total: Rp.50000</td>
  </tr>
  <tr>
    <td colspan="2">Payment Method: Cash/Card</td>
  </tr>
  <tr>
    <td colspan="2">Change: Rp.4000</td>
  </tr>
</table>
</body>
</html>
    `);
    printWindow.document.close();
    printWindow.print();
}