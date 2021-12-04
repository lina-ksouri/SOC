<form action="" method="POST">
   <font color="blue"><i><h1>&nbsp;&nbsp; *** Avoir les données des produits d'une marque *** </h1></i></font>
    <div>
        <table>
            <tr>
                <td> Marque de maquillage : </td>
                <td><input name="marque" id="marque" placeholder="Entrer votre marque préférée" required/></td>
            </tr>
            <tr>
                <td>Type de produit : </td>
                <td><input name="type" id="type" placeholder="Choisir type de produit" required/></td>
            </tr>
            <tr>
                <td><input type="submit" value="Get Information"></td>
            </tr>
        </table>
    </div>
</form>
<?php
if (isset($_POST['marque']) && $_POST['marque']!="" && isset($_POST['type']) && $_POST['type']!="") {
        $marque =$_POST['marque'];
        $type =$_POST['type'];
        $url = "http://makeup-api.herokuapp.com/api/v1/products.json?brand=".$marque."&product_type=".$type;
        
        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($client);
        
        $result = json_decode($response);
        $res = $result[0];
        $res2 = $result[1];
        echo "<p> marque : $marque &nbsp;&nbsp; type de produit : $type</p>";
        echo " <font color='red'><h3>Premiere produit</h3></font>";
        echo "<table>";
        echo "<tr><td>ID:</td><td>$res->id</td></tr>";
        echo "<tr><td>Name:</td><td>$res->name</td></tr>";
        echo "<tr><td>Price :</td><td>$res->price</td></tr>";
        echo "<tr><td>Created_at :</td><td>$res->created_at</td></tr>";
        echo "<tr><td>Updated_at:</td><td>$res->updated_at</td></tr>";
        echo "</table>";
        echo "***********************************************<br>";
        echo "<font color='red'><h3>Deuxieme produit</h3></font>";
        echo "<table>";
        echo "<tr><td>ID:</td><td>$res2->id</td></tr>";
        echo "<tr><td>Name:</td><td>$res2->name</td></tr>";
        echo "<tr><td>Price :</td><td>$res2->price</td></tr>";
        echo "<tr><td>Created_at :</td><td>$res2->created_at</td></tr>";
        echo "<tr><td>Updated_at:</td><td>$res2->updated_at</td></tr>";
        echo "</table>";

}
?>



