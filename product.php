<?php
include "component/header.php";
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded mx-0">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Products</button>
        </div>
        <div class="col-md-6 my-3 mx-3">
            <h3>ADD PRODUCTS</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $pdo->query("select * from products");
                $rows = $query->fetchALL(PDO::FETCH_ASSOC);
                foreach ($rows as $keys) {
                ?>
                    <tr>
                        <th scope="row"><img src="<?php echo $productimagesaddress . $keys['image'] ?>" alt="" width="80" srcset=""></th>
                        <td><?php echo $keys['name'] ?></td>
                        <td><?php echo $keys['price'] ?></td>
                        <td><?php echo $keys['quantity'] ?></td>
                        <td><a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modelupdate<?php echo $keys['id'] ?>">Edit</a></td>
                        <td><a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modeldelete<?php echo $keys['id'] ?>">Delete</td>
                    </tr>

                    <!-- update Products Modal -->
                    <div class="modal fade" id="modelupdate<?php echo $keys['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">UPDATE PRODUCTS</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="hidden" name="proid" value="<?php echo $keys['id'] ?>">
                                            <label for="exampleInputEmail1" class="form-label">Products Name</label>
                                            <input type="text" name="catName" value="<?php echo $keys['name'] ?>" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                            <div id="emailHelp" class="form-text">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Products Image</label>
                                            <input type="file" name="catImage" class="form-control" id="exampleInputPassword1">
                                            <img class="mt-3" src="<?php echo $catimagesaddress . $keys['image'] ?>" width="90" alt="">
                                        </div>
                                        <button type="submit" name="updateProducts" class="btn btn-primary">Update Products</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- delete Products Modal -->
                    <div class="modal fade" id="modeldelete<?php echo $keys['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">DELETE PRODUCTS</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="proid" value="<?php echo $keys['id'] ?>">
                                        <button type="submit" name="deleteProducts" class="btn btn-danger">Delete Products</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Blank End -->

<!-- add Products Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">ADD PRODUCTS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" name="productName" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="text" name="productprice" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                        <input type="text" name="productquantity" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Products Image</label>
                        <input type="file" name="productImage" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Select Category</label>
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                    <button type="submit" name="addProducts" class="btn btn-primary">Add Products</button>
                </form>
            </div>

        </div>
    </div>
</div>


<?php
include "component/footer.php";
?>