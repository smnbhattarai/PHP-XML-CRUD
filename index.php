<?php

// Delete product
if(isset($_GET['id'])) {
    $products = simplexml_load_file('product.xml');
    $id = $_GET['id'];
    $index = 0;
    $i = 0;

    foreach($products->product as $product) {
        if($product['id'] == $id) {
            $index = $i;
            break;
        }
        $i++;
    }

    unset($products->product[$index]);
    file_put_contents('product.xml', $products->asXML());
}


$products = simplexml_load_file('product.xml');
echo "Number of products: " . count($products);
echo '<hr>';
echo '<h3>List Product Information</h3>';

?>

<p><a href="add.php">Add new Product</a></p>

<table cellpadding="5" cellspacing="5">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Option</th>
    </tr>

    <?php foreach($products->product as $product): ?>
    <tr>
        <td><?php echo $product['id']; ?></td>
        <td><?php echo $product->name; ?></td>
        <td><?php echo $product->price; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a> 
            | 
            <a href="index.php?action=delete&id=<?php echo $product['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>