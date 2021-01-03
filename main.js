$(document).ready(function(){
    // Ajax - render receipt selecting cart form select
    $('#carts').change(
        function(){
            const cart = $('#carts').val();
            $('#cart-id').text(parseInt(cart)+1);
            $.ajax(
                {
                    "url": "http://localhost:8000/api.php",
                    "method": "GET",
                    "data": {
                        "cart": cart,
                    },
                    "success": function (data){
                        renderReceipt(data);
                        setTotal(data);
                    },
                    "error": function (){
                        alert("Error");
                    }
                }
            )
        }
    );
});

// Set total for taxes and receipt
function setTotal(data){
    let total = 0;
    let taxes = 0;
    for (let i = 0; i < data.length; i++) {
        total += data[i]['price']; 
        taxes += data[i]['taxes'];
    }
    $('#total-value').text((Math.round(total * 100) / 100).toFixed(2));
    $('#tax-value').text((Math.round(taxes * 100) / 100).toFixed(2));

};

// Render receipt products
function renderReceipt(data) {
    $('#receipt').html('');
    $('.d-none').removeClass('d-none');
    var source = $("#cart-template").html();
    var template = Handlebars.compile(source);
    for (let i = 0; i < data.length; i++) {
        let context = {
            "amount" : data[i].amount, 
            "name" : data[i].name,
            "price" : data[i]["price"].toFixed(2),
            "imported" : data[i].imported
        }
        let html = template(context);
        $('#receipt').append(html);
    }
}

