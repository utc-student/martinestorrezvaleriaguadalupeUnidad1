<?php
require_once "db_con.php";

class ShowProduct {
    // Atributes
    protected $idProduct=5;
    protected $nameProduct;
    protected $descriptionProduct;
    protected $detailsProduct;
    protected $colorProduct;
    protected $ratingProduct;
    protected $numReviews;
    protected $categoryProduct;
    protected $priceProduct;

    /**
     * Get the value of idProduct
     */ 
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * Get the value of nameProduct - Completed
     */ 
    public function getNameProduct() {
        try {
            $con = new Conexion();
            $stmt = $con->prepare("SELECT name FROM product WHERE id = :IDPRODUCT");
            $stmt->bindParam(':IDPRODUCT', $this->idProduct, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['name'];
            } else {
                throw new Exception("No se encontró el producto con ID: " . $this->idProduct);
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Get the value of descriptionProduct
     */ 
    public function getDescriptionProduct()
    {
        try {
            $con = new Conexion();
            $stmt = $con->prepare("SELECT product.description AS description FROM product WHERE product.id = :IDPRODUCT;");
            $stmt->bindParam(':IDPRODUCT', $this->idProduct, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['description'];
            } else {
                throw new Exception("No se encontró el producto con ID: " . $this->idProduct);
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Get the value of detailsProduct
     */ 
    public function getDetailsProduct()
    {
        try {
            $con = new Conexion();
            $stmt = $con->prepare("SELECT product.details AS details FROM product WHERE product.id = :IDPRODUCT;");
            $stmt->bindParam(':IDPRODUCT', $this->idProduct, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['details'];
            } else {
                throw new Exception("No se encontró el producto con ID: " . $this->idProduct);
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Get the value of colorProduct - Completed
     */ 
    public function getColorProduct() {
        try {
            $con = new Conexion();
            $stmt = $con->prepare("SELECT product.color AS color FROM product WHERE product.id = :IDPRODUCT;");
            $stmt->bindParam(':IDPRODUCT', $this->idProduct, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['color'];
            } else {
                throw new Exception("No se encontró el producto con ID: " . $this->idProduct);
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Get the value of reviewProduct - Completed
     */ 
    public function getRatingProduct() {
        try {
            $con = new Conexion();
            $stmt = $con->prepare("SELECT COUNT( review.id ) AS nReviews, ROUND( AVG( review.stars ), 0 ) AS stars 
                                FROM product INNER JOIN review ON product.id = review.id_product 
                                WHERE product.id = :IDPRODUCT;");
            $stmt->bindParam(':IDPRODUCT', $this->idProduct, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $stars = '';

                if ($result['stars'] > 0) {
                    // Mostrar estrellas rellenas
                    for ($i = 0; $i < $result['stars']; $i++) {
                        $stars .= '<i class="fa fa-star"></i>';
                    }

                    // Mostrar estrellas vacías
                    for ($i = $result['stars']; $i < 5; $i++) {
                        $stars .= '<i class="fa fa-star-o"></i>';
                    }
                }

                return $stars;
            } else {
                throw new Exception("No se encontró el producto con ID: " . $this->idProduct);
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Get the value of categoryProduct
     */ 
    public function getCategoryProduct()
    {
        return $this->categoryProduct;
    }

    /**
     * Get the value of numReviews - Completed
     */ 
    public function getNumReviews() {
        try {
            $con = new Conexion();
            $stmt = $con->prepare("SELECT COUNT(review.id) AS nReviews
                                FROM review WHERE review.id_product = :IDPRODUCT;");
            $stmt->bindParam(':IDPRODUCT', $this->idProduct, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['nReviews'];
            } else {
                throw new Exception("No se encontró el producto con ID: " . $this->idProduct);
            }
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

/* $product = new ShowProduct();
echo $product->getIdProduct();
echo "<br>";
echo "Nombre: " . $product->getNameProduct(); */
?>