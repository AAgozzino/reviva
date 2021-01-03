<?php
    include 'carts.php';

    $cartId = $_GET['cart'];
    
    
    foreach ($carts as $k => $cart) {
        if ($k == $cartId) {
            $selectedCart = [];
            foreach ($carts[$cartId] as $product) {
                $price = $product['price'];
                $tax = 0.10;
                $duty = 0.05;
                // if product has sales tax and import duty
                if ($product['type'] !== 'book' && $product['type'] != 'food' && $product['type'] != 'medical' && $product['imported'] == 1) {
                    // Taxes = sales taxes + import duty
                    $taxesPerc = $tax + $duty;
                    $taxesAmount = round($price * $taxesPerc , 2);
                    // Add taxes to price
                    $product['price'] = round(($price + $taxesAmount) * $product['amount'],2);
                    // Set new variable taxes to product array
                    $product['taxes'] = $taxesAmount; 
                } 
                // If product has sales tax NOT imported
                else if ($product['type'] !== 'book' && $product['type'] != 'food' && $product['type'] != 'medical') {
                    // Taxes = sales taxes
                    $taxesAmount = round($price * $tax , 2);
                    // Add taxes to price
                    $product['price'] = round(($price + $taxesAmount) * $product['amount'],2);
                    // Set new variable taxes to product array
                    $product['taxes'] = $taxesAmount;
                } 
                // If product imported NOT sales tax 
                else if ($product['imported'] == 1){
                    // Taxes = sales taxes
                    $taxesAmount = round($price * $duty , 2);
                    // Add taxes to price
                    $product['price'] = round(($price + $taxesAmount) * $product['amount'],2);
                    // Set new variable taxes to product array
                    $product['taxes'] = $taxesAmount;
                } else{
                    $product['price'] = round($price * $product['amount'],2);
                    $product['taxes'] = 0;
                };
                $selectedCart[] = $product;
            };
            
            header('Content-Type: application/json');
            echo json_encode($selectedCart);
        }
    };

    
    


?>