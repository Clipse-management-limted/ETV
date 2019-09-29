
<?php include 'backend.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title> WRISTBAND NIG </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		body{
			background: grey no-repeat fixed center;
			background-size: cover;
		}
	</style>
</head>
<body>
	<div class="container my-5">
		<div class="col-md-4 col-sm-6 col-sx-12 mx-auto py-5">
			<div class="card">
				<div class="card-header text-center">
					<strong>Entry Ticket Validation</strong>
				</div>
				<div class="card-body">
					<span>
        <?php
         echo $error;
				?>

					</span>

					<form method="post" action="">
						<div class="form-group">
							<input class="form-control rounded-0" type="text" name="qr_code" id="ticket_no" placeholder="Ticket Code" autofocus>
						</div>
						<button class="btn btn-block btn-primary rounded-0" type="submit" name="tag" value="entry_ticket_insert">Verify
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
