<section id="intro" class="clearfix">
  <div class="container">
    <div style="float: right;">
        <img src="{{ url('/images/icons/icon-96x96.png') }}" alt="" class="img-fluid" style="width: 96px; height: 96px;">
    </div>
    <div style="text-align:center;"><h1>{{ trans('message.home.sistema') }}</h1></div>
    <div style="text-align:center;"><h3>{{ trans('message.home.titulo_01') }}</h3></div>
    <div style="text-align:center;"><h3>{{ trans('message.home.titulo_02') }}</h3></div>
    <div class="intro-img" style="text-align:center;">
      <img src="{{ url('intro-img.svg') }}" alt="" class="img-fluid" style="width: 530px; height: 300px;">
    </div>
    <div style="text-align:center;">
      <h3>{{ trans('message.home.realizado') }}<b>Tarsicio Carrizales</b></h3>
    </div>
    <div style="text-align:center;">
      <h5>{{ trans('message.home.mail') }}<b>telecom.com.ve@gmail.com</b></h5>
    </div>        
  </div>
</section><!-- #intro -->
<!-- no borrar la línea </div> de abajo, va con otra div  -->
</div>
    @include('sweetalert::alert')
    <script src="{{ url ('/js_datatable/jquery-3.5.1.js') }}" type="text/javascript"></script>
    <script src="{{ url ('/js_bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>    
</body>
</html>