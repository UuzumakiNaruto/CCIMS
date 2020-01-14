<?php
session_start();
if(!(isset($_SESSION['name'])))
header('Location:index.php');
include './connection/connection.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CCIMS</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/storeFetch.css">
  <link rel="stylesheet" type="text/css" href="Table/Datafetch.css">
<!-- tablescripts -->
  <script type="text/javascript" language="javascript" src="js/jquery-3.3.1.slim.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/dataTables.select.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/buttons.print.min.js"></script>
  <script type="text/javascript" language="javascript" src="Table/dataTables.editor.min.js"></script> 
  <script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  $('#viewAll').DataTable( {
    dom: 'Bfrtip',
        lengthChange: true,
    select: true,
        buttons: [
          'copy',
          'pdf',
          'print',
        ]
  } );
    $('#viewReceived').DataTable( {
    dom: 'Bfrtip',
        lengthChange: true,
    select: true,
        buttons: [
          'copy',
          'pdf',
        ]
  } );
    $('#viewIssued').DataTable( {
    dom: 'Bfrtip',
        lengthChange: true,
    select: true,
        buttons: [
          'copy',,
          'pdf',
        ]
  } );
} );
</script>
<!-- // tablescripts end -->

<style type="text/css">
  .fa,.fa-trash {
    font-size:20px;
  }
</style>
  <!-- // tablestyles -->
</head>
<body>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand head" href="stockReceive.php?inventory=all">Computer Centre Inventory Management System (CCIMS)</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Stock
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="stockIssue.php?inventory=all">Stock Issue</a>
          </div>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            View Stock
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="viewReceived.php">Stock Received</a>
            <a class="dropdown-item" href="#">Stock Issued</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">All Stock</a>
          </div>
        </li>
        </li> -->
        <a class="nav-item nav-link  bg-primary" href="viewReceived.php">View</a>
        <a class="nav-item nav-link" href="help.html">Help</a>
        <a class="nav-item nav-link" href="destroy.php">LogOut</a>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->
  <div class="masterFetch">
    <div class="enthead">
      <div class="entbuttons">
        <h2>Issued Items</h2>
      </div>
    </div>
    
    <form action="" method="POST">
    <div class="fetchContAll" id="fetchContAll">
      <div class="deptcontent2">
        </div>
        <div class="buttonSub m-auto">
          <button type="submit" class="btn btn-primary entbtn" id="entformsubb" name="viewAll">View</button>
          <span>Press View to see data</span>
        </div>
    </form>
       
 <div class="tableView">
  <div class="tableGridContent">
  <table id="viewAll" class="table table-striped table-bordered">
<?php
echo <<< EOD
        <thead style="font-weight:none;font-size:15px;">
          <tr>
            <th>Id</th>
            <th>date</th>
            <th>description</th>
            <th>Category</th>
            <th>name</th>
            <th>Username</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Department</th>
            <th>Scheme</th>
            <th>Inventory</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
EOD;
// All data fetch included receive and issued.
if(isset($_POST['viewAll'])){
$uname=$_SESSION['name'];
$viewReceive="SELECT * FROM issued WHERE Username='$uname'";
$viewReceiveQry= mysqli_query($conn,$viewReceive);
// php for issue

// php for receive
while($viewReceiveFetch=mysqli_fetch_array($viewReceiveQry)){
echo '<tr>
  <td>'.$viewReceiveFetch["id"].'</td>
  <td>'.$viewReceiveFetch["timing"].'</td>
  <td>'.$viewReceiveFetch["description"].'</td>
  <td>'.$viewReceiveFetch["category"].'</td>
  <td>'.$viewReceiveFetch["name"].'</td>
  <td>'.$viewReceiveFetch["Username"].'</td>
  <td>'.$viewReceiveFetch["issued"].'</td>
  <td>'.$viewReceiveFetch["unit"].'</td>
  <td>'.$viewReceiveFetch["Department"].'</td>
  <td>'.$viewReceiveFetch["scheme"].'</td>
  <td>'.$viewReceiveFetch["inventory"].'</td>
  <td>--</td>
  <td>--</td>
  <td>--</td>
  <td>--</td>
  <td>--</td>
  </tr> ';  
}
  echo '</tbody>';
}
?>
</table>
  </div>
   </div>

<!-- This is the end of content for all data fetch -->
<!-- masterdiv close -->





<script type="text/javascript">
    document.getElementById("fetchContReceive").style.display = "none";
    document.getElementById("fetchContIssue").style.display = "none";
  function allData(){
    document.getElementById("fetchContAll").style.display = "grid";
    document.getElementById("fetchContReceive").style.display = "none";
    document.getElementById("fetchContIssue").style.display = "none";
    $('#allData').addClass('entactive');
    $('#receive').removeClass('entactive');
    $('#issue').removeClass('entactive');
  }
  function receive() {
    document.getElementById("fetchContAll").style.display = "none";
    document.getElementById("fetchContReceive").style.display = "grid";
    document.getElementById("fetchContIssue").style.display = "none";
    $("#receive").addClass("entactive");
    $('#allData').removeClass('entactive');
    $("#issue").removeClass("entactive");
  }
  function issue() {
    document.getElementById("fetchContAll").style.display = "none";
    document.getElementById("fetchContReceive").style.display = "none";
    document.getElementById("fetchContIssue").style.display = "grid";
    $("#issue").addClass("entactive");
    $("#receive").removeClass("entactive");
    $('#allData').removeClass('entactive');
  }
    
</script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>