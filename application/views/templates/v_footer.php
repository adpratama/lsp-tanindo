<section class="py-5" id="kontak">
  <div class="bg-holder" style="
                  background-image: url(<?= base_url('material/') ?>assets/img/illustrations/footer-bg.png);
                  background-position: center;
                  background-size: cover;
               "></div>
  <!--/.bg-holder-->

  <div class="container">
    <div class="row justify-content-lg-between min-vh-50">
      <div class="col-12">
        <div class="card bg-success">
          <div class="card-body p-sm-4">
            <div class="row">
              <div class="col-md-8 col-12">
                <h6 class="mb-3 text-1000 fw-semi-bold">
                  Alamat Kami
                </h6>
                <p class="mb-0 text-white">
                  <span class="text-white fs--1 fs-sm-1">Sekretariat Vivo Business Park A31 Unit
                    I,<br />
                    Jl. Pembangunan 3 Karang Anyar,
                    Neglasari, <br />
                    Kota Tangerang, Banten 15121,
                    <br />
                    Telp. 021-5958 5665, 0817 6322 965
                    <br />
                  </span>
                </p>
              </div>
              <div class="col-md-4 col-12">
                <h6 class="mb-3 text-1000 fw-semi-bold">
                  Hubungi kami
                </h6>
                <ul class="list-unstyled mb-md-4 mb-lg-0 text-white">
                  <li class="mb-3">
                    <i class="bi bi-facebook"></i>&nbsp; Lsp
                    Tanindo
                  </li>
                  <li class="mb-3">
                    <i class="bi bi-instagram"></i>&nbsp;
                    @lsp_tanindo
                  </li>
                  <li class="mb-3">
                    <i class="bi bi-tiktok"></i>&nbsp;
                    @lsp.tanindo
                  </li>
                  <li class="mb-3">
                    <i class="bi bi-youtube"></i>&nbsp; LSP
                    Tanindo
                  </li>
                  <li class="mb-3">
                    <i class="bi bi-twitter-x"></i>&nbsp;
                    @LspTanindo
                  </li>
                  <li class="mb-3">
                    <i class="bi bi-envelope"></i>&nbsp;
                    admin@lsptanindo.com
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr class="text-300 mb-0" />
    <div class="row flex-center py-5">
      <div class="col-12 col-sm-8 col-md-6 text-center text-md-start">
        <a class="text-decoration-none" href="#"><img class="d-inline-block align-top img-fluid" src="<?= base_url('material/') ?>assets/img/gallery/logo-icon-tanindo.png" alt="" width="40" /><span class="text-theme font-monospace fs-3 ps-2">Tanindo</span></a>
      </div>
      <div class="col-12 col-sm-8 col-md-6">
        <p class="fs--1 text-dark my-2 text-center text-md-end">
          &copy; 2024 LSP Tanindo
          <br />
          This template is made with Love by
          <a class="text-dark" href="https://themewagon.com/" target="_blank">ThemeWagon
          </a>
        </p>
      </div>
    </div>
  </div>
</section>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="<?= base_url('material/') ?>vendors/@popperjs/popper.min.js"></script>
<script src="<?= base_url('material/') ?>vendors/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url('material/') ?>vendors/is/is.min.js"></script>
<!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script> -->
<script src="<?= base_url('material/') ?>assets/js/theme.js"></script>
<script>
  function downloadFile() {
    var link = document.createElement("a");
    link.href = "<?= base_url('material/') ?>assets/document/compro_lsp_tanindo_2024.pptx";
    link.download = "compro_lsp_tanindo_2024.pptx";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }
</script>
</body>

</html>