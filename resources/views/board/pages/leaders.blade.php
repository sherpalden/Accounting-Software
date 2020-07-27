@include('board.header-board')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<div class="content">
	<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" id="SearchHeader">
            <h4 class="card-title ">Leaders Table</h4>
            <button id="openAddLeaderAjaxButton" class="btn-warning" style="font-size:24px">Register leader <i class="fa fa-user-plus"></i></button>
                <!-- <form class="navbar-form pull-right" style="width: 30%;"> -->
                  <div class="navbar-form input-group no-border pull-right" style="width: 30%;">
                    <input id="LeaderSearch" type="text" style="background-color: #EEEEEE;" class="form-control" placeholder="Search by first name...">
                  </div>
                <!-- </form> -->
          </div>
          <div id="modalLoading" hidden>
         <!-- data comes from js -->
          </div>
<div id="LeaderPage"></div>
</div>



@include('board.footer-board')

<script type="text/javascript" src="{{asset('js/boardLeader.js')}}"></script>