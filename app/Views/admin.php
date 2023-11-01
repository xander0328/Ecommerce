<?=$this->include('inc/head')?>
<style>
.fade-out {
    opacity: 1;
    transition: opacity 1s ease-in-out;
}
</style>

<body style="background-color: #72B6FF">
    <header class="header header-intro-clearance header-4">

        <div class="header-">
            <div class="container">
                <div class="header-left ">
                    <a href="admin" class="logo">
                        <img src="<?= base_url() ?>assets/images/demos/demo-4/logo.png" alt="Molla Logo" width="105"
                            height="25">
                    </a>&nbsp;
                    <h3 class="d-none d-md-inline ps-2 opacity-75" style="margin-top: 2.55rem; margin-bottom: 2.95rem;">
                        |
                        Admin
                        Panel
                    </h3>
                </div><!-- End .header-left -->

                <div class=" header-right">
                    <div class="dropdown cart-dropdown">
                        <a href="" class="dropdown-toggle" data-bs-toggle="modal" data-bs-target="#profile">
                            <div class="icon fs-3">
                                <i class="fa-regular fa-circle-user fa-2xl"></i>

                            </div>
                            <p class="fs-5"><?=$_SESSION['username']?>
                            </p>
                        </a>

                    </div><!-- End .cart-dropdown -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
    </header><!-- End .header -->



    <div class="d-flex align-items-center justify-content-between p-5 pb-0 position-relative ">
        <?php if(session()->has('alert')) { ?>
        <div id="alert" class="alert alert-danger rounded-pill position-absolute top-1 start-50 translate-middle-x"
            tabindex="-1">
            <?= session('alert')?>
        </div>
        <?php } ?>

        <?php if(session()->has('success')) { ?>
        <div id="alert" class="alert alert-success rounded-pill position-absolute top-1 start-50 translate-middle-x"
            tabindex="-1">
            <?= session('success')?>
        </div>
        <?php } ?>

        <h4>All Products</h4>
        <div class="">
            <button type="button" class="btn btn-light rounded-2" data-bs-toggle="modal" data-bs-target="#addProduct">
                <i class="fa-solid fa-plus"></i> Add Product
            </button>
            <button type="button" class="btn btn-light rounded-2" data-bs-toggle="modal" data-bs-target="#categories">
                <i class="fa-solid fa-list-ul"></i> Categories
            </button>
        </div>
    </div>
    <!-- <hr class="mx-5"> -->
    <div class="p-5">
        <table id="adminTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th class="ps-2 fw-bold  text-center text-black">No.</th>
                    <th class="fw-bold text-center text-black">Image</th>
                    <th class="fw-bold text-center text-black">Name</th>
                    <th class="fw-bold text-center text-black">Category</th>
                    <th class="fw-bold text-center text-black">Price</th>
                    <th class="fw-bold text-center text-black">Quantity</th>
                    <th class="fw-bold text-center text-black">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $num = 1;
                foreach ($product as $prod) {?>
                <tr>
                    <td class="text-center"><?=$num?></td>
                    <td class="text-center">
                        <div style="width:100px; height:100px;">
                            <img src="data:image/jpeg;base64,<?=base64_encode($prod['image'])?>"
                                style="width: 100%; height: 100%; object-fit:cover;">
                        </div>
                    </td>
                    <td class=" px-2"><?=$prod['name']?></td>
                    <?php foreach ($category as $cat) {
                        if ($cat['category_id'] == $prod['category_id']) {?>
                    <td class="text-center"><?=$cat['name']?></td>
                    <?php  } } ?>
                    <td class="text-center"><?=$prod['price']?></td>
                    <td class="text-center"><?=$prod['quantity']?></td>
                    <td class="text-center m-0 w-25">

                        <button type="button" class="edit-btn btn btn-light fs-4" style="min-width: 0;"
                            data-id="<?= $prod['product_id'] ?>"><i class="fa-solid fa-file-pen ">
                            </i> Edit</button>
                        <a href="delete_product/<?=$prod['product_id']?>" class="btn btn-light text-danger fs-4"
                            style="min-width: 0;"><i class="fa-solid fa-trash"></i>
                            Delete</a>
                    </td>
                </tr>
                <?php
            $num++; } ?>
            </tbody>
        </table>
    </div>

    <!-- Modals -->
    <!-- Profile Modal -->
    <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-1" id="exampleModalLabel">Update Credentials</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <form action="update_admin" method="post" id="profileForm">
                        <b>Username</b><br>
                        <div class="input-group input-group-lg mb-1">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><b>New Username</b></span>
                            <input type="text" class="form-control" name="new_username"
                                value="<?=session()->get('username')?>" required>
                        </div>


                        <b>Password (you can leave boxes below empty)</b><br>
                        <div class="input-group input-group-lg mb-1">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><b>Old Password</b></span>
                            <input type="text" class="form-control" name="old_password" id="old_password">
                        </div>
                        <div class="input-group input-group-lg mb-1">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><b>New Password</b></span>
                            <input type="text" class="form-control" name="new_password" id="new_password">
                        </div>
                        <div class="input-group input-group-lg mb-1">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><b>Confirm Password</b></span>
                            <input type="text" class="form-control" name="confirm_password" id="confirm_password">
                        </div>
                        <button type="submit" class="btn form-control btn-primary mb-1"><i class="fa-solid fa-pen"></i>
                            Update</button>
                    </form>

                    <a href="logout" class="btn btn-warning form-control"><i
                            class="fa-solid fa-right-from-bracket"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Profile Modal -->
    <!-- Add Product Modal -->
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="exampleModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <form action="/add_product" method="post" enctype="multipart/form-data" id="addProductForm">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                        <label for="">Description: </label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
                        <label for="">Image: </label>
                        <input type="file" class="form-control" name="image" accept="image/*" required>
                        <label for="">Category: </label>
                        <select id="selected_option" class="form-select fs-4 mb-2" aria-label="Default select example"
                            name="category_id" required>
                            <option value="1" selected>Select</option>
                            <?php foreach ($category as $cat) { 
                                if($cat['category_id'] == 1)
                                continue;?>
                            <option value="<?=$cat['category_id']?>"><?=$cat['name']?></option>
                            <?php } ?>
                        </select>
                        <label for="">Price: </label>
                        <input type="number" class="form-control mb-2" name="price" required>
                        <label for="">Quantity</label>
                        <input type="number" class="form-control mb-2" name="quantity" required>
                        <input type="submit" class="btn btn-primary form-control" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Add Product Modal -->

    <!-- Categories Modal -->
    <div class="modal fade" id="categories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="exampleModalLabel">Categories</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <form action="/add_category" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Category Name" name="name" required>
                            <button class="btn btn-primary" type="submit" id="button-addon2">Add</button>
                        </div>
                    </form>
                    <ul class="list-group">
                        <div>List of Categories</div>
                        <?php foreach ($category as $cat) {?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <?php if($cat['category_id'] != 1){?>
                                <a href="/del_category/<?= $cat['category_id']?>"><i
                                        class="fa-regular fa-square-minus text-danger"></i></a>
                                <?php } ?>
                                <?= $cat['name'] ?>
                            </div>
                            <span class="badge bg-primary rounded-3">
                                <?php 
                                $exist = false;
                                $num = 0;
                                foreach ($catItems as $count) { 
                                    if(!$exist){
                                        if($count['category_id'] == $cat['category_id']){
                                            $exist = true;
                                            $num = $count['count'];
                                        }
                                    }                                 
                                }

                                if($exist)
                                    echo $num;
                                else 
                                    echo "0";                                
                                ?>
                            </span>
                        </li>
                        <?php  } ?>
                    </ul>
                </div>
                <!-- <div class="modal-footer">
                </div> -->
            </div>
        </div>
    </div>
    <!-- End of Categories Modal -->

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="exampleModalLabel">Edit Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <form action="/update_product/0" method="post" enctype="multipart/form-data" id="editProductForm">
                        <label for="">Name:</label>
                        <input type="text" id="product_name" class="form-control" name="name" value="" required>
                        <label for="">Description: </label>
                        <textarea name="description" id="product_desc" cols="30" rows="10" class="form-control"
                            required></textarea>
                        <label for="">Change Image: </label>
                        <input type="file" id="product_image" class="form-control" name="image" accept="image/*">
                        <label for="">Category: </label>
                        <select id="product_category" class="form-select fs-4 mb-2" aria-label="Default select example"
                            name="category_id" required>
                            <option value="1" selected>Select</option>
                            <?php foreach ($category as $cat) { 
                                if($cat['category_id'] == 1)
                                continue;?>
                            <option value="<?=$cat['category_id']?>"><?=$cat['name']?></option>
                            <?php } ?>
                        </select>
                        <label for="">Price: </label>
                        <input type="number" id="product_price" class="form-control mb-2" name="price" required>
                        <label for="">Quantity</label>
                        <input type="number" id="product_quantity" class="form-control mb-2" name="quantity" required>
                        <input type="submit" class="btn btn-primary form-control" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Edit Product Modal -->

    <?= $this->include('inc/script')?>

    <script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var student_id = $(this).attr('data-id');
            $.ajax({
                url: 'edit_product/' + student_id,
                type: "GET",
                dataType: 'json',
                success: function(res) {
                    var form = $('#editProductForm');
                    currentAction = form.attr('action').slice(0, -1);
                    var newAction = currentAction + res.product_id;
                    form.attr('action', newAction);

                    $('#editModal').modal('show');
                    $('#editModal #product_name').val(res.name);
                    $('#editModal #product_desc').val(res.description);
                    $('#editModal #product_category').val(res.category_id);
                    $('#editModal #product_price').val(res.price);
                    $('#editModal #product_quantity').val(res.quantity);
                    console.log(res);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });
    </script>
    <!-- DataTables Script -->
    <script>
    new DataTable(' #adminTable');
    </script>
    <script>
    document.getElementById('addProductForm').addEventListener('submit', function(event) {
        var selectedOption = document.getElementById('selected_option').value;

        if (selectedOption === '') {
            alert('Please select an option before submitting.');
            event.preventDefault(); // Prevent form submission
        }
    });
    </script>
    <script>
    // Wait for the document to load
    document.addEventListener("DOMContentLoaded", function() {
        // Get the div element by its id
        var divToFadeOut = document.getElementById("alert");

        // Use setTimeout to delay the fade-out effect
        setTimeout(function() {
            // Add a CSS class to change the opacity
            divToFadeOut.classList.add("fade-out");

            // Set opacity to 0 after a short delay (to allow the transition to work)
            setTimeout(function() {
                divToFadeOut.style.opacity = "0";
            }, 50); // You can adjust the delay as needed
        }, 3000); // 5000 milliseconds (5 seconds)


    });
    </script>
    <script>
    document.getElementById("profileForm").addEventListener("submit", function(event) {
        var oldPassword = document.getElementById("old_password").value.trim();
        var newPassword = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("confirm_password").value;

        if (oldPassword !== "" && newPassword !== confirmPassword) {
            // Old Password is not empty, and New Password and Confirm Password don't match
            alert("New Password and Confirm Password must match.");
            event.preventDefault();
        } else if (oldPassword === "" && newPassword !== confirmPassword) {
            // Old Password is not empty, and New Password and Confirm Password don't match
            alert("Old Password is needed to change you password");
            event.preventDefault();
        }
    });
    </script>

</body>