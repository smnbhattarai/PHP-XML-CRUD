<?php

$products = simplexml_load_file('product.xml');
if(isset($_POST['submitSave'])) {
    foreach($products->product as $product) {
        if($product['id'] == $_POST['id']) {
            $product->name = $_POST['name'];
            $product->price = $_POST['price'];
            break;
        }
    }
    file_put_contents('product.xml', $products->asXML());
    header("location: index.php");
}


foreach($products->product as $product) {
    if($product['id'] == $_GET['id']) {
        $id = $product['id'];
        $name = $product->name;
        $price = $product->price;
        break;
    }
}

?>

<form method="post">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="id" value="<?php echo $id; ?>" readonly></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" value="<?php echo $price; ?>"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submitSave" value="Update"></td>
        </tr>
    </table>
</form>