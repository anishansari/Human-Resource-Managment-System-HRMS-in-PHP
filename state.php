<?php include('header.php'); ?>
<?php 
	include_once('controller/connect.php');
	
	$dbs = new database();
	$db=$dbs->connection();
  $name="";
  $id="";
	//$sql = mysqli_query($db,"select * from state  ORDER BY Name");
	$countryn = mysqli_query($db,"select * from country  ORDER BY Name");

  if(isset($_GET['stateedit']))
  {
    $stateid = $_GET['stateedit'];
    $edit = mysqli_query($db,"select * from state where StateId='$stateid'");
    $row = mysqli_fetch_assoc($edit);

    $name=$row['Name'];
    $id=$row['CountryId'];
  }

  $page="";
  if(isset($_GET['searcstate']))
  {
    $SearchStateName = $_GET['searcstate'];
    $RecordeLimit = 5;
    $searchState = mysqli_query($db,"select count(StateId) as total from state where Name like '%".$SearchStateName."%'");
    $SName = mysqli_fetch_array($searchState);
    $number_of_row =ceil($SName['total']/5); 

    if(isset($_GET['bn']) && intval($_GET['bn']) <= $number_of_row && intval($_GET['bn'] !=0))
    {
      $Skip = (intval($_GET["bn"]) * $RecordeLimit) - $RecordeLimit;
      $sql = mysqli_query($db,"select * from state where Name like '%".$SearchStateName."%' LIMIT $Skip,$RecordeLimit ");
    }
    else
    {
      $sql = mysqli_query($db,"select * from state where Name like '%".$SearchStateName."%' LIMIT $RecordeLimit ");  
    }

    for($i=0;$i<$number_of_row;$i++)
    {
      $d = $i+1;
      if(isset($_GET["searcstate"]))
      {
        $page .= "<a href='state.php?searcstate=$SearchStateName&bn=$d'>$d</a>&nbsp &nbsp &nbsp";
      }
      else
      {
        $page .= "<a href='state.php?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
      }                     
    } 
  }
  else
  {
    $RecordeLimit = 5;
    $searchState = mysqli_query($db,"select count(StateId) as total from state ");
    $SName = mysqli_fetch_array($searchState);
    
    $number_of_row =ceil($SName['total']/5);
    if(isset($_GET['bn']) && intval($_GET['bn']) <= $number_of_row && intval($_GET['bn'] != 0 ))
    {
      $Skip = (intval($_GET["bn"]) * $RecordeLimit) - $RecordeLimit;
      $sql = mysqli_query($db,"select * from state LIMIT $Skip,$RecordeLimit");
    }
    else
    {
      $sql = mysqli_query($db,"select * from state LIMIT $RecordeLimit");
    }

    for($i=0;$i<$number_of_row;$i++)
    {
        $d = $i+1;
        $page .= "<a href='state.php?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
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
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Table Master<i class="fa fa-angle-right"></i>State</li>
</ol>

<div class="validation-system" style="margin-top: 0;">
 		
 		<div class="validation-form" style="overflow: auto; margin-right:20px; height: 450px; width: 49%; float: left;">
 	<!---->
        <form method="POST" action="controller/ccity.php?stateedit=<?php echo $row['StateId']; ?>">
        <div class="vali-form-group" >
        <h2>Add State</h2>
        	<div class="col-md-3 control-label">
              <label class="control-label">Country</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-globe" aria-hidden="true"></i>
              </span>
              <select name="country" style="text-transform: capitalize; width: 250px;"  required>
                <option  value="">-- Select Country --</option>
                <?php while($rw = mysqli_fetch_assoc($countryn)){ ?> 
                	<option value="<?php echo $rw["CountryId"]; ?>" <?php if($id==$rw["CountryId"]){ echo "selected"; } ?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>
              <div class="clearfix"> </div>

          	<div class="col-md-3 control-label">
            	<label class="control-label">State</label>
              	<div class="input-group">             
                  	<span class="input-group-addon">
              			<i class="fa fa-map-marker" aria-hidden="true"></i>
              		</span>
              	<input type="text" name="state" required="" value="<?php echo $name; ?>" placeholder="State Name" class="form-control" style="width: 250px; height: 35px; float: right;">
              	</div>
            </div>
            	<div class="clearfix"> </div>
        </div>
            <div class="col-md-12 form-group">
              <button type="submit" name="addstates" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-default">Reset</button>
              
            </div>
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>
 <div class="validation-form" style="width: 49%; overflow: auto;">
 		<div style="height: 396px;">
					<div class="w3l-table-info">
					  <h2>State</h2>
					  <br>

					  <form method="GET" action="#">
					  	<input style="float: right;" type="submit" name="searchstate" >
					  	<input style="float: right;" placeholder="Search..." type="search-box" name="searcstate" value="<?php echo(isset($_GET['searcstate']))?$_GET['searcstate']:"";?>"><br>
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
							<td><?php if(isset($_GET['bn'])==0){ echo $i; } else{ echo ($_GET['bn']-1)*5+$i; } $i++;?></td>
							<td><?php echo ucfirst($row['Name']); ?></td>
							<td><a href="?stateedit=<?php echo $row['StateId']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="controller/ccity.php?statedelete=<?php echo $row['StateId']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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