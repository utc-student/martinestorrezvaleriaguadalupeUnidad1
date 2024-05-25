<?php
require_once "db_con.php";

class CardProduct {

    public function recoverProducts($search="", $category=0) {
        try {
            $con = new Conexion();

            if ($search=="" && $category==0) {
                $query = $con->prepare("SELECT product.id, product.`name`, product.price, category.category 
                FROM product INNER JOIN category ON product.category = category.id ORDER BY product.date_added ASC");
            }else {
                $query = $con->prepare("SELECT product.id, product.`name`, product.price, category.category 
                    FROM product INNER JOIN category ON product.category = category.id 
                    WHERE product.`name` LIKE '%no%' AND product.category = 1 
                    ORDER BY product.date_added ASC");
                $query->bindParam(':SEARCH', $search, PDO::PARAM_STR);
                $query->bindParam(':CAT', $category, PDO::PARAM_INT);
            }

            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function selectData() {
        $con = new Conexion();
        $query = $con->prepare("SELECT product.id, product.`name`, product.price, category.category 
            FROM product INNER JOIN category ON product.category = category.id ORDER BY product.date_added ASC");
        
    }

    public function getRatingProduct($idProduct) {
        try {
            $con = new Conexion();
            $stmt = $con->prepare("SELECT ROUND( AVG( review.stars ), 0 ) AS stars 
                                FROM product INNER JOIN review ON product.id = review.id_product 
                                WHERE product.id = :IDPRODUCT;");
            $stmt->bindParam(':IDPRODUCT', $idProduct, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $stars = '';

                if ($result['stars'] > 0) {
                    // Mostrar estrellas rellenas
                    for ($i = 0; $i < $result['stars']; $i++) {
                        $stars .= '<i class="fa fa-star" style="margin-right: 3px;"></i>';
                    }

                    // Mostrar estrellas vacías
                    for ($i = $result['stars']; $i < 5; $i++) {
                        $stars .= '<i class="fa fa-star-o" style="margin-right: 3px;"></i>';
                    }
                } else {
                    for ($i = 0; $i < 5; $i++) {
                        $stars .= '<i class="fa fa-star-o" style="margin-right: 3px;"></i>';
                    }
                }

                return $stars;
            } else {
                throw new Exception("No se encontró el producto con ID: " . $idProduct);
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function showCardProduct($data="") {
        return '
        <div class="col-md-4 col-xs-6">
            <div class="product">
                <div class="product-img">
                    <img src="./img/product01.png" alt="">
                </div>
                <div class="product-body">
                    <p class="product-category">'.$data['category'].'</p>
                    <h3 class="product-name"><a href="product.php?product='.$data['id'].'">'.$data['name'].'</a></h3>
                    <h4 class="product-price">'.$data['price'].'</h4>
                    <div class="product-rating">
                        '.$this->getRatingProduct($data['id']).'
                    </div>
                    <div class="product-btns">
                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                    </div>
                </div>
                <div class="add-to-cart">
                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                </div>
            </div>
        </div>

        <div class="clearfix visible-sm visible-xs"></div>
        ';
    }

}

?>