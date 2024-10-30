$this->load->model('MyModel');

// Mengambil semua kolom dari tabel `users` dengan kondisi tertentu
$users = $this->MyModel->selectData('users', '*', ['status' => 'active'], ['name' => 'ASC'], 10, 0);

if ($users) {
    foreach ($users as $user) {
        echo $user->name;
    }
} else {
    echo "Tidak ada data.";
}
