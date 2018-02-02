<?php include('header.php'); ?>
<?php 
	include_once('controller/connect.php');
	
	$dbs = new database();
	$db=$dbs->connection();
  $name=""; 
  $id="";
	//$sql = mysqli_query($db,"select * from city  ORDER BY Name");
	$staten = mysqli_query($db,"select * from state  ORDER BY Name");
  if(isset($_GET['cityedit']))
  {
    $cityid = $_GET['cityedit'];
    $edit = mysqli_query($db,"select * from city where CityId='$cityid'");
    $row = mysqli_fetch_assoc($edit);
    $name = $row['Name'];
    $id = $row['StateId'];
  }

  $page="";
  if(isset($_GET['searccity']))
  {
    $SearchCityName = $_GET['searccity'];
    $RecordeLimit = 5;
    $searchcity = mysqli_query($db,"select count(CityId) as total from city where Name like '%".$SearchCityName."%'");
    $CName = mysqli_fetch_array($searchcity);
    
    $number_of_row =ceil($CName['total']/5); 
    if(isset($_GET['bn']) &&intval($_GET['bn']) <= $number_of_row && intval($_GET['bn'] !=0))
    {
      $Skip = (intval($_GET["bn"]) * $RecordeLimit) - $RecordeLimit;
      $sql = mysqli_query($db,"select * from city where Name like '%".$SearchCityName."%' LIMIT $Skip,$RecordeLimit ");
    }
    else
    {
      $sql = mysqli_query($db,"select * from city where Name like '%".$SearchCityName."%' LIMIT $RecordeLimit ");
    }

    for($i=0;$i<$number_of_row;$i++)
    {
      $d = $i+1;
      if(isset($_GET["searccity"]))
      {
        $page .= "<a href='city.php?searccity=$SearchCityName&bn=$d'>$d</a>&nbsp &nbsp &nbsp";
      }
      else
      {
        $page .= "<a href='city.php?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
      }                     
    } 
  }
  else
  {
    $RecordeLimit = 5;
    $searchCity = mysqli_query($db,"select count(CityId) as total from city ");
    $CName = mysqli_fetch_array($searchCity);
    
    $number_of_row =ceil($CName['total']/5);
    if(isset($_GET['bn']) && intval($_GET['bn']) <= $number_of_row && intval($_GET['bn'] != 0 ))
    {
      $Skip = (intval($_GET["bn"]) * $RecordeLimit) - $RecordeLimit;
      $sql = mysqli_query($db,"select * from city LIMIT $Skip,$RecordeLimit");
    }
    else
    {
      $sql = mysqli_query($db,"select * from city LIMIT $RecordeLimit");
    }

    for($i=0;$i<$number_of_row;$i++)
    {
        $d = $i+1;
        $page .= "<a href='city.php?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
    }
  }
?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
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
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Table Master<i class="fa fa-angle-right"></i>City</li>
</ol>

<div class="validation-system" style="margin-top: 0;">
 		
 		<div class="validation-form" style="overflow: auto; margin-right:20px; height: 450px; width: 49%; float: left;">
 	<!---->
        <form method="POST" action="controller/ccity.php?cityedit=<?php echo $row['CityId']; ?>">
        <div class="vali-form-group" >
        <h2>Add City</h2>
        	<div class="col-md-3 control-label">
              <label class="control-label">State</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
              <select name="state" style="text-transform: capitalize; width: 250px;" required>
                <option value="">-- Select State --</option>
                <?php while($rw = mysqli_fetch_assoc($staten)){ ?> 
                	<option value="<?php echo $rw["StateId"]; ?>" <?php if($id==$rw["StateId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>
            <div class="clearfix"> </div>
       

          	<div class="col-md-3 control-label">
            	<label class="control-label">City</label>
              	<div class="input-group">             
                  	<span class="input-group-addon">
              			<i class="fa fa-map-marker" aria-hidden="true"></i>
              		</span>
              	<input type="text" name="city" placeholder="City Name" value="<?php echo $name; ?>" required="" class="form-control" style="width: 250px; height: 35px;">
              	</div>
            </div>
            	<div class="clearfix"> </div>
        </div>
            <div class="col-md-12 form-group">
              <button type="submit" name="cityy" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-default">Reset</button>
              
            </div>
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>
 <div class="validation-form" style="width: 49%; overflow: auto;">
 		<div style="height: 396px;">
					<div class="w3l-table-info" >
					  <h2>City</h2>
					  <br>

					  <form method="GET" action="#">
					  	<input style="float: right;" type="submit" name="searchcity" >
					  	<input style="float: right;" placeholder="Search" type="search-box" name="searccity" value="<?php echo(isset($_GET['searccity']))?$_GET['searccity']:"";?>"><br>
					  </form> 
					    <table id="table">
						<thead>
						  <tr>
						  	<th>Id</th>
							<th style="width: 5000px;">Name</th>
							<th  style="text-align: center; width: 450px;">Action</th>
						  </tr>
						</thead>
						<tbody>
						<?php $i=1; while($row = mysqli_fetch_assoc($sql)) { ?> 
						<tr>
							<td><?php if(isset($_GET['bn'])==0){ echo $i; } else{ echo ($_GET['bn']-1)*5+$i; } $i++;?></td>
							<td><?php echo ucfirst($row['Name']); ?></td>
							<td><a href="?cityedit=<?php echo $row['CityId']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="controller/ccity.php?citydelete=<?php echo $row['CityId']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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