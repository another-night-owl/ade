<?php
    //koneksi database
    $conn = mysqli_connect("localhost","root","","konakito");
    //jika gagal koneksi
if ($conn === false) {
    die("ERROR: Could not Connect." . mysqli_connect_error());
}
   //var database 
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$type_event = mysqli_real_escape_string($conn, $_POST['type_event']);
$mulai_acara = mysqli_real_escape_string($conn, $_POST['mulai_acara']);
$akhir_acara = mysqli_real_escape_string($conn, $_POST['akhir_acara']);

$sql = "INSERT INTO booking (nama, email, phone, type_event, mulai_acara, akhir_acara) VALUES ('$nama', '$email', '$phone' , '$type_event', '$mulai_acara', '$akhir_acara')";
$sql = 'SELECT id, nama, email, phone, type_event, mulai_acara, akhir_acara 
		FROM booking';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>NAMA</th>
				<th>EMAIL</th>
                <th>PHONE</th>
                <th>TYPE EVENT</th>
                <th>MULAI ACARA</th>
                <th>AKHIR ACARA</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['id'].'</td>
			<td>'.$row['nama'].'</td>
			<td>'.$row['email'].'</td>
            <td>'.$row['type_event'].'</td>
            <td>'.$row['mulai_acara'].'</td>
            <td>'.$row['akhir_acara'].'</td>
		</tr>';
}
echo '
	</tbody>
</table>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
mysqli_close($conn);
?>
