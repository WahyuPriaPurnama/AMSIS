<!DOCTYPE html>

<html>

<head>

    <title>testing input dinamis</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>



    <div class="container">

        <h2 align="center">testing input dinamis</h2>



        <form action="{{ route('addMorePost') }}" method="POST">

            @csrf



            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif



            @if (Session::has('success'))
                <div class="alert alert-success text-center">

                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                    <p>{{ Session::get('success') }}</p>

                </div>
            @endif



            <table class="table table-bordered" id="dynamicTable">

                <tr>

                    <th>Name</th>

                    <th>Qty</th>

                    <th>Price</th>

                    <th>Action</th>

                </tr>

                <tr>

                    <td><input type="text" name="addmore[0][name]" placeholder="Enter your Name"
                            class="form-control" /></td>

                    <td><input type="text" name="addmore[0][qty]" placeholder="Enter your Qty"
                            class="form-control" /></td>

                    <td><input type="text" name="addmore[0][price]" placeholder="Enter your Price"
                            class="form-control" /></td>

                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                    </td>

                </tr>

            </table>



            <button type="submit" class="btn btn-success">Save</button>

        </form>

    </div>



    <script type="text/javascript">
        var i = 0;



        $("#add").click(function() {



            ++i;



            $("#dynamicTable").append('<tr><td><input type="text" name="addmore[' + i +
                '][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore[' +
                i +
                '][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                );

        });



        $(document).on('click', '.remove-tr', function() {

            $(this).parents('tr').remove();

        });
    </script>



</body>

</html>
