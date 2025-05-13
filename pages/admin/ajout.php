<?php include ('../../settings/conn.php');?>
<h2>Add Product</h2>
<form action="ajout.php" method="post" enctype="multipart/form-data">
    <label for="name">Product Name :</label>
    <input type="text" id="name" name="name" required><br>
    <label for="description">Description :</label>
    <textarea id="description" name="description" required></textarea><br>
    <label for="price">Price :</label>
    <input type="number" id="price" name="price" step="0.01" required><br>
    <label for="image">Image :</label>
    <input type="file" id="image" name="image"><br>
    <input type="submit" value="Add Product">
</form>

<?php
If ($_SERVER['REQUEST_METHOD'] == 'POST') {
    Include ('../../settings/conn.php');

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    // $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $target = "../../assets/images/" . basename($image);

    $sql = "INSERT INTO commandes (nom, description, image, prix) VALUES (?,?,?,?)";
    $conn->execute([$name, $description, $price, $image]);
    if ($conn->query($sql) === TRUE) {

      $conn = $conn->prepare($sql);

     
      
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            Echo "Product added successfully.";
        } else {
            Echo "Failed to upload image.";
        }
    } else {
        Echo "Failed to add product.";
    }
}
?>