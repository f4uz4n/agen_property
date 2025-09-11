# Fitur Laporan Penjualan & Performa Agen

## Deskripsi

Fitur laporan ini menyediakan berbagai macam laporan untuk analisis penjualan properti dan performa agen dengan filter berdasarkan tahun dan bulan.

## File yang Dibuat

### 1. Model

- **`app/Models/LaporanModel.php`** - Model untuk menangani query data laporan

### 2. Controller

- **`app/Controllers/Dashboard/Laporan.php`** - Controller untuk menangani semua fungsi laporan

### 3. Views

- **`app/Views/dashboard/laporan/index.php`** - Halaman utama laporan dengan dashboard statistik
- **`app/Views/dashboard/laporan/penjualan.php`** - Laporan detail penjualan properti
- **`app/Views/dashboard/laporan/performa_agen.php`** - Laporan performa agen
- **`app/Views/dashboard/laporan/detail_agen.php`** - Detail penjualan per agen
- **`app/Views/dashboard/laporan/export_penjualan_pdf.php`** - Template export PDF penjualan
- **`app/Views/dashboard/laporan/export_performa_agen_pdf.php`** - Template export PDF performa agen
- **`app/Views/dashboard/laporan/export_penjualan_excel.php`** - Template export Excel penjualan
- **`app/Views/dashboard/laporan/export_performa_agen_excel.php`** - Template export Excel performa agen

### 4. Routes

Routes telah ditambahkan di `app/Config/Routes.php`:

```php
$routes->group('laporan', function ($routes) {
    $routes->get('/', 'Laporan::index');
    $routes->get('penjualan', 'Laporan::penjualan');
    $routes->get('performa-agen', 'Laporan::performaAgen');
    $routes->get('detail-agen/(:num)', 'Laporan::detailAgen/$1');
    $routes->get('export-penjualan-pdf', 'Laporan::exportPenjualanPdf');
    $routes->get('export-penjualan-excel', 'Laporan::exportPenjualanExcel');
    $routes->get('export-performa-agen-pdf', 'Laporan::exportPerformaAgenPdf');
    $routes->get('export-performa-agen-excel', 'Laporan::exportPerformaAgenExcel');
    $routes->get('get-data-penjualan', 'Laporan::getDataPenjualan');
    $routes->get('get-data-performa-agen', 'Laporan::getDataPerformaAgen');
});
```

## Fitur yang Tersedia

### 1. Dashboard Laporan

- **URL**: `/dashboard/laporan`
- **Fitur**:
  - Statistik overview (total transaksi, omset, rata-rata harga, harga tertinggi)
  - Filter berdasarkan tahun dan bulan
  - Grafik penjualan per bulan
  - Menu navigasi ke laporan penjualan dan performa agen

### 2. Laporan Penjualan Properti

- **URL**: `/dashboard/laporan/penjualan`
- **Fitur**:
  - Detail penjualan properti dengan informasi lengkap
  - Filter berdasarkan tahun dan bulan
  - Laporan penjualan berdasarkan kategori
  - Export ke PDF dan Excel
  - Tabel dengan DataTables untuk sorting dan searching

### 3. Laporan Performa Agen

- **URL**: `/dashboard/laporan/performa-agen`
- **Fitur**:
  - Ranking agen berdasarkan total omset
  - Statistik per agen (total penjualan, omset, rata-rata harga)
  - Filter berdasarkan tahun dan bulan
  - Export ke PDF dan Excel
  - Link ke detail penjualan per agen

### 4. Detail Penjualan Agen

- **URL**: `/dashboard/laporan/detail-agen/{agent_id}`
- **Fitur**:
  - Detail penjualan per agen
  - Informasi lengkap agen
  - Filter berdasarkan tahun dan bulan
  - Tabel detail transaksi

### 5. Export Laporan

- **PDF Export**: `/dashboard/laporan/export-penjualan-pdf` dan `/dashboard/laporan/export-performa-agen-pdf`
- **Excel Export**: `/dashboard/laporan/export-penjualan-excel` dan `/dashboard/laporan/export-performa-agen-excel`

## Filter yang Tersedia

### Filter Tahun

- Menampilkan data berdasarkan tahun tertentu
- Default: tahun saat ini
- Data tahun diambil dari database transaksi

### Filter Bulan

- Menampilkan data berdasarkan bulan tertentu
- Default: bulan saat ini
- Opsi "Semua Bulan" untuk menampilkan data sepanjang tahun
- Data bulan diambil berdasarkan tahun yang dipilih

## Statistik yang Ditampilkan

### Statistik Umum

- Total Transaksi
- Total Omset
- Rata-rata Harga
- Harga Terendah
- Harga Tertinggi

### Statistik Per Agen

- Total Penjualan
- Total Omset
- Rata-rata Harga Jual
- Tanggal Penjualan Pertama
- Tanggal Penjualan Terakhir

### Statistik Per Kategori

- Total Transaksi per Kategori
- Total Omset per Kategori
- Rata-rata Harga per Kategori

## Akses Menu

Menu laporan hanya dapat diakses oleh:

- **Owner** (`role = 'owner'`)
- **Admin** (`role = 'admin'`)

Menu laporan tidak dapat diakses oleh:

- **Agen** (`role = 'agen'`)

## Dependencies

- **Chart.js** - Untuk grafik statistik
- **DataTables** - Untuk tabel interaktif
- **Dompdf** - Untuk export PDF
- **Bootstrap** - Untuk styling

## Cara Penggunaan

1. **Akses Menu Laporan**

   - Login sebagai Owner atau Admin
   - Klik menu "Laporan" di sidebar

2. **Filter Data**

   - Pilih tahun dan bulan yang diinginkan
   - Klik tombol "Filter" untuk menerapkan filter

3. **Lihat Laporan**

   - Klik "Lihat Laporan" untuk penjualan properti
   - Klik "Lihat Laporan" untuk performa agen

4. **Export Laporan**

   - Klik tombol "Export PDF" atau "Export Excel"
   - File akan otomatis terdownload

5. **Detail Agen**
   - Dari laporan performa agen, klik tombol "Detail"
   - Akan menampilkan detail penjualan agen tersebut

## Catatan Penting

1. **Data Transaksi**: Laporan hanya menampilkan transaksi dengan status "selesai"
2. **Filter Waktu**: Filter berdasarkan `tanggal_penjualan` di tabel transactions
3. **Performa Agen**: Dihitung berdasarkan properti yang dijual oleh agen
4. **Export**: File export akan menggunakan nama file dengan format `laporan_[jenis]_[tahun]_[bulan].[format]`

## Troubleshooting

1. **Data Kosong**: Pastikan ada transaksi dengan status "selesai" di database
2. **Error Export**: Pastikan library Dompdf sudah terinstall
3. **Menu Tidak Muncul**: Pastikan user login dengan role "owner" atau "admin"
4. **Filter Tidak Berfungsi**: Pastikan parameter tahun dan bulan dikirim dengan benar
