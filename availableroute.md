Route = "{{host}}/api/ticket"

Kendaraan Masuk
Method: POST
Data request =
{
“platNomor”: ”B 1234 KI”,
“warna”: “hitam”,
“tipe”: “SUV”
}
Data response =
{
“platNomor”: “B 1234 KI”,
“parkingLot”: “A1”,
“tanggalMasuk”: “2020-07-20

Route = "{{host}}/api/ticket/exit"

Kendaraan Keluar (Sistem akan otomatis menghitung biaya parkir dan mengosongkan
lot parkir)
Method: POST 
Data request =
{
“platNomor”: ”B 1234 KI”
}
Data response =
{
“platNomor”: “B 1234 KI”,
“tanggalMasuk”: “2020-07-20 10:00”,
“tanggalKeluar”: “2020-07-20 15:00”,
“jumlahBayar”: “27000”
}

Route = "{{host}}/api/report/jumlahkendaraan"

Report Jumlah Mobil Per Tipe
Method: POST 
Data request =
{
“tipe”: ”SUV”
}
Data response =
{
“jumlahKendaraan”: “1”
}


Route= "{{host}}/api/report/platwarna"

List Nomor Kendaraan Sesuai Warna
Method: POST 
Data request =
{
“warna”: ”Hitam”
}
Data response =
{
“platNomor”: [
“B 1234 KI”,
“B 7835 OK”,
“B 1089 ZK”
]
}