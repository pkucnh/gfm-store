<div id="carouselExampleIndicators" class="carousel slide mt-2" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    @php
        $i = 0;
    @endphp
    @foreach ($slide_banner as $row)
      @php
        $i++;
      @endphp
    <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
      <img class="d-block w-100" src="{{asset('admin/images/banner')}}/{{$row->slide_image}}" height="650px" alt="{{$row->slide_description}}">
        <div class="carousel-caption d-none d-md-block" style="text-align: left; bottom:30%; left:12%">  
          <div class="hero__text">
            <span class="animate__animated animate__fadeInLeft animate__delay-1s">{{$row->slide_title}}</span>
            <h2 class="animate__animated animate__fadeInLeft animate__delay-2s" style="color:white">{{$row->slide_content}}</h2>
            <p class="animate__animated animate__fadeInLeft animate__delay-3s" style="color:white">Nhận và giao hàng miễn phí chỉ từ 99k</p>
            <a href="#" class="primary-btn animate__animated animate__fadeInLeft animate__delay-4s">Mua ngay</a>
          </div>
        </div>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>