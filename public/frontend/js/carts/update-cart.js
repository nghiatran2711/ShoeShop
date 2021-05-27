// $(document).ready(function(){
//     $('#quantity').on('change', function (event){
//         event.preventDefault();
//         $("input[name='quantity[]']").each(function() {
//             let rowId=$(this).data('id');
//             let quantity=$(this).val();
//             // let _url="{{ url('update-cart') }}";
//             // $.ajax({
//             //     type: 'GET',
//             //     url: _url,
//             //     dataType: "json",
//             //     data: {rowId: "hello", quantity: "ok"},
//             //     success: function (response) {
//             //         console.log('response', response);
//             //         alert(response.message);
//             //     },
//             //     error: function (err) {
//             //         console.log('err', err);
//             //         alert(err.message);
//             //     },
//             //     dataType: 'json'
//             // });
//         });
        
//     });
// });

// function updateCart(){
//     $(document).ready(function () {
//         var indexes = $('[name^="quantity[]"]').map(function(){
//             return this.name.match(/\d+/) + ',' + this.value;
//         }).get();
//         console.log(indexes);
//         let _url='{{ url('update-cart') }}';
//     });
// }