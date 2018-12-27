$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('a.showForm').on('click', function () {
    $('#hideForm').toggle('slow');
    $(this).toggle('hide');

});

$('.buy').click(function () {
    let user_id=$(this).data('userid');
    let id=$(this).data('id');
    let prod_id=$(this).data('product');
    let a=$(this).parent().parent().parent().parent().find('.hideCount').data('id');
    if(user_id==id){
        swal({
            title: "Ой",
            text: "Нельзя купить свой товар!!!",
            icon: "warning",
        });
    }else{
        $.ajax({
            type:"post",
            url:"/buy_product",
            data:{user_id:id,product_id:prod_id},
            success: function (data) {
                swal({
                    title: "Поздравляю",
                    text: "Товар приобретен",
                    icon: "success",
                });
                if(data==0){
                    setTimeout(function() {
                        location.reload();}, 1500);
                }
               $('span.count').html(data);
            },
            error:function () {
                swal({
                    title: "Ой",
                    text: "Что-то пошло не так",
                    icon: "warning",
                });
            }
            }
        )
    }

    // console.log(id);
});