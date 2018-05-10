<style media="screen">
  #map_daftar{
    width: 100%;
    height: 300px;
  }
</style>
        <!-- Breadcrumb -->
<br><br><br><br><br><br><br>
        <!-- end Breadcrumb -->

        <div class="container">

            <header><h1>Daftakan tempat anda!</h1></header>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                    <form role="form" id="form-create-account" method="post" >

                        <div class="form-group">
                            <label for="service_name">Nama Tempat/toko:</label>
                            <input type="text" class="form-control" id="service_name" name="service_name">
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label for="telepon">telepon:</label>
                            <input type="number" class="form-control" id="telepon" name="telepon">
                        </div><!-- /.form-group -->


                          <section>
                            <div id="map_daftar" class="has-parallax"></div>
                            <div id="current"><b style="color:red">Drag & drop untuk mendapatkan kordinat</b></div>
                          </section>

                          <div class="form-group">
                            <label for="kordinat">Kordinat:</label>
                              <input type="text" class="form-control" id="kordinat" name="kordinat"  disabled>
                          </div><!-- /.form-group -->

                        <div class="form-group">
                            <label for="form-create-account-email">username:</label>
                            <input type="text" class="form-control" id="username" required>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label for="form-create-account-password">Password:</label>
                            <input type="password" class="form-control" id="form-create-account-password" required>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-create-account-confirm-password">Confirm Password:</label>
                            <input type="password" class="form-control" id="form-create-account-confirm-password" required>
                        </div><!-- /.form-group -->
                        <hr>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="account-type-newsletter" name="check"  onchange="document.getElementById('simpan').disabled = !this.checked;" >Apakah data yang anda masukkan benar?
                            </label>
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" class="btn pull-right btn-default" id="simpan" disabled>Daftarkan</button>
                        </div><!-- /.form-group -->
                    </form>
                    <hr>

                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
