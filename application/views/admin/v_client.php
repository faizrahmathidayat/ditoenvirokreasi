<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Client</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('dek-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Client</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Client
            </div>
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-3" id="btn_tambah_client" data-bs-toggle="modal" data-bs-target="#modal_tambah_client"><i class="fas fa-plus"></i> Tambah</button>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($client as $clients) : ?>
                            <tr>
                                <td class="text-justify"><?= $clients->deskripsi ?></td>
                                <td><img style="width:200px;" src="<?= base_url('uploads/client/' . $clients->gambar) ?>" alt=""></td>
                                <td class="text-center"><button class="btn btn-sm btn-danger btn_hapus_client" data-id="<?= $clients->id ?>" data-filename="<?= $clients->gambar ?>"><i class="fas fa-trash"></i></button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('admin/modal/client/v_modal_add') ?>