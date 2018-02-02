<?php include('header.php'); ?>
<?php 
  include_once('controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();
  $cid="";
  //$sql = mysqli_query($db,"select * from country  ORDER BY Name");

  if(isset($_GET['countryedit']))
  {
    $countryid = $_GET['countryedit'];
    $edit = mysqli_query($db,"select * from country where CountryId='$countryid'");
    $row = mysqli_fetch_assoc($edit);
    $cid = $row['Name'];
  }

  $page="";
  if(isset($_GET['searccountry']))
  {
    $SearchCountryName = $_GET['searccountry'];
    
    $RecordeLimit = 5;
    $searchCountry = mysqli_query($db,"select count(CountryId) as total from country where Name like '%".$SearchCountryName."%'");
    $COName = mysqli_fetch_array($searchCountry);
    
    $number_of_row =ceil($COName['total']/5); 

    if(isset($_GET['bn']) && intval($_GET['bn']) <= $number_of_row && intval($_GET['bn'] !=0))
    {
      $Skip = (intval($_GET["bn"]) * $RecordeLimit) - $RecordeLimit;
      $sql = mysqli_query($db,"select * from country where Name like '%".$SearchCountryName."%' LIMIT $Skip,$RecordeLimit ");
    }
    else
    {
      $sql = mysqli_query($db,"select * from country where Name like '%".$SearchCountryName."%' LIMIT $RecordeLimit ");
      
    }

    for($i=0;$i<$number_of_row;$i++)
    {
      $d = $i+1;
      if(isset($_GET["searccountry"]))
      {
        $page .= "<a href='country.php?searccountry=$SearchCountryName&bn=$d'>$d</a>&nbsp &nbsp &nbsp";
      }
      else
      {
        $page .= "<a href='country.php?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
      }                   
    } 
  }
  else
  {
    $RecordeLimit = 5;
    $searchCountry = mysqli_query($db,"select count(CountryId) as total from country ");
    $COName = mysqli_fetch_array($searchCountry);
    
    $number_of_row =ceil($COName['total']/5);
    if(isset($_GET['bn']) && intval($_GET['bn']) <= $number_of_row && intval($_GET['bn'] != 0 ))
    {
      $Skip = (intval($_GET["bn"]) * $RecordeLimit) - $RecordeLimit;
      $sql = mysqli_query($db,"select * from country LIMIT $Skip,$RecordeLimit");
    }
    else
    {
      $sql = mysqli_query($db,"select * from country LIMIT $RecordeLimit");
    }

    for($i=0;$i<$number_of_row;$i++)
    {
        $d = $i+1;
        $page .= "<a href='country.php?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
    }
  }
?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/basictable.css" /> -->
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Table Master<i class="fa fa-angle-right"></i>Country</li>
</ol>

<div class="validation-system" style="margin-top: 0;">
    
    <div class="validation-form" style="overflow: auto; margin-right:20px; height: 450px; width: 49%; float: left;">
  <!---->
        <form method="POST" action="controller/ccity.php?countryedit=<?php echo $row['CountryId']; ?>">
        <div class="vali-form-group" >
        <h2>Add Country</h2>
          
       
            <div class="col-md-3 control-label">
              <label class="control-label">Country</label>
                <div class="input-group">             
                    <span class="input-group-addon">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                  </span>
                <input type="text" name="country" required="" value="<?php echo $cid; ?>" placeholder="Country Name" class="form-control" style="width: 250px; height: 35px; float: right;">
                </div>
            </div>
              <div class="clearfix"> </div>
        </div>
            <div class="col-md-12 form-group">
              <button type="submit" name="countryy" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-default">Reset</button>
              
            </div>
          <div class="clearfix"> </div>
        </form>
  <!---->
 </div>
 <div class="validation-form" style="width: 49%; overflow: auto;">
    <div style="height: 396px;">
          <div class="w3l-table-info">
            <h2>Country</h2>
            <br>

            <form method="GET" action="#">
              <input style="float: right;" type="submit" name="searchcountry">
              <input style="float: right;" placeholder="Search..." type="search-box" name="searccountry" value="<?php echo(isset($_GET['searccountry']))?$_GET['searccountry']:"";?>"><br>
            </form>
              <table id="table">
            <thead>
              <tr>
                <th>Id</th>
              <th style="width: 5000px;">Name</th>
              <th style="text-align: center; width: 450px;">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; while($row = mysqli_fetch_assoc($sql)) { ?> 

            <tr>
              <td><?php if(isset($_GET['bn'])==0){ echo $i; } else{ echo ($_GET['bn']-1)*5+$i; } $i++; ?></td>
              <td><?php echo ucfirst($row['Name']); ?></td>
              <td><a href="?countryedit=<?php echo $row['CountryId']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="controller/ccity.php?countrydelete=<?php echo $row['CountryId']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
              <!-- <td style=" width: 100px;"><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td> -->
             </tr>
            <?php } ?>
            </tbody>
            </table>
            <div><?php echo $page; ?></div>
          </div>
    </div>
 </div>
</div>
<?php include('footer.php'); ?>