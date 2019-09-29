<?php

//insert.php

include('database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$first_name = '';
// $last_name = '';

if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM ETV WHERE id='".$form_data->id."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['first_name'] = $row['first_name'];
		$output['last_name'] = $row['last_name'];
	}
}
elseif($form_data->action == "Delete")
{
	$query = "
	DELETE FROM ETV WHERE id='".$form_data->id."'
	";
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Data Deleted';
	}
}
else
{
	if(empty($form_data->qrcode))
	{
		$error[] = 'Code is Required Please';
	}
	else
	{
		$qrcode = $form_data->qrcode;
	}

	// if(empty($form_data->last_name))
	// {
	// 	$error[] = 'Last Name is Required';
	// }
	// else
	// {
	// 	$last_name = $form_data->last_name;
	// }

	if(empty($error))
	{
		if($form_data->action == 'Insert')
		{
      $query = "SELECT * FROM ETV WHERE qr_code='".$form_data->qrcode."'";
      $statement = $connect->prepare($query);
      $statement->execute();
      if ($statement->rowCount() > 0) {
        $message = " Code Already Assigned!";
      }else {
        $data = array(
          ':qr_code'		=>	$qrcode
          // ':last_name'		=>	$last_name
        );
        $query = "
        INSERT INTO ETV
          (qr_code) VALUES
          (:qr_code)
        ";
        // $query = "
        // INSERT INTO tbl_sample
        // 	(first_name, last_name) VALUES
        // 	(:first_name, :last_name)
        // ";
        $statement = $connect->prepare($query);
      //  var_dump($statement->execute($data));
        if($statement->execute($data))
        {
          $message ="Registration Successful!";
        }
      }
		}
		// if($form_data->action == 'Edit')
		// {
		// 	$data = array(
		// 		':first_name'	=>	$first_name,
		// 		':last_name'	=>	$last_name,
		// 		':id'			=>	$form_data->id
		// 	);
		// 	$query = "
		// 	UPDATE tbl_sample
		// 	SET first_name = :first_name, last_name = :last_name
		// 	WHERE id = :id
		// 	";
    //
		// 	$statement = $connect->prepare($query);
		// 	if($statement->execute($data))
		// 	{
		// 		$message = 'Data Edited';
		// 	}
		// }
	}
	else
	{
		$validation_error = implode(", ", $error);
	}

	$output = array(
		'error'		=>	$validation_error,
		'message'	=>	$message
	);

}



echo json_encode($output);

?>
