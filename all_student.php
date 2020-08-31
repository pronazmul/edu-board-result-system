 
 <?php
 
require_once('template/header.php');

 ?>
                                  
					<!-- Dashbord Panel -->


                                    <div class="row">
                                      
                                        <div class="col-md-12 ">
                                            <section class="panel" style="min-height: 400px; margin-top: 20px;">
    <div style=" width: 90%; margin: 10px auto;">

    	<h2 class="text-success text-center">Add Student Result</h2><hr>
    	
    	<table class="table table-striped table-hover ">
    		<thead >
    			<tr >
    				<th>Serial</th>
    				<th>Name</th>
    				<th>Roll</th>
    				<th>Reg</th>
    				<th>Institute</th>
    				<th>Board</th>
    				<th>Photo</th>
    				<th>Action</th>
    			</tr>
    		</thead>
    		<tbody>

<?php $sql = "SELECT * FROM st_info";
		$com_data = $conn->query($sql);
$i = 1;
		while ($st_data = $com_data->fetch_assoc()):?>


    			<tr>
    			<td><?php echo $i; $i++; ?></td>
    			<td><?php echo $st_data['name']; ?></td>
    			<td><?php echo $st_data['roll']; ?></td>
    			<td><?php echo $st_data['reg']; ?></td>
    			<td><?php echo $st_data['institute']; ?></td>
    			<td><?php echo $st_data['board']; ?></td>
    			<td><img src="st_photo/<?php echo $st_data['photo']; ?>" height="50" width="50" style="border: 2px solid #fff; border-radius: 50%; box-shadow: 0px 0px 5px #000"></td>
    			<td>

                <?php $dataCheck= dataCheck($st_data['roll'], $st_data['reg']); 

                    if ($dataCheck == false): ?>
                
                    <a class="btn btn-info" href="add_result.php?id=<?php echo $st_data['st_id'];?>">Add Result</a>

                <?php else: ?>

                    <a class="btn btn-warning" href="edit_result.php?roll=<?php echo $st_data['roll'];?>">Edit Result</a>

                <?php endif; ?>



                </td>
    			</tr>
<?php endwhile; ?>

    		</tbody>
    	</table>

    </div>
                                            





                                            </section>
                                        </div>
                                      
                                    </div>


 
 <?php
require_once('template/footer.php');

 ?>





