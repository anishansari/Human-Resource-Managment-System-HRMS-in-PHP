<?php include('header.php'); ?>
<?php 
	include_once('controller/connect.php');
	
	$dbs = new database();
	$db=$dbs->connection();
  $name="";

	if(isset($_GET['positionedit']))
  {
    $positionedit = $_GET['positionedit'];

    $edit = mysqli_query($db,"select * from position where PositinId='$positionedit'");
    $row = mysqli_fetch_assoc($edit);
    $name = $row['Name'];
  }

  $page = "";
  $pagelimit = 5;
  $positionid = mysqli_query($db,"select count(PositinId) total from position");
  $positionn = mysqli_fetch_assoc($positionid);
  $number_of_row = ceil($positionn['total'] /5);

  if(isset($_GET['bn']) && intval($_GET['bn']) <= $number_of_row && intval($_GET['bn']) != 0)
  {
    $Skip = (intval($_GET['bn']) * $pagelimit) - $pagelimit;
    print_r($Skip);
    $sql = mysqli_query($db,"select * from position LIMIT $Skip,$pagelimit");
  }
  else
  {
    $sql = mysqli_query($db,"select * from position LIMIT $pagelimit");
  }

  for($i=0;$i<$number_of_row;$i++)
  {
    $d = $i+1;
    $page .= "<a href='position.php?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
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
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Table Master<i class="fa fa-angle-right"></i>Position</li>
</ol>

<div class="validation-system" style="margin-top: 0;">
 		
 		<div class="validation-form" style="overflow: auto; margin-right:20px; height: 450px; width: 49%; float: left;">
 	<!---->
        <form method="POST" action="controller/ccity.php?positionedit=<?php echo $row['PositinId']; ?>">
        <div class="vali-form-group" >
        <h2>Add Position</h2>
          	<div class="col-md-3 control-label">
            	<label class="control-label">Position</label>
              	<div class="input-group">             
                  	<span class="input-group-addon">
              			<i class="fa fa-language" aria-hidden="true"></i>
              		</span>
              	<input type="text" name="position" required="" value="<?php echo $name; ?>"  placeholder="Position Name" class="form-control" style="width: 250px; height: 35px; float: right;">
              	</div>
            </div>
            	<div class="clearfix"> </div>
        </div>
            <div class="col-md-12 form-group">
              <button type="submit" name="positionl" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-default">Reset</button>
              
            </div>
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>
 <div class="validation-form" style="width: 49%; overflow: auto;">
 		<div style="height: 396px;">
					<div class="w3l-table-info">
					  <h2>Position</h2>
					  
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
							<td><a href="?positionedit=<?php echo $row['PositinId']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="controller/ccity.php?positiondelete=<?php echo $row['PositinId']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
						 </tr>	

						<?php } ?>
						</tbody>
					  </table>
            <div><?php echo $page;?></div>
					</div>
				  
		</div>
 </div>
</div>
<?php include('footer.php'); ?>