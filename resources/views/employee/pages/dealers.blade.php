@include('employee.header-employee')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" id="SearchHeader">
            <h4 class="card-title ">Dealers Table</h4>
            <button id="openAddDealerAjaxButton" class="btn-warning" style="font-size:24px">Register dealer <i class="material-icons">store_mall_directory</i></button>
                <!-- <form class="navbar-form pull-right" style="width: 30%;"> -->
                  <div class="navbar-form input-group no-border pull-right" style="width: 30%;">
                    <input id="LeaderSearch" type="text" style="background-color: #EEEEEE;" class="form-control" placeholder="Search by dealer name...">
                  </div>
                <!-- </form> -->
          </div>
          <div id="modalLoading" hidden>
         <!-- data comes from js -->
          </div>
<div id="DealerPage"></div>
</div>


@include('employee.footer-employee')

<script type="text/javascript" src="{{asset('js/boardDealer.js')}}"></script>