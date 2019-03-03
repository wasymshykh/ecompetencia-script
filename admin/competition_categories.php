<?php 
    include '../config/db.php';
    include 'includes/functions.php';
    include '../config/auth_admin.php';

    if(!($_SESSION['management']['management_type'] === 'A')){
        header('location: '.ADMIN_URL.'/index.php');
    }

    if(isset($_GET['delete'])){
        $cat = getCategoryById(normal($_GET['delete']));
        if(!empty($cat) && count($cat) > 0) {
            if(updateCategoryDelete($cat['category_ID'])){
                header('location: '.ADMIN_URL.'/competition_categories.php');
            }
        }
    }

    $error = "";
    $cat_error = "";
    $showNewModal = false;
    $showEdit = false;
    $accepted = ["image/png","image/jpg", "image/jpeg"];

    if(isset($_POST['add_cat'])){

        $c_name = normal($_POST['category_name']);
        $c_img_name= time() .'_'. $_FILES['category_img']['name'];
        $c_img_size=$_FILES['category_img']['size'];
        $c_img_type=$_FILES['category_img']['type'];
        $c_img_tmp_name=$_FILES['category_img']['tmp_name'];
        
        if(empty($c_name) || strlen($c_name) < 2){
            $error = "Enter category name!";
        }
        else if(empty($_FILES['category_img']['name'])) {
            $error = "Please select category image!";
        } else if(!fileNameCheck($_FILES['category_img']['name'])){
            $error = "File name should not contain any special characters";
        }
        else if ($c_img_size > 1000000) {
            $error = "Picture size should not exceed 1mb! it will effect server performance.";
        } else if (!in_array($c_img_type, $accepted)) {
            $error = "Image type is not supported!";
        }
        else if(!move_uploaded_file($c_img_tmp_name,"../assets/uploads/categories/$c_img_name")){
            $error = "Couldn't upload your selected image.";
        }

        if(empty($error)){
            
            $catQuery = "INSERT INTO `categories` (`category_name`, `category_img`) VALUE (:name, :img)";
            $stmt = $db->prepare($catQuery);
            if(!$stmt->execute(['name'=>$c_name, 'img'=>$c_img_name])){
                $error = "Unable to insert the category!";
                $showNewModal = true;
            }

        } else {
            $showNewModal = true;
        }

    }

    if(isset($_GET['edit'])){

        $cat = getCategoryById(normal($_GET['edit']));

        if(!empty($cat) && count($cat) > 0) {
            $showEdit = true;
        }

        if(isset($_POST['edit_cat'])){
            
            $cat_name = normal($_POST['cat_name']);

            if(empty($cat_name) || strlen($cat_name) < 2) {
                $cat_error = "Enter category name!";
            }
            if(!updateCategoryName($cat_name, $cat['category_ID'])){
                $cat_error = "Couldn't update the name!";
            }

            if(!empty($_FILES['cat_img']['name'])){

                $c_img_name= time() .'_'. $_FILES['cat_img']['name'];
                $c_img_size=$_FILES['cat_img']['size'];
                $c_img_type=$_FILES['cat_img']['type'];
                $c_img_tmp_name=$_FILES['cat_img']['tmp_name'];
                
                if(!fileNameCheck($_FILES['cat_img']['name'])){
                    $cat_error = "File name should not contain any special characters";
                }
                else if ($c_img_size > 1000000) {
                    $cat_error = "Picture size should not exceed 1mb! it will effect server performance.";
                } else if (!in_array($c_img_type, $accepted)) {
                    $cat_error = "Image type is not supported!";
                }
                else if(!move_uploaded_file($c_img_tmp_name,"../assets/uploads/categories/$c_img_name")){
                    $cat_error = "Couldn't upload your selected image.";
                }

                if(empty($cat_error)){
                    if(!updateCategoryImage($c_img_name, $cat['category_ID'])){
                        $cat_error = "Couldn't update the image!";
                    }
                }
            }

            if(empty($cat_error)){
                $cat_success = "Successfully Updated!";
                $cat = getCategoryById(normal($_GET['edit']));
            }

        }

    }

?>
<?php 
    $page_title = "Competition Categories";
    include 'views/admin/layout/header.php'; 
?>
<?php 
    $categories = getCategories();
    include 'views/admin/competition_categories.php'; 

?>
<?php include 'views/admin/layout/footer.php'; ?>