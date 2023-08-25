<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('dash/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ url('dash/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Update Product</h1>
                    <form action="{{url('/update_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->p_id}}">
                        <div class="form-group">
                            <label for="pn">Select Product Catagory</label>
                            <select class="form-control" id="pn" name="pcid">
                                <option value="0">Choose Parent catagory</option>
                                @foreach($pname as $p)
                                    <option @if($data->p_catagory_id == $p->cat_id) selected @endif value="{{$p->cat_id}}">{{$p->cname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="pname" value="{{$data->p_name}}" class="form-control" placeholder="Enter product name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="number" name="pprice" value="{{$data->p_price}}" class="form-control" placeholder="Enter product price" id="price">
                        </div>
                        <div class="form-group">
                            <label for="price">Product Offer Price</label>
                            <input type="number" name="poffer" value="{{$data->p_offer_price}}" class="form-control" placeholder="Enter product price" value="0" id="price">
                        </div>
                        <div class="form-group">
                            <label for="des">Product Description</label>
                            <textarea name="des" id="des">{{$data->p_deacription}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="des" class="pr-5">Product Rating</label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" @if($data->p_rating == 1) checked @endif class="form-check-input" name="rate" value="1">1
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" @if($data->p_rating == 2) checked @endif class="form-check-input" name="rate" value="2">2
                                </label>
                            </div>
                            <div class="form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" @if($data->p_rating == 3) checked @endif class="form-check-input" name="rate" value="3">3
                                </label>
                            </div>
                            <div class="form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" @if($data->p_rating == 4) checked @endif class="form-check-input" name="rate" value="4">4
                                </label>
                            </div>
                            <div class="form-check-inline disabled">
                                <label class="form-check-label">
                                    <input type="radio" @if($data->p_rating == 5) checked @endif class="form-check-input" name="rate" value="5">5
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customFile">Product Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="img">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div class="img">
                                <img src="{{url('product_images')}}/{{$data->p_image}}" alt="">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary mt-5" value="Update Product"/>
                    </form>
                    <script>
                        CKEDITOR.replace( 'des' );
                    </script>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('dash/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('dash/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('dash/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('dash/js/sb-admin-2.min.js') }}"></script>
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

</body>

</html>