<script type="text/javascript">
    $(document).ready(function () {

        $(".add_to_cart").on('click',function(e){
            var productId = $(this).val();
            $.get("{{route('add.to.cart')}}",{productId:productId},function(data){
                $("#cart_number").text(data[0]);
                $("#cart_price").text(data[1]);
                $("#no_product_added").hide();
                $("#view_cart").show();
                $("#carts").load(location.href + " #carts");
alert('Product has added to cart.');
            });
        });
    });
</script>