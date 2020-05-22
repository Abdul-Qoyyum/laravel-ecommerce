<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $("#categoryForm").validate({
            rules : {
                name: {
                    required: true,
                    minlength: 2
                }
            },
            messages : {
                name : {
                    required : "Please specify the category name",
                    minlength : "Enter at least two characters"
                }
            }

        })
    })
</script>
