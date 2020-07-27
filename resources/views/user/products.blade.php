@include('user.header')




<div class="container-fluid" style="margin-bottom: 1.7%;">
	<div class="row" style="margin-top: 0.5%;" hidden="hidden">
	    <form action="/action_page.php" style="margin: auto;">
	      <input type="text" placeholder="Search.." name="search">
	      <button type="submit" style="margin-left: -5px;"><i class="fa fa-search"></i></button>
	    </form>
	</div>
	<div class="row" style="padding-left: 5%;">
		<div class="card cursorr col-sm-2 productmargin"" data-toggle="modal" data-target="#gc">
		    <img class="card-img-top productimage" src="{{asset('images/ProductImages/coffee.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Gingano Coffee</h4>
		      <!--<p class="card-text producttext tc">NRs. 1,000/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#ggt">
		    <img class="card-img-top productimage" src="{{asset('images/ProductImages/GreenTea.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Gingano Green Tea</h4>
		      <!--<p class="card-text producttext tc">NRs. 600/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#gt">
		    <img class="card-img-top productimage" src="{{asset('images/ProductImages/toothpaste.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">GNMP Toothpaste</h4>
		      <!--<p class="card-text producttext tc">NRs. 300/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#dcs">
		    <img class="card-img-top productimage" src="{{asset('images/ProductImages/soap.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Derma Care Soap</h4>
		      <!--<p class="card-text producttext tc">NRs. 200/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#mo">
		    <img class="card-img-top productimage" style="max-width: 30%;" src="{{asset('images/ProductImages/oil.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Massage Oil</h4>
		      <!--<p class="card-text producttext tc">NRs. 600/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<!-- <div class="card cursorr col-sm-2 productmargin"></div> -->
	</div>

	<div class="row" style="padding-left: 5%;">
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#c">
		    <img class="card-img-top productimage" style="max-width: 60%;" src="{{asset('images/ProductImages/cordyceps.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Cordyceps</h4>
		      <!--<p class="card-text producttext tc">NRs. 2,650/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#yg">
		    <img class="card-img-top productimage" style="max-width: 60%;" src="{{asset('images/ProductImages/youngG.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Young G</h4>
		      <!--<p class="card-text producttext tc">NRs. 2,500/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#al">
		    <img class="card-img-top productimage" style="max-width: 60%;" src="{{asset('images/ProductImages/lingzhi.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">A1-Lingzhi</h4>
		      <!--<p class="card-text producttext tc">NRs. 5,000/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#g">
		    <img class="card-img-top productimage" style="max-width: 60%;" src="{{asset('images/ProductImages/ginseng.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Ginseng</h4>
		      <!--<p class="card-text producttext tc">NRs. 2,300/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#sp">
		    <img class="card-img-top productimage" style="max-width: 60%;" src="{{asset('images/ProductImages/spirulina.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitl producttitlecenter">Spirulina</h4>
		      <!--<p class="card-text producttext tc">NRs. 900/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<!-- <div class="card cursorr col-sm-2 productmargin"></div> -->
	</div>

	<div class="row" style="padding-left: 5%;">
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#no">
		    <img class="card-img-top productimage" style="max-width: 60%;" src="{{asset('images/ProductImages/noni.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Noni</h4>
		      <!--<p class="card-text producttext tc">NRs. 1,100/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#om">
		    <img class="card-img-top productimage" style="max-width: 60%;" src="{{asset('images/ProductImages/omega.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Omega</h4>
		      <!--<p class="card-text producttext tc">NRs. 2,500/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#gm">
		    <img class="card-img-top productimage" style="max-width: 60%;" src="{{asset('images/ProductImages/glucosamine.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Glucosamine</h4>
		      <!--<p class="card-text producttext tc">NRs. 1,500/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
		<div class="card cursorr col-sm-2 productmargin" data-toggle="modal" data-target="#yc">
		    <img class="card-img-top productimage" style="max-width: 60%;" src="{{asset('images/ProductImages/yarsacs.png')}}" alt="">
		    <div class="card-body">
		      <h4 class="card-title proucttitle producttitlecenter">Yarsa-CS</h4>
		      <!--<p class="card-text producttext tc">NRs. 5,300/-</p>-->
		      <p class="card-text producttext tc clickdetailcolor">Click for details</p>
		    </div>
		</div>
	</div>

</div>

@include('user.modalProducts')


@include('user.footer')