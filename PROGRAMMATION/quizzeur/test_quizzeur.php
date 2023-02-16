<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="test_quizzeur.css">
</head>
<body>
    <div class="container">
       <h4>Add items</h4> 
       <div class="card-body">
        <form action="#" method="POST" id="add_form">
            <div id="show_alert"></div>
            <div id="show_item">
                <div class="row">
                    <div class="x">
                    <input type="text" name="product_name[]"  class="form-control"     placeholder="Item Name" required>
                    </div>

                    <div class="x">
                    <input type="text" name="product_price[]"     class="form-control"    placeholder="Item Price" required>
                    </div>

                    <div class="x">
                    <input type="number" name="product_qty[]"   class="form-control"  placeholder="Item quantity" required>
                    </div>

                    <div class="x">
                    <button class="btn btn-success add_item_btn">add more<button>
                    </div>
                </div>
            </div>

            <input type="submit" value="add" class="btn btn-primary" id="add_btn" >
        </form>
       </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".add_item_btn").click(function(e){
                e.preventDefault()
                $("#show_item").prepend(`<div class="row append_item">
                    <div class="x">
                    <input type="text" name="product_name[]"  class="form-control"     placeholder="Item Name" required>
                    </div>

                    <div class="x">
                    <input type="text" name="product_price[]"     class="form-control"    placeholder="Item Price" required>
                    </div>

                    <div class="x">
                    <input type="number" name="product_qty[]"   class="form-control"  placeholder="Item quantity" required>
                    </div>

                    <div class="x">
                    <button class="btn btn-danger remove_item_btn">Remove<button>
                    </div>
                </div>`);
            });

            $(document).on('click', '.remove_item_btn', function(e){
                e.preventDefault()
                let row_item = $(this).parent().parent();
                $(row_item).remove()
            })

            // ajax request to insert  all form data
            $("#add_form").submit(function(e){
                e.preventDefault()
                $("#add_btn").val('adding...')
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: $(this).serialize(),
                    success: function(response){
                        $("#add_btn").val('add');
                        $("#add_form")[0].reset();
                        $(".append_item").remove();
                        $("show_alert").html(`<div classe="alert alert-success" role="alert">${response}</div>`);
                    }
                })
            })
        });
    </script>

</body>
</html>