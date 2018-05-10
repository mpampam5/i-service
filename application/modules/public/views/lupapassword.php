<div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">404</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <section id="404">
                <div class="error-page">
                  <div class="jumbotron">
                    <div id="pesan" class="roll"></div>
                    <h1 style="color:red!important">Lupa password? <span class="fa fa-lock"></span></h1>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form role="form" id="form-email" action="<?=base_url()?>public/home/lupapassword">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                                </div><!-- /.form-group -->
                                <div class="form-group clearfix">
                                    <button type="submit" class="btn btn-success" id="kirim"><b>Kirim</b>  <span class="fa fa-envelope-o"></span></button>
                                </div><!-- /.form-group -->
                            </form>
                            <hr>
                            <div class="center">Masukkan email anda untuk mendapatkan link konfigurasi!</div>
                        </div>
                    </div><!-- /.row -->
                  </div>
                </div>
            </section>
        </div><!-- /.container -->
</div>

        <script type="text/javascript">
          $('#form-email').submit(function(e){
            e.preventDefault();
            var me = $(this);
            $.ajax({
              url     :me.attr("action"),
              type    :"post",
              data    :me.serialize(),
              dataType:"json",
              success :function(response){
                if (response.success==true) {
                  $('.form-group').removeClass('.has-error')
                                  .removeClass('.has-success');
                 $('.text-danger').remove();
                 me[0].reset();
                 $('#pesan').append('<div class="alert alert-success">'+
                                   '<span class="fa fa-envelope-o"></span> '+
                                   response.pesan+
                                   '<div>');
                  $('.alert-success').delay(500).show(10, function(){
                   $('.alert-success').delay(3000).hide(10, function(){
                     $('.alert-success').remove();
                   });
                 })//end success
                }else {
                  //error
                  $.each(response.messages, function(key, value) {
                    var element = $('#' + key);
                    $(element)
                    .closest('.form-group')
                    .removeClass('has-error')
                    .removeClass('has-success')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger').remove();
                    $(element).after(value);
                  });
                }
              }

            });



          });
        </script>
