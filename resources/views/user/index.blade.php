@include('user.header')

<!--banner-->
<section>
  <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner indexcarousel">
    <div class="carousel-item active">
      <img src="{{asset('images/Image/1.jpg')}}" class="car" alt="Nepal"  height="auto" width="100%">
      <div class="carousel-caption">
        <h3>Nepal</h3>
        <p>Great time in Nepal!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/Image/2.jpg')}}" class="car" alt="Nepal"  height="auto" width="100;">
      <div class="carousel-caption">
        <h3>Nepal</h3>
        <p>Thank you</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/Image/3.jpg')}}" class="car" alt="Nepal" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>Nepal</h3>
        <p>We love this place</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</section>

<!--section-->
<section class="sec" style="margin-top: 2%; margin-bottom: 3%;">
  <div class="container halfsection">
    <div class="row">
      <div class="col-lg-6">
          <div class="card" >
    <div class="card-body">
      <h4 class="card-title">King of Herbs</h4>
      <a href="{{asset('images/Image/reishi.jpg')}}">
      <img class="img-thumbnail indexshadow" src="{{asset('images/Image/reishi.jpg')}}" style="height: auto; width: 100%;">
      </a>
      <p class="card-text" style="margin-top: 2%;">
        The lingzhi mushroom is a polypore mushroom belonging to the genus Ganoderma. Its red-varnished, kidney-shaped cap gives it a distinct appearance. When fresh, the lingzhi is soft, cork-like, and flat. It lacks gills on its underside, and instead releases its spores via fine pores. Depending on the age of the mushroom, the pores on its underside may be white or brown. 
        <a href="https://en.wikipedia.org/wiki/Lingzhi_mushroom" style="color: #089000;"> Read more</a>
      </p>
    </div>
  </div>
      </div>
      
      <div class="col-lg-6">
        <div class="row"><div class="card" >
    <div class="card-body">
      <h4 class="card-title">Wild Mountain Root </h4>
      <p class="card-text">
        <a href="{{asset('images/Image/ginseng.jpg')}}">
        <img class="rounded indexshadow" src="{{asset('images/Image/ginseng.jpg')}}" style="height: auto; width: 100%; max-width: 150px; float: left; overflow: auto; clear: both; margin-right: 3.5%; margin-top: 1.5%;">
        </a>
      Wild ginseng (Hangul: Hanja: RR: sansam; lit. mountain ginseng) grows naturally in mountains and is hand-picked by gatherers known as simmani. It is relatively rare and even increasingly endangered due to high demand for the product in recent years, leading to the harvest of wild plants faster than the growth which can take years to reach maturity. Wild ginseng can be processed to be red or white ginseng.
      <a href="https://en.wikipedia.org/wiki/Ginseng#Wild_ginseng" style="color: #089000;">
        Read more
      </a>
    </p>
    </div>
  </div></div>
        <div class="row sec"><div class="card">
    <div class="card-body">
      <h4 class="card-title">Decaffeinated coffee</h4>
      <p class="card-text">
        <img class="rounded indexshadow" src="{{asset('images/Image/coffee.jpg')}}" style="width: 100%; height: auto; max-width: 370px; float: right;">
        Decaffeination is the removal of caffeine from coffee beans, cocoa, tea leaves, and other caffeine-containing materials. While soft drinks which do not use caffeine as an ingredient are sometimes described as "decaffeinated", they are better termed "non-caffeinated" because decaffeinated implies that there was caffeine present at one point in time. Decaffeinated drinks contain typically 1–2% of the original caffeine content, and sometimes as much as 20%.Decaffeinated products are commonly termed decaf.
    </p>
    </div>
  </div></div>
  
      </div>
    </div>
  </div>
</section>

<!--footer-->


@include('user.footer')