<?php
  ob_start();
	include '../inc/header_admin.php';
	include '../inc/aside_admin.php';
	include '../../../models/function.php';

  $category = new handleEvent();

  if (isset($_GET['category_id'])) {
    $cat_id = $_GET['category_id'];

    // Truy vấn thông tin danh mục từ cơ sở dữ liệu
    $categoryInfo = $category->getCategoryInfo($cat_id);

    if ($categoryInfo) {
        $cat_name = $categoryInfo['CategoryName'];
        $cat_status = $categoryInfo['CategoryStatus'];
    } else {
        echo "Category not found.";
        exit;
    }
  }  

  // Biến kiểm tra xem biểu mẫu đã được gửi hay chưa
  $formSubmitted = false;

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formSubmitted = true;
    $cat_name = isset($_POST['CategoryName']) ? $_POST['CategoryName'] : '';
    $cat_status = isset($_POST['CategoryStatus']) ? $_POST['CategoryStatus'] : '';
    
    // Gọi hàm updateProduct với các giá trị vừa nhận được
    $updateCategory = $category->updateCategory($cat_id, $cat_name, $cat_status);

    if ($updateCategory) {
      header("Location: createCategory.php");
      exit;
    } else {
      echo "Error updating the product.";
    }
  } 
  ob_end_flush();
?>

<main role="main" class="main-content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row">
              <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">Update Product</h2>
                <form action="" class="bg-white p-5 contact-form" method="post">
                  <div class="form-group">
                      <input type="text" name="CategoryName" class="form-control" placeholder="Name category"
                          value="<?php if (!$formSubmitted) echo $cat_name; ?>">
                  </div>
                  <div class="form-group">
                      <input type="text" name="CategoryStatus" class="form-control" placeholder="Status category" 
                          value="<?php if (!$formSubmitted) echo $cat_status; ?>">
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
                          <th>ID</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $result = $category->showCategory();
                          if ($result === false) {
                            echo "Error occurred while getting data.";
                          } 
                          else {
                              foreach ($result as $category) {
                                echo  '<tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474"
                                        href="#collap-2474">
                                            <td>' . $category['CategoryID'] . '</td>
                                            <td>' . $category['CategoryID'] . '</td>
                                            <td>' . $category['CategoryName'] . '</td>
                                            <td>' . $category['CategoryStatus'] . '</td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="updateCategory.php?category_id=' . $category['CategoryID'] . '">Edit</a>
                                                <a class="dropdown-item" href="deleteCategory.php?category_id=' . $category['CategoryID'] . '">Remove</a>
                                                <a class="dropdown-item" href="assignCategory.php?category_id=' . $category['CategoryID'] . '">Assign</a>
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

<?php
  include "../inc/footer_admin.php";
?>