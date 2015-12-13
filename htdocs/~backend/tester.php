<!DOCTYPE html>
<html>
<script>
if (confirm("aha?")) alert("yes"); else alert("no");
</script>
<script src="includes/jquery/jquery.min.js"></script>
<body>

<?php
    print_r($_POST);
    echo "<br>";
    print_r($_FILES);
    echo "<br>";
    echo "<br>";
    printf('event/%s-%04d.jpg',"ces",9);
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="fn">
    <input type="file" name="fileToUpload1" id="fileToUpload1">
    <input type="file" name="fileToUpload2" id="fileToUpload2">
    <br>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>