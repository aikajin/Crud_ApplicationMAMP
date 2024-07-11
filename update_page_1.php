<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($db, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php
if(isset($_POST['update_students'])){
    $idnew = $_GET['id']; // Use $_GET['id'] here

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    $query = "UPDATE `students` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `id` = '$idnew'";
    $result = mysqli_query($db, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($db));
    } else {
        header('location:index.php?update_msg=Data updated successfully!');
        exit; // Ensure script execution stops after redirection
    }
}
?>

<form action="update_page_1.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>">
    </div>
    <input type="submit" class="btn btn-outline-success" name="update_students" value="UPDATE">
</form>

<?php include("footer.php"); ?>
