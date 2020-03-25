<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<br><br><br>
<form method="post" action="<?php echo base_url()?>Quiz_controller/form_validation">
	<?php
	if($this->uri->segment(2)=="inserted"){
		echo '<p class="text-success">Data Inserted</p>';
	}
	?>
	<?php 
		if(isset($user_data)){
			foreach($user_data->result() as $row){
				?>
				<div class="form-group">
		<input type="text" name="user_id" class="form-control" placeholder="Enter user_id" value="<?php echo $row->user_id;?>">
		<span class="text-danger"><?php echo form_error("user_id");?></span>
	</div>
					<div class="form-group">
	<input type="text" name="class"  placeholder="class" value="<?php echo $row->class;?>" class="form-control">
<span class="text-danger"><?php echo form_error("class");?></span>
	</div>

<div class="form-group">
		<input type="text" name="question" class="form-control" placeholder="Enter question" value="<?php echo $row->question;?>">
	<span class="text-danger"><?php echo form_error("question");?></span>	
	</div>
<div class="form-group">
		<input type="text" name="answer" class="form-control" value="<?php echo $row->answer;?>" placeholder="Enter answer">
	<span class="text-danger"><?php echo form_error("answer");?></span>	
	</div>




	 
<div class="form-group"> 
	<input type="hidden" name="hidden_id" value="<?php echo $row->id;?>"/>
	<input type="submit" name="Update"  value="Update" class="btn btn-info">
		
	</div>
	<?php
			}
		}
		
		else
	{ ?>
		<div class="form-group">
		<input type="text" name="user_id" class="form-control" placeholder="Enter user_id">
		<span class="text-danger"><?php echo form_error("user_id");?></span>
	</div>
					<div class="form-group">
	<input type="text" name="class" class="form-control" placeholder="class">
<span class="text-danger"><?php echo form_error("class");?></span>
	</div>

<div class="form-group">
		<input type="text" name="question" class="form-control" placeholder="Enter question">
	<span class="text-danger"><?php echo form_error("question");?></span>	
	</div>
<div class="form-group">
		<input type="text" name="answer" class="form-control" placeholder="Enter answer">
	<span class="text-danger"><?php echo form_error("answer");?></span>	
	</div>
	 
<div class="form-group"> 
		
		<input type="submit" name="Insert"  value="Insert" class="btn btn-info">
		
	</div>
		
	<?php } ?>

</form>
</div>
<br><br>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>id</th>
			<th>User_id</th>
			<th>Class</th>
			<th>Question</th>
			<th>Answer</th>
			
			
			<th>Delete</th>
			<th>Update</th>
		</tr>
		<?php
		if($fetch_data->num_rows() > 0){
			foreach ($fetch_data-> result() as $row) {

				?>
				<tr>
					<td><?php echo $row->id;?></td>

					<td><?php echo $row->user_id;?></td>

					<td><?php echo $row->class;?></td>

					<td><?php echo $row->question;?></td>

					<td><?php echo $row->answer;?></td>

					
				<td><a href="#" class="delete_data" id="<?php echo $row->id;?>">Delete</a></td>
				<td><a href="<?php echo base_url(); ?>Quiz_controller/update_data/<?php echo $row->id; ?>">Edit</a></td>

				</tr>
				<?php
			}
		}
		else{
		?>
			<tr>
				<td colspan="3"> No Data Found</td>
			</tr>
		<?php
		}
		?>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.delete_data').click(function(){
			var id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				window.location= "<?php  echo base_url(); ?>Quiz_controller/delete_data/"+id;
			}
			else{
				return false;
			}
		});
	});
</script>
</body>
</html>
