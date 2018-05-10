
<div id="page-content">
<br><br><br><br><br><br><br>
        <div class="container">
          <b><h1>Daftarkan tempat anda</h1></b>
          <div id="pesan" class="roll"></div>
            <?php echo form_open('public/home/daftar_aksi', array('id' =>'form-daftar'));?>
                <div class="row">
                    <div class="block">
                        <div class="col-md-9 col-sm-9">
                            <section id="submit-form">
                                <section id="basic-information">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="service_nama">Nama tempat service</label>
                                                <input type="text" class="form-control" id="service_nama" name="service_nama" >
                                            </div><!-- /.form-group -->
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="service_tentang">Tentang</label>
                                        <textarea class="form-control" id="service_tentang" rows="4" name="service_tentang" ></textarea>
                                    </div><!-- /.form-group -->
                                </section><!-- /#basic-information -->

                                <section>
                                    <div class="row">
                                        <div class="block clearfix">
                                            <div class="col-md-6 col-sm-6">
                                                <section id="summary">
                                                    <header><h2>Data akun</h2></header>

                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="service_telepon">telepon</label>
                                                                <input type="number" class="form-control" id="service_telepon" name="service_telepon">
                                                            </div><!-- /.form-group -->
                                                        </div><!-- /.col-md-6 -->
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="submit-Baths">email</label>
                                                                <input type="email" class="form-control" id="service_email" name="service_email">
                                                            </div><!-- /.form-group -->
                                                        </div><!-- /.col-md-6 -->

                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="username">username</label>
                                                                <input type="text" class="form-control" id="username" name="username">
                                                            </div><!-- /.form-group -->
                                                        </div><!-- /.col-md-6 -->

                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="password" class="form-control" id="password" name="password">
                                                            </div><!-- /.form-group -->
                                                        </div><!-- /.col-md-6 -->

                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="konfirmasi_password">Konfirmasi Password</label>
                                                                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password">
                                                            </div><!-- /.form-group -->
                                                        </div><!-- /.col-md-6 -->
                                                    </div><!-- /.row -->

                                                    <!-- <div class="row">
                                                      <div class="col-md-12">
                                                          <section>
                                                                <header><b>Hari Buka</b></header>
                                                                <ul class="submit-features">
                                                                    <li><div class="checkbox"><label><input type="checkbox">Senin</label></div></li>
                                                                    <li><div class="checkbox"><label><input type="checkbox">Selasa</label></div></li>
                                                                    <li><div class="checkbox"><label><input type="checkbox">Rabu</label></div></li>
                                                                    <li><div class="checkbox"><label><input type="checkbox">Kamis</label></div></li>
                                                                    <li><div class="checkbox"><label><input type="checkbox">Jumat</label></div></li>
                                                                    <li><div class="checkbox"><label><input type="checkbox">Sabtu</label></div></li>
                                                                    <li><div class="checkbox"><label><input type="checkbox">Minggu</label></div></li>
                                                                </ul>
                                                            </section>
                                                      </div>
                                                    </div> -->

                                                    <!-- <div class="row">

                                                      <div class="col-md-6 col-sm-6">
                                                          <div class="form-group">
                                                              <label for="submit-garages">Jam Tutup</label>
                                                              <input type="text" class="form-control" id="submit-garages" name="garages"  >
                                                          </div>
                                                      </div>

                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="submit-garages">Jam Tutup</label>
                                                                <input type="text" class="form-control" id="submit-garages" name="garages"  >
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </section>
                                            </div><!-- /.col-md-6 -->




                                            <!-- kordinat -->
                                            <div class="col-md-6 col-sm-6">
                                              <header class="section-title">
                                                  <h2>Lokasi tempat anda</h2>
                                              </header>

                                                <section id="place-on-map" class="rumah">
                                                  <br>

                                                    <div class="form-group">
                                                        <label for="address-map">Cari lokasi anda atau <b class="link-arrow geo-location">Klik untuk mendapatkan kordinat anda saat ini</b></label>
                                                        <input type="text" class="form-control" id="address-map" name="address" placeholder="Cari Lokasi Anda">
                                                    </div><!-- /.form-group -->

                                                    <label for="address-map">Drag untuk mendapatkan kordinat</label>
                                                    <div id="submit-map"></div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="service_kordinat" name="service_kordinat" readonly>
                                                            </div><!-- /.form-group -->
                                                        </div>
                                                    </div>
                                                </section>

                                                <div class="form-group">
                                                    <label for="service_ket_alamat">Keterangan Alamat</label>
                                                    <textarea class="form-control" id="service_ket_alamat" rows="3" name="service_ket_alamat" ></textarea>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.col-md-6 -->
                                            <!-- //end kordinat -->


                                        </div><!-- /.block -->
                                    </div><!-- /.row -->
                                </section>
                                <hr>
                                <div class="form-group pull-right">
                                  <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset </button>
                                  <button type="Submit" id="daftar" data-loading-text="Sedang dalam Proses..." class="btn btn-info"><i class="fa fa-list"></i> Daftarkan </button>
                                </div>
                            </section>
                        </div><!-- /.col-md-9 -->
                      </div>
                </div><!-- /.row -->
            <?php echo form_close();?><!-- /#form-submit -->
        </div><!-- /.container -->
    </div>

