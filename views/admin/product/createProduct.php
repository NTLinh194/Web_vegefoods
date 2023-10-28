<?php
	include '../inc/header_admin.php';
	include '../inc/aside_admin.php';
	include '../../../models/function.php';

  $product = new handleEvent();
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pro_id = $_POST['ProductID']; 
    $pro_name = $_POST['ProductName'];
    $pro_desc = $_POST['ProductDesc'];
    $pro_image = $_POST['ProductImage'];
    $pro_quantity = $_POST['ProductQuantity'];
    $pro_price = $_POST['ProductPrice'];
    $pro_oldprice = $_POST['OldPrice'];
    $cat_id = $_POST['CategoryID'];
    $pro_status = $_POST['ProductStatus'];
    $insertProduct = $product->insertProduct($pro_id, $pro_name, $pro_desc, $pro_image, $pro_quantity, $pro_price, $pro_oldprice, $cat_id, $pro_status);
  }

  $result = $product->showProduct();
?>

<main role="main" class="main-content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row">
              <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">Create Product</h2>
                <form action="#" class="bg-white p-5 contact-form" method="post">
                  <div class="form-group">
                    <input type="text" name="ProductID" class="form-control" placeholder="ID product">
                  </div>
                  <div class="form-group">
                    <input type="text" name="ProductName" class="form-control" placeholder="Name product">
                  </div>
                  <div class="form-group text--color">
                    <textarea type="text" name="ProductDesc" id="editor" class="form-control" rows="10" placeholder="Description product"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="file" name="ProductImage" class="form-control" accept=".jpg, .jpeg, .png, .gif, .webp">
                  </div>
                  <div class="form-group">
                    <input type="text" name="ProductQuantity" class="form-control" placeholder="Quantity product">
                  </div>
                  <div class="form-group">
                    <input type="text" name="ProductPrice" class="form-control" placeholder="Price product">
                  </div>
                  <div class="form-group">
                    <input type="text" name="OldPrice" class="form-control" placeholder="Old price product">
                  </div>
                  <div class="form-group">
                    <select name="CategoryID" id="" class="form-control">
                      <option value="#">-- choise --</option>
                      <?php
                        $resultCat = $product->showCategory();
                        if ($resultCat === false) {
                          echo "Error occurred while getting data.";
                        } 
                        else {
                            foreach ($resultCat as $cat_item) {
                              echo  '<option value="'. $cat_item['CategoryID'] . '">'. $cat_item['CategoryID'] . ' - '. $cat_item['CategoryName'] . '</option>';
                            }
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" name="ProductStatus" class="form-control" placeholder="Status product">
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Send" class="btn btn-primary py-3 px-5">
                  </div>
                </form>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">List Products</h2>
                <p class="mb-3">Child rows with additional detailed information</p>
                <div class="card shadow">
                  <div class="card-body">
                    <!-- table -->
                    <table class="table table-hover table-borderless border-v">
                      <thead class="thead-dark">
                        <tr>
                          <th>STT</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Old price</th>
                          <th>category</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $result = $product->showProduct();
                          if ($result === false) {
                            echo "Error occurred while getting data.";
                          } 
                          else {
                            foreach ($result as $pro_item) {
                              $productDesc = $pro_item['ProductDesc'];
                              // Giới hạn độ dài của Description cần hiển thị (ví dụ: 100 ký tự)
                              $maxLength = 80;
                              $shortDesc = (strlen($productDesc) > $maxLength) ? substr($productDesc, 0, $maxLength) . "..." : $productDesc;

                              echo  '<tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474"
                                      href="#collap-2474">
                                          <td>' . $pro_item['ProductID'] . '</td>
                                          <td>' . $pro_item['ProductName'] . '</td>
                                          <td>
                                            <span data-toggle="tooltip" data-placement="top" title="' . $productDesc . '">
                                                ' . $shortDesc . '
                                            </span>
                                          </td>
                                          <td>
                                            <img class="img_product" src="../../../assets/images/' . $pro_item['ProductImage'] . '" alt="">
                                          </td>
                                          <td>' . $pro_item['ProductQuantity'] . '</td>
                                          <td>' . number_format($pro_item['ProductPrice'], 3) . '</td>
                                          <td>' . number_format($pro_item['OldPrice'], 3) . '</td>
                                          <td>' . $pro_item['CategoryID'] . '</td>
                                          <td>' . $pro_item['ProductStatus'] . '</td>
                                          <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <span class="text-muted sr-only">Action</span>
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right">
                                              <a class="dropdown-item" href="updateProduct.php?product_id=' . $pro_item['ProductID'] . '">Edit</a>
                                              <a class="dropdown-item" href="deleteProduct.php?product_id=' . $pro_item['ProductID'] . '">Remove</a>
                                              <a class="dropdown-item" href="assignProduct.php?product_id=' . $pro_item['ProductID'] . '">Assign</a>
                                          </div>
                                          </td>
                                      </tr>';
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> <!-- end section -->
          </div> <!-- .col-12 -->
        </div> <!-- .row -->
      </div> <!-- .container-fluid -->
      <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="list-group list-group-flush my-n3">
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-box fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Package has uploaded successfull</strong></small>
                      <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                      <small class="badge badge-pill badge-light text-muted">1m ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-download fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Widgets are updated successfull</strong></small>
                      <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                      <small class="badge badge-pill badge-light text-muted">2m ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-inbox fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Notifications have been sent</strong></small>
                      <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                      <small class="badge badge-pill badge-light text-muted">30m ago</small>
                    </div>
                  </div> <!-- / .row -->
                </div>
                <div class="list-group-item bg-transparent">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="fe fe-link fe-24"></span>
                    </div>
                    <div class="col">
                      <small><strong>Link was attached to menu</strong></small>
                      <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                      <small class="badge badge-pill badge-light text-muted">1h ago</small>
                    </div>
                  </div>
                </div> <!-- / .row -->
              </div> <!-- / .list-group -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body px-5">
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-success justify-content-center">
                    <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Control area</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Activity</p>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Droplet</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Upload</p>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-users fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Users</p>
                </div>
                <div class="col-6 text-center">
                  <div class="squircle bg-primary justify-content-center">
                    <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                  </div>
                  <p>Settings</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main> <!-- main -->

<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
  } );
</script>

<?php
  include "../inc/footer_admin.php";
?>