<script>
    $(document).ready(function(){
        $('#createProductForm').validate({
            rules : {
                name : {
                    required : true,
                    minlength : 2
                },
                price : {
                    required : true,
                    number : true
                },
                first_url : {
                    required : true
                },
                second_url : {
                    required : true
                },
                category_id : {
                    required : true
                },
                description : {
                    required : true,
                    minlength : 5
                }
            },
            messages : {
                name: {
                    required: "Enter the product name",
                    minlength: "Enter at least two characters"
                },
                price: {
                    required: "Enter the price"
                },
                category_id: {
                    required : "Please select a category"
                },
                description : {
                    required : "Enter the description"
                }
            }
        })
    })
</script>