<script type="text/javascript">
$('#form-daftar').submit(function(e){
  e.preventDefault();
  var me  = $(this);

  $.ajax({
    url:me.attr('action'),
    type:'post',
    data:me.serialize(),
    dataType:'json',
    success:function(response) {
      if (response.success==true) {
          //success
          $('#daftar').prop('disabled', true)
                      .button('loading');

          // $('#pesan').append('<div class="alert alert-success">'+
          //                   '<span class="fa fa-envelope-o"></span> '+
          //                   response.pesan+
          //                   '<div>');
          //$('html, body').animate({scrollTop: $('#pesan').offset().top}, 'slow');
           $('.form-group').removeClass('.has-error')
                           .removeClass('.has-success');
          $('.text-danger').remove();
          me[0].reset();
          //alert('successs');
          var token = response.token;
          var email = response.tokenn;
          $.ajax({
            url:'<?=base_url()?>send-email-verifikasi',
            type:'post',
            data:{token:token,email:email},
            dataType:'json',
            success:function(sukses) {
              $('#pesan').append('<div class="alert alert-success">'+
                                '<span class="fa fa-envelope-o"></span> '+
                                sukses.pesan+
                                '<div>');
              $('.alert-success').delay(500).show(10, function(){
                $('#daftar').button('reset');
                $('html, body').animate({ scrollTop: $('#page-top').offset().top }, 'slow');
                $('.alert-success').delay(10000).hide(10, function(){
                  $('.alert-success').remove();
                  $('#daftar').prop('disabled', false);
                });
              })
            }
          });
          // //hide alert

          //end hide alert
          //end succes
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




    _latitude  = -5.1486714;
    _longitude = 119.4340414;


    google.maps.event.addDomListener(window, 'load', initSubmitMap(_latitude,_longitude));
    function initSubmitMap(_latitude,_longitude){
        var mapCenter = new google.maps.LatLng(_latitude,_longitude);
        var mapOptions = {
            zoom: 15,
            center: mapCenter,
            disableDefaultUI: false,
            //scrollwheel: false,
            styles: mapStyles
        };
        var mapElement = document.getElementById('submit-map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new MarkerWithLabel({
            position: mapCenter,
            map: map,
            icon: '<?=config_item('public')?>img/marker.png',
            labelAnchor: new google.maps.Point(50, 0),
            draggable: true
        });
        $('#submit-map').removeClass('fade-map');
        google.maps.event.addListener(marker, "mouseup", function (event) {
            var latitude = this.position.lat();
            var longitude = this.position.lng();
            $('#service_kordinat').val( this.position.lat().toFixed(7)+','+this.position.lng().toFixed(7) );
        });

//      Autocomplete
        var input = /** @type {HTMLInputElement} */( document.getElementById('address-map') );
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            $('#service_kordinat').val( marker.getPosition().lat().toFixed(7)+','+marker.getPosition().lng().toFixed(7) );
            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });

    }

    function success(position) {
        initSubmitMap(position.coords.latitude, position.coords.longitude);
        $('#service_kordinat').val( position.coords.latitude.toFixed(7) +','+ position.coords.longitude.toFixed(7) );
    }

    $('.geo-location').on("click", function() {
        if (navigator.geolocation) {
            $('#submit-map').addClass('fade-map');
            navigator.geolocation.getCurrentPosition(success);
        } else {
            error('Geo Location is not supported');
        }
    });

</script>
