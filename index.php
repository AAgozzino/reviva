<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test Reviva</title>
        <!-- Handlebars -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js" integrity="sha512-zT3zHcFYbQwjHdKjCu6OMmETx8fJA9S7E6W7kBeFxultf75OPTYUJigEKX58qgyQMi1m1EgenfjMXlRZG8BXaw==" crossorigin="anonymous"></script>
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="container">
                <div class="select-menu">
                    <label for="carts">Chose a cart</label>
                    <select name="carts" id="carts">
                        <option value="0">Cart 1</option>
                        <option value="1">Cart 2</option>
                        <option value="2">Cart 3</option>
                    </select>
                </div>
                
                <h2 class='d-none'>Cart <span id="cart-id"></span></h2>
                <div id="receipt">

                </div>
                <div class="taxes-row d-none">Sales Taxes: <span id="tax-value">54</span></div>
                <div class="total-row d-none">Total: <span id="total-value">32.45</span></div>
            </div>
        </div>
        <!-- handlebars template -->
        <script id="cart-template" type="text/x-handlebars-template">
            <div class="receipt-grid">
                <div class="product-row">
                    <div class="product-amount">{{amount}}</div>
                    {{#if imported}}
                    <div class="product-name">imported {{name}}</div>
                    {{else}}
                    <div class="product-name">{{name}}</div>
                    {{/if}}
                    <div class="product-price">{{price}}</div>
                </div>
            </div>
        </script>
        <!-- JavaScript -->
        <script src="main.js"></script>
    </body>
</html>

