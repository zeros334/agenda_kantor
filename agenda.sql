CREATE TABLE agenda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    tanggal DATE NOT NULL,
    waktu TIME
);
