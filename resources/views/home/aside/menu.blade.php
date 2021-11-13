<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3" style="z-index: 1000">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục</span>
                    </div>
                    <ul>
                        @foreach($category as $row)
                            <li>
                                <a class="chevron-left" data-id="{{$row->id}}" data-toggle="collapse" href="#{{$row->slug}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <span class="badge pull-right"><i class="fas fa-chevron-left chevron-left{{$row->id}}"></i></span>
                                    {{$row->name}}
                                </a>
                                <div class="collapse items" id="{{$row->slug}}">
                                    @foreach ($child_cate as $val)
                                        @if ($val->id_category == $row->id)
                                            <a href="{{url('loai-san-pham')}}/{{$val->id}}/{{$val->slug}}">{{$val->name}}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9" style="z-index: 1000">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form autocomplete="off" action="{{asset('/tim-kiem')}}" method="POST">
                            @csrf
                            <input type="search" name="tukhoa" id="keywords" placeholder="Bạn muốn tìm gì?">
                            <button type="submit" class="site-btn">Tìm kiếm</button>
                            {{-- <div id="timkiem_ajax"></div> --}}
                        </form>
                    </div>
                    <div id="timkiem_ajax"></div>

                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+84 81.799.175</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
                <div id="timkiem_ajax"></div>

            </div>
        </div>
    </div>
    {{-- @include('home.aside.slide') --}}
</section>