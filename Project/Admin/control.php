<?php

include_once('../website/model.php');  // load model file

class control extends model //  extends model for use of logic
{

    function __construct()
    {
        session_start();
        model::__construct();  // call model __construct 

        $path = $_SERVER['PATH_INFO'];

        switch ($path) {

            case '/admin':
                if (isset($_REQUEST['submit'])) {

                    $email = $_REQUEST['email'];
                    $pass=$_REQUEST['password'];

                    $password = md5($_REQUEST['password']);

                    $data = array("email" => $email, "password" => $password);

                    $res = $this->select_where1('admin', $data);

                    $chk = $res->num_rows;

                    if ($chk == 1) // 1 means true & 0 false
                    {
                        $data = $res->fetch_object(); // data fetch single
                        //CREATE SESSION
                        $_SESSION['a_id'] = $data->id;
                        $_SESSION['a_email'] = $data->email;
                        $_SESSION['a_name'] = $data->name;

                        if(isset($_REQUEST['rem']))
						{
							setcookie('cookie_email',$email,time()+15);
							setcookie('cookie_pass',$pass,time()+15);
						}

                        echo "<script>
                            alert('Login Successfully!');
                            window.location='dashboard';
                        </script>";
                    } else {
                        echo "<script>
                            alert('Login Failed!');
                            window.location='admin';
                        </script>";
                    }
                }
                include_once('admin_login.php');
                break;

            case '/admin_logout':
                unset($_SESSION['a_id']);
                unset($_SESSION['a_password']);
                unset($_SESSION['a_email']);

                //session_destroy();
                echo "<script>
                            alert('Logout Successfully!');
                            window.location='admin';
                        </script>";
            break;

            case '/dashboard':
                include_once('dashboard.php');
                break;

            case '/add_categories':
                if (isset($_REQUEST['submit'])) {

                    $name = $_REQUEST['name'];
                    $image = $_FILES['image']['name'];

                    $path = 'assets/images/catagory/' . $image;
                    $dup_img = $_FILES['image']['tmp_name'];
                    move_uploaded_file($dup_img, $path);

                    $data = array("name" => $name, "image" => $image);


                    $res = $this->insert('category', $data);

                    if ($res) {
                        echo "<script>
                            alert('Category Added Successfully!');
                        </script>";
                    }
                }

                include_once('add_categories.php');
                break;

            case '/manage_categories':
                $cate_arr = $this->select('category');

                include_once('manage_categories.php');
                break;


            case '/edit_categories':
                if (isset($_REQUEST['edit_categories'])) {
                    $id = $_REQUEST['edit_categories'];
                    $where = array("id" => $id);
                    $res = $this->select_where1('category', $where);
					$fetch = $res->fetch_object();
					
					 if (isset($_REQUEST['save'])) {

						$name = $_REQUEST['name'];
						
						if($_FILES['image']['size']>0)
						{
							
							$old_img=$fetch->image; // delete old image
							unlink('assets/images/catagory/' . $old_img);

							
							$image = $_FILES['image']['name']; //For new Image
							$path = 'assets/images/catagory/' . $image;
							$dup_img = $_FILES['image']['tmp_name'];
							move_uploaded_file($dup_img, $path);
							
							$data = array("name" => $name,"image" => $image);

							$res = $this->update('category', $data, $where);
							if ($res) {
								echo "<script>
									alert('Category Updated Successfully!');
									window.location='manage_categories';
								</script>";
							}
						}
						else
						{
							$data = array("name" => $name,);
							$res = $this->update('category', $data, $where);
							if ($res) {
								echo "<script>
									alert('Category Updated Successfully!');
									window.location='manage_categories';
								</script>";
							}
						}
							
							
					}
					
                }

                include_once('edit_categories.php');
                break;


            case '/add_product':
                $cate_arr = $this->select('category');
                if (isset($_REQUEST['submit'])) {
                    $name = $_REQUEST['product_name'];
                    $price = $_REQUEST['product_price'];
                    $cat_id = $_REQUEST['cat_id'];
                    $image = $_FILES['product_image']['name'];
                     $description = $_REQUEST['description'];

                    $path = 'assets/images/product/' . $image;
                    $dup_img = $_FILES['product_image']['tmp_name'];
                    move_uploaded_file($dup_img, $path);

                    $data = array("product_name" => $name, "product_price" => $price, "product_image" => $image, "cat_id" => $cat_id,"description" => $description);

                    $res = $this->insert('product', $data);
                    if ($res) {
                        echo "<script>
                            alert('Product Added Successfully!');
                        </script>";
                    }
                }

                include_once('add_product.php');
                break;

            case '/manage_product':
                $prod_arr = $this->double_select('product', 'category', 'name', 'category.id=product.cat_id');
                include_once('manage_product.php');
                break;

             case '/edit_product':
                $cate_arr = $this->select('category');
                if (isset($_REQUEST['edit_product'])) {
                    $id = $_REQUEST['edit_product'];
                    $where = array("id" => $id);
                    $res = $this->select_where1('product', $where);
					$fetch = $res->fetch_object();
					
					 if (isset($_REQUEST['save'])) {

						$name = $_REQUEST['product_name'];
                        $price = $_REQUEST['product_price'];
                        $image = $_FILES['product_image'];
                        $cat_id = $_REQUEST['cat_id'];
                        $description = $_REQUEST['description'];
						
						if($_FILES['product_image']['size']>0)
						{
							// delete image
							$old_img=$fetch->product_image;
							unlink('assets/images/product/' . $old_img);

							
							$image = $_FILES['product_image']['name'];
							$path = 'assets/images/product/' . $image;
							$dup_img = $_FILES['product_image']['tmp_name'];
							move_uploaded_file($dup_img, $path);
							
							$data = array("product_name" => $name,"product_image" => $image,"product_price" => $price,"cat_id" => $cat_id,"description" => $description);

							$res = $this->update('product', $data, $where);
							if ($res) {
								echo "<script>
									alert('Product Updated Successfully!');
									window.location='manage_product';
								</script>";
							}
						}
						else
						{
							$data = array("product_name" => $name,"product_price" => $price, "cat_id" => $cat_id,"description" => $description);
                            
							$res = $this->update('product', $data, $where);
							if ($res) {
								echo "<script>
									alert('Product Updated Successfully!');
									window.location='manage_product';
								</script>";
							}
						}
							
							
					}
					
                }

                include_once('edit_product.php');
                break;

            case '/manage_cart':
                //$cart_ar = $this->double_select('cart', 'product', 'cart.*, product.name AS product_name', 'cart.product_id = product.id');
                //$cart_ar = $this->double_select('cart','product','cart.*, product.name AS product_name','cart.id = product.id');


                //$cart_arr =$this->double_select('cart','product','name','cart.id=product.id');
                $cart_arr = $this->select('cart');
                include_once('manage_cart.php');
                break;

            case '/manage_contact':
                //$cont_arr=$this->select('contect_us');    
                $cont_arr = $this->select_orderby('contect_us', 'name'); //order by 
                include_once('manage_contact.php');
                break;

            case '/add_rider':
                if (isset($_REQUEST['submit'])) {

                    $name = $_REQUEST['name'];
                    $mobile_no = $_REQUEST['mobile_no'];

                    $data = array("name" => $name, "mobile_no" => $mobile_no,);

                    $res = $this->insert('riders', $data);
                    if ($res) {
                        echo "<script>
                            alert('Rider Added Successfully!');
                        </script>";
                    }
                }

                include_once('add_rider.php');
                break;

            case '/manage_rider':
                $rider_arr = $this->select('riders');
                include_once('manage_rider.php');
                break;

            case '/edit_rider':
            if (isset($_REQUEST['edit_rider'])) 
            {
                    $id = $_REQUEST['edit_rider'];
                    $where = array("id" => $id);
                    $res = $this->select_where1('riders', $where);
					$fetch = $res->fetch_object();
                        
                        if (isset($_REQUEST['save'])) 
                        {
                            $name = $_REQUEST['name'];
                            $mobile_no = $_REQUEST['mobile_no'];
                        
                            $data = array("name" => $name,"mobile_no" => $mobile_no);

                            $res = $this->update('riders', $data, $where);
                            if ($res) {
                                echo "<script>
                                    alert('Rider Update Successfully!');
                                    window.location='manage_rider';
                                </script>";
                            }
                        }
                }
            include_once('edit_rider.php');
            break;

            case '/manage_customer':
                $cust_arr = $this->select_orderby('customer', 'name'); //Order by name
                //$cust_arr=$this->select('customer'); 
                include_once('manage_customer.php');
                break;


            case '/manage_order':
                $proorder_arr = $this->select('p_order'); //this show only customer id
                include_once('manage_order.php');
                break;


            case '/manage_feedback':
                $feed_arr = $this->select('feedback');
                include_once('manage_feedback.php');
                break;

            case '/admin_account':
                include_once('admin_account.php');
            break;

            case '/delete':
                if(isset($_REQUEST['dlt_contact']))
                {
                    $id = $_REQUEST['dlt_contact'];
                    $where = array("id"=>$id);
                    $res = $this->delete_where('contect_us',$where);
                    if($res) 
                    {
                        echo "<script>
                            alert('Contect Delete Succeessfully!');
                            window.location='manage_contact';
                        </script>";
                    }
                }
                
                if(isset($_REQUEST['dlt_catagory']))
                {
                    $id=$_REQUEST['dlt_catagory'];
                    $where=array("id"=>$id);
                    $where = array("id" => $id);

                    // get del image first then delete data
					$res = $this->select_where1('category', $where);
                    $fetch=$res->fetch_object();
					$old_img=$fetch->image;

                    $res=$this->delete_where('category',$where);
                    if ($res) 
                    {
                        unlink('assets/images/catagory/' . $old_img); //delete old image

                        echo "<script>
                            alert('Category Delete Succeessfully!');
                             window.location='manage_categories';
                        </script>";
                    }
                }

                if(isset($_REQUEST['dlt_product']))
                {
                    $id =$_REQUEST['dlt_product'];
                    $where=array("id"=>$id);
                    $where = array("id" => $id);

                     $res = $this->select_where1('product', $where);
                     $fetch=$res->fetch_object();
                     $old_img=$fetch->product_image;

                     $res = $this->delete_where('product',$where);
                    if($res) 
                    {
                        unlink('assets/images/product/' . $old_img); //delete old image
                        echo "<script>
                            alert('Product Delete Succeessfully!');
                            window.location='manage_product';
                        </script>";
                    }
                }

                if(isset($_REQUEST['dlt_customer']))
                {
                    $id=$_REQUEST['dlt_customer'];
                    $where=array("id"=>$id);
                    $res=$this->delete_where('customer',$where);
                    if ($res) 
                    {
                        echo "<script>
                            alert('Customer Delete Succeessfully!');
                             window.location='manage_customer';
                        </script>";
                    }
                }

                if(isset($_REQUEST['dlt_rider']))
                {
                    $id=$_REQUEST['dlt_rider'];
                    $where=array("id"=>$id);
                    $res=$this->delete_where('riders',$where);
                    if ($res) 
                    {
                        echo "<script>
                            alert('Rider Delete Succeessfully!');
                             window.location='manage_rider';
                        </script>";
                    }
                }

                if(isset($_REQUEST['dlt_feedback']))
                {
                    $id=$_REQUEST['dlt_feedback'];
                    $where=array("id"=>$id);
                    $res=$this->delete_where('feedback',$where);
                    if ($res) 
                    {
                        echo "<script>
                            alert('Feedback Delete Succeessfully!');
                             window.location='manage_feedback';
                        </script>";
                    }
                }
                
            
            break;

            case '/status':
                if (isset($_REQUEST['status_customer'])) {
					
                    $id = $_REQUEST['status_customer'];
                    $where = array("id" => $id);
                    $res = $this->select_where('customer', $where);
					$fetch=$res->fetch_object();
					
					//echo $fetch->status;
						
					if($fetch->status=="Unblock")
					{
						$arr=array("status"=>"Block");
						$res=$this->update('customer', $arr, $where);
						if ($res) {
							
							unset($_SESSION['u_id']);
							unset($_SESSION['u_name']);
							unset($_SESSION['u_email']);
							echo "<script>
								alert('Customer Blocked Success!');
								window.location='manage_customer';
							</script>";
						}
					}
					else
					{
						$arr=array("status"=>"Unblock");
						$res=$this->update('customer', $arr, $where);
						if ($res) {
							echo "<script>
								alert('Customer Unblock Success!');
								window.location='manage_customer';
							</script>";
						}
					}
					
					
                    }
                    break;

                    
                    
        }
    }
}

$obj = new control;
