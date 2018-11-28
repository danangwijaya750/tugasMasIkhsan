<?php require "templates/header.php"; ?>
<?php
 $url="http://localhost/pisahan/backend/request/read.php";
   $client=curl_init();
 $opt=array(
     CURLOPT_URL =>$url,
     CURLOPT_CUSTOMREQUEST 	=> "GET",
     CURLOPT_RETURNTRANSFER	=> true,
 );
 curl_setopt_array($client,$opt);
 $res=curl_exec($client);
 $code=curl_getinfo($client, CURLINFO_HTTP_CODE);
 curl_close($client);
 $data=null;
 if($code=="200"){
     $data=json_decode($res);
 }else{
     $res=json_decode($res);
     echo($res);
 }

?>
	<h2>Results</h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Age</th>
            <th>Location</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($data as $row) { ?>
    <tr>
        <td><?php echo ($row->id); ?></td>
        <td><?php echo ($row->firstname); ?></td>
        <td><?php echo ($row->lastname); ?></td>
        <td><?php echo ($row->email); ?></td>
        <td><?php echo ($row->age); ?></td>
        <td><?php echo ($row->location); ?></td>
        <td><?php echo ($row->date); ?> </td>
    </tr>
<?php } ?> 
    </tbody>
</table>
<?php require "templates/footer.php"; ?>