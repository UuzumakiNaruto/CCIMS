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
          'excel',
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
          'excel',
          'pdf',
        ]
  } );
    $('#viewIssued').DataTable( {
    dom: 'Bfrtip',
        lengthChange: true,
    select: true,
        buttons: [
          'copy',
          'excel',
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
            Stock Entry
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="stockReceive.php?inventory=all">Stock Purchase</a>
            <a class="dropdown-item" href="issuerequest.php">Stock Issue</a>
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Add New
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="addDepartment.php">Department</a>
            <a class="dropdown-item" href="addItem.php">Item</a>
            <a class="dropdown-item" href="addScheme.php">Scheme</a>
            <a class="dropdown-item " href="addVendor.php">Supplier</a>
          </div>
        </li>
        <a class="nav-item nav-link" href="viewReceived.php">View</a>
        <a class="nav-item nav-link" href="help.html">Help</a>
        <a class="nav-item nav-link" href="destroy.php">LogOut</a>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->
  <div class="masterFetch">
    <div class="enthead">
      <div class="entbuttons">
        <h2>Pending Requests</h2>
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
            <th>Accept</th>
            <th>Decline</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
EOD;
// All data fetch included receive and issued.
if(isset($_POST['viewAll'])){
$viewReceive="SELECT * FROM issuerequest";
$viewReceiveQry= mysqli_query($conn,$viewReceive);
// php for issue

// php for receive
while($viewReceiveFetch=mysqli_fetch_array($viewReceiveQry)){
echo '<tr>
  <td>'.$viewReceiveFetch["id"].'</td>
  <td>'.$viewReceiveFetch["date"].'</td>
  <td>'.$viewReceiveFetch["description"].'</td>
  <td>'.$viewReceiveFetch["category"].'</td>
  <td>'.$viewReceiveFetch["name"].'</td>
  <td>'.$viewReceiveFetch["Username"].'</td>
  <td>'.$viewReceiveFetch["issued"].'</td>
  <td>'.$viewReceiveFetch["unit"].'</td>
  <td>'.$viewReceiveFetch["Department"].'</td>
  <td>'.$viewReceiveFetch["scheme"].'</td>
  <td>'.$viewReceiveFetch["inventory"].'</td>
  <td><a href=?acc='.$viewReceiveFetch["id"].'>&#10004</a></td>
  <td><a href=?dec='.$viewReceiveFetch["id"].'>&#10006</a></td>
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
<?php
if (isset($_GET['dec'])) {
$decid=$_GET['dec'];
$delqry1="DELETE from issuerequest where id='$decid'";
$qry= "SELECT * FROM issuerequest where id='$decid'";
$login = mysqli_query($conn,$qry);
$row = mysqli_fetch_row($login);
mysqli_query($conn,$delqry1);
if(mail("$row[5]", "Issue Request Declined", "This is to inform you that request for $row[6] $row[3] for:- $row[5] has been declined. \n\n\n With Regards \n Computer Centre\n IIIT Bhagalpur"))
          {echo '<script>alert("Mail Sent")</script>';}
        else
          {echo '<script>alert("Mail Failed")</script>';}
        echo '<script>alert("Request Declined!!")</script>';
echo '<script>window.location.href="issuerequest.php";</script>';
}
?>
<?php
if (isset($_GET['acc'])) {
$accid=$_GET['acc'];
$qry= "SELECT * FROM issuerequest where id='$accid'";
$login = mysqli_query($conn,$qry);
$row = mysqli_fetch_row($login);
$qr= "SELECT * FROM items_objects where item='$row[3]'";
$qre = mysqli_query($conn,$qr);
$ro = mysqli_fetch_row($qre);
if($ro[4]<$row[6])
{
  echo '<script>alert("You have requested more than available Balance!")</script>';
  echo '<script>window.location.href="issuerequest.php";</script>';
}
else
{
$issueQry = "INSERT into issued VALUES('','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]')";
$issueQryExe = mysqli_query($conn,$issueQry);
$delqry1="DELETE from issuerequest where id='$accid'";
mysqli_query($conn,$delqry1);
$subqry="UPDATE items_objects SET balance = balance - '$row[6]' WHERE item='$row[3]'";
$subqryExe= mysqli_query($conn,$subqry);
if(mail("$row[5]", "Issue Request Accepted", "This is to inform you that $row[6] $row[3] have been issued to $row[4] having Username:- $row[5] . \n\n\n With Regards \n Computer Centre\n IIIT Bhagalpur"))
          {echo '<script>alert("Mail Sent")</script>';}
        else
          {echo '<script>alert("Mail Failed")</script>';}
echo '<script>alert("Request Accepted!!")</script>';
echo '<script>window.location.href="issuerequest.php";</script>';
}
}
?>

<!-- Footer -->

<!-- Footer -->




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