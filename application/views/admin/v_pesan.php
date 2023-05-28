<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pesan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('dek-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Pesan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Pesan
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Bidang Usaha</th>
                            <th>Judul</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($message as $messages) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($messages->nama) ?></td>
                                <td><?= $messages->email ?></td>
                                <td><?= htmlspecialchars($messages->bidang_usaha) ?></td>
                                <td><?= htmlspecialchars($messages->subject) ?></td>
                                <td><?= htmlspecialchars($messages->message) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>