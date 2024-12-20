<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Visitor Counter</title>
  <style>
    body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
    h1 { color: #333; }
    p { font-size: 1.2em; }
  </style>
</head>
<body>
  <?php
    $file = 'counter.txt';
    $count = file_exists($file) ? (int)file_get_contents($file) : 0;
    file_put_contents($file, ++$count);
  ?>
  <h1>Visitor Counter</h1>
  <p>Number of Visitors: <strong><?php echo $count; ?></strong></p>
</body>
</html>

8b  PHP sort:


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sort Student Records</title>
  <style>
    body { font-family: Arial, sans-serif; text-align: center; margin-top: 20px; }
    table { margin: auto; border-collapse: collapse; width: 80%; }
    th, td { padding: 10px; border: 1px solid #ddd; }
    th { background-color: #f4f4f4; }
  </style>
</head>
<body>
  <h1>Sorted Student Records</h1>
  <table>
    <tr><th>ID</th><th>Name</th><th>Grade</th></tr>
    <?php
      
      $conn = new mysqli("localhost", "root", "", "students");

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $students = $conn->query("SELECT * FROM students")->fetch_all(MYSQLI_ASSOC);

      for ($i = 0; $i < count($students) - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < count($students); $j++) {
          if ($students[$j]['name'] < $students[$min]['name']) {
            $min = $j;
          }
        }
        $temp = $students[$min];
        $students[$min] = $students[$i];
        $students[$i] = $temp;
      }

      foreach ($students as $student) {
        echo "<tr><td>{$student['id']}</td><td>{$student['name']}</td><td>{$student['grade']}</td></tr>";
      }

      $conn->close();
    ?>
  </table>
</body>
</html>

