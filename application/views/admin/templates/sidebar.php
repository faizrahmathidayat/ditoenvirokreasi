<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url('dek-admin-login/dashboard') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Manage Website</div>
                    <a class="nav-link" href="<?= base_url('dek-admin-login/perusahaan') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Perusahaan
                    </a>
                    <a class="nav-link" href="<?= base_url('dek-admin-login/banner') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                        Banner
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Layanan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('dek-admin-login/kategori-layanan') ?>">Kategori Layanan</a>
                            <a class="nav-link" href="<?= base_url('dek-admin-login/layanan') ?>">Layanan</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="<?= base_url('dek-admin-login/galeri') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                        Galeri
                    </a>
                    <a class="nav-link" href="<?= base_url('dek-admin-login/testimoni') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-quote-right"></i></div>
                        Testimoni
                    </a>
                    <a class="nav-link" href="<?= base_url('dek-admin-login/client') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Client
                    </a>
                    <a class="nav-link" href="<?= base_url('dek-admin-login/pesan') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                        Pesan
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= userdata()->row()->nama; ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">