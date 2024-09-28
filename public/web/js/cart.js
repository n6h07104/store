
$(".add_to_cart").click(function(){
    var product_id=$(this).attr("id_pro");

    $.ajax({
        url:"./add_to_cart",
        method:"post",
        data:{product_id:product_id , _token:_token},



        succuss:function(succuss){
            console.log(succuss)
        },

        error:function(error){
            console.log(error)
        }
    });



});


function delete_cart(){
$(".delete_item").click(function(){
    $(this).closest(".cart_items").remove();
    cart();
    var product_id=$(this).attr("id_pr");
// console.log(product_id)
    $.ajax({
        url:"./destroy_item",
        method:"delete",
        data:{product_id:product_id , _token:_token},



        succuss:function(succuss){
            console.log(succuss)
        },

        error:function(error){
            console.log(error)
        }
    });

})
}

delete_cart();







function cart(){
 const price=document.querySelectorAll(".price_item");
 const count=document.querySelectorAll(".count_item");
 var total=0;
 var num_items=$(".cart_items").length;
 for( let i = 0; i < price.length; i++){
    var total=total + + price[i].innerHTML*count[i].innerHTML;
 }

    $(".total_price").html(total);
    $(".back_count").html(num_items);
}
cart()


$(".search_pro").keyup(function(){
var search=$(".search_pro").val();
// console.log(search);
$.ajax({
    url:"seaarch_pro",
    method:"post",
    data:{search:search, _token:_token},

    succuss:function(succuss){
        $(".search_div").html(succuss)
        console.log(succuss)
    },

    error:function(error){
        console.log(error)
    }
})

})



