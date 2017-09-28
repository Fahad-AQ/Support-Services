
  <div class="inner">
    <div class="contentpanel">
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>Dashboard</h1>
          <h2 class="">Admin</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_dashboard'); ?>">Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </div>
      </div>
      <!-- <div class="row">
          
          <div class="col-sm-3 col-sm-6">
            <div class="information blue_info">
              <div class="information_inner">
              <div class="info blue_symbols"><i class="fa fa-arrow-circle-o-down icon"></i></div>
                <span>PENDING</span>
                <h1 class="bolded"></h1>
                <div class="infoprogress_blue">
                  <div class="blueprogress"></div>
                </div>
                <div class="pull-right" id="work-progress2"><canvas width="47" height="22" style="display: inline-block; vertical-align: top; width: 47px; height: 22px;"></canvas></div>
              </div>
            </div>
          </div>
    
          <div class="col-sm-3 col-sm-6">
           <div class="information gray_info">
              <div class="information_inner">
              <div class="info gray_symbols"><i class="fa fa-arrow-circle-o-up icon"></i></div>
                <span>INPROGRESS</span>
                <h1 class="bolded"></h1>
                <div class="infoprogress_gray">
                  <div class="grayprogress"></div>
                </div>
                <div class="pull-right" id="work-progress4"><canvas width="47" height="22" style="display: inline-block; vertical-align: top; width: 47px; height: 22px;"></canvas></div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-sm-6">
            <div class="information green_info">   
              <div class="information_inner">
                <div class="info green_symbols"><i class="fa fa-check-circle-o icon"></i></div>
                <span>COMPLETED</span>
                <h1 class="bolded"></h1>
                <div class="infoprogress_green">
                  <div class="greenprogress"></div>
                </div>
                <div class="pull-right" id="work-progress1"><canvas width="47" height="20" style="display: inline-block; vertical-align: top; width: 47px; height: 20px;"></canvas></div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-sm-6">
            <div class="information red_info">
              <div class="information_inner">
              <div class="info red_symbols"><i class="fa fa-ban icon"></i></div>
                <span>DECLINED</span>
                <h1 class="bolded"></h1>
                <div class="infoprogress_red">
                  <div class="redprogress"></div>
                </div>
                <div class="pull-right" id="work-progress3"><canvas width="47" height="22" style="display: inline-block; vertical-align: top; width: 47px; height: 22px;"></canvas></div>
              </div>
            </div>
          </div>
        </div> -->

<form class="form-group text-right" action="<?php echo base_url('inventoryAccessories/admin/inventoryAccessories_completedOrdersExportExcel') ?>" method="post" id="exportOrders" enctype="multipart/form-data">
     <b>Note :</b> Only Complete Orders Export &nbsp;   <button type="submit" name="Export" class="btn btn-primary"><i class="fa fa-download add-tooltip"></i> &nbsp; Export to Excel</button>

    </form>
           <div id="chart" >
            <p id="contain1"></p>
          </div>
            <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script >
      $.ajax({
    type: 'GET',
    url: '<?php echo base_url('inventoryAccessories/admin/inventoryAccessoriesChart');?>',  
    dataType: 'json',
    success: function (data){
              Highcharts.chart('contain1', {
            chart: {
              type: 'column',
              options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
              }
            },
          title: {
              text: 'Complete Requests'
            },
            subtitle: {
              text: 'All Monthly Wise Complete Requests'
            },
            plotOptions: {
              column: {
                depth: 25
              }
            },
            xAxis: {
              categories: Highcharts.getOptions().lang.shortMonths
            },
            yAxis: {
              title: {
                text: null
              }
            },
            series: [{
              name: "requests",
              data:data.chartArray
            }]
          });
      },
    error:function(data){console.log(data.responseText);}
    });  

    </script>

      </div>
    </div>
    