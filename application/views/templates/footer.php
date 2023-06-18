<footer>
    <!--? Footer Start-->
    <div class="footer-area section-bg" data-background="<?= base_url() ?>assets/img/gallery/footer_bg.jpg">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="<?= base_url() ?>"><img src="<?= get_logo() ?>" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <!-- <div class="footer-pera">
                                    <p class="info1">Receive updates and latest news direct from Simply enter.</p>
                                </div> -->
                            </div>
                            <div class="footer-number">
                                <h4><?= !empty(get_perusahaan()) ? get_perusahaan()->telepon : '-' ?></h4>
                                <p><?= !empty(get_perusahaan()) ? get_perusahaan()->email : '-' ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>LAYANAN</h4>
                                <ul>
                                    <?php if (count(get_category()->result()) > 0) : ?>
                                        <?php foreach (get_category()->result() as $category) : ?>
                                            <li>
                                                <a href="<?= base_url('layanan/' . $category->id) ?>"><?= $category->judul ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>TENTANG KAMI</h4>
                                <ul>
                                    <li><a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Lokasi Kantor</h4>
                                <div class="footer-pera">
                                    <p class="info1"><?= !empty(get_perusahaan()) ? get_perusahaan()->alamat_kantor : '-' ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Lokasi Workshop</h4>
                                <div class="footer-pera">
                                    <p class="info1"><?= !empty(get_perusahaan()) ? get_perusahaan()->alamat_workshop : '-' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                <?= !empty(get_perusahaan()) ? get_perusahaan()->nama_perusahaan : '-' ?> &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script src="<?php echo base_url() ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?php echo base_url() ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="<?php echo base_url() ?>assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?php echo base_url() ?>assets/js/wow.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/animated.headline.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.js"></script>

<!-- Nice-select, sticky -->
<script src="<?php echo base_url() ?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.sticky.js"></script>

<!-- counter , waypoint -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.counterup.min.js"></script>

<!-- contact js -->
<script src="<?php echo base_url() ?>assets/js/contact.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/mail-script.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url() ?>assets/js/main.js"></script>
<?php $js != null ? $this->load->view('JS/' . $js) : '';  ?>
<script type="text/javascript">
    (function() {
        var options = {
            whatsapp: <?= !empty(get_perusahaan()) ? get_perusahaan()->telepon : '0' ?>, // WhatsApp number
            call_to_action: "Kirimi kami pesan", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol,
            host = "getbutton.io",
            url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function() {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
</script>

</body>

</html>