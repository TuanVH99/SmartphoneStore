@if (Session::get('admin') === "admin")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/img/logo1.jpeg') }}" />
    <title>Smartphone Store</title>
    <base href="{{ asset('') }}" >
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
    	 
       @include('admin.layouts.header')

       @yield('content')

    </div>
    <!-- /#wrapper -->  
    <input type="hidden" id="data" value="{{ json_encode($data) }}" />
    <!-- jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Google Charts Library -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Handle -->
    <script type="text/javascript" src="admin_asset/dist/js/script.js"></script>
    <script src="admin_asset/ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace('content')</script>
    <!-- <script type="text/javascript">
      var arr = [['Ngày', 'Doanh thu']];
      var orders = JSON.parse(document.getElementById("data").value);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      for(x of orders){
        arr.push([x.order_day,x.total_price])
      }  
      function drawChart() {

        var data = google.visualization.arrayToDataTable(
           arr
        );

        var options = {
          title: 'Thống kê doanh thu các ngày trong tháng'
        };
        
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script> -->
     <script>
      $('#confirm-delete').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });
  </script>
</body>

</html>
@else
    @php
        echo redirect()->route('login')->with("invalid","Xin vui lòng đăng nhập.");
    @endphp
@endif
