<?php

include_once('model.php');   // load model

class control extends model  // extends model for use of logic
{  

    function __construct()
    {
        session_start();
        model::__construct();  // call model __construct

        $path=$_SERVER['PATH_INFO'];
         
        switch($path)
        {

            case '/index':
            include_once('index.php');
            break;

            case '/about':
            include_once('about.php');
            break;

            case '/catagory':
                $cate_arr = $this->select('category');

            include_once('catagory.php');
            break;

            case '/product':
                    
                if (isset($_REQUEST['cat_id'])) 
                {
                    $cat_id = $_REQUEST['cat_id'];
                    $products_arr = $this->select_where('product', ['cat_id' => $cat_id]);
                    $category_data = $this->select_where('category', ['id' => $cat_id]);
                    $category_name = !empty($category_data) ? $category_data[0]->name : 'Products';
                } 
                else 
                {
                    $products_arr = $this->select('product');
                    $category_name = "All Products";
                }

            include_once('product.php');
            break;

            case '/contact':
                if (isset($_REQUEST['submit'])) 
                {

                    $name = $_REQUEST['name'];
                    $email = $_REQUEST['email'];
                    $message = $_REQUEST['message']; 


                    $data = array("name" => $name,"email" => $email,"message" => $message);

                    $res = $this->insert('contect_us', $data);
                    if ($res) 
                    {
                        echo "<script>
                            alert('Thank You for Connecting Us!');  
                        </script>";
                    }
                }
            include_once('contact.php');
            break;

            case '/cart':
            include_once('cart.php');
            break;

            case '/feedback':
                if (isset($_REQUEST['submit'])) 
                {
                    $order_id = $_REQUEST['order_id'];
                    $cust_id = $_REQUEST['cust_id'];
                    $comment = $_REQUEST['comment'];

                    $data = array("order_id" => $order_id, "cust_id" => $cust_id, "comment" => $comment);

                    $res = $this->insert('feedback', $data);
                    if ($res) 
                    {
                        echo "<script>alert('Thank you for your feedback!');</script>";
                    }
                }

            include_once('feedback.php');
            break;

            case '/signup':
                if (isset($_REQUEST['submit'])) 
                {

                    $name = $_REQUEST['name'];
                    $email = $_REQUEST['email'];
                    $password = md5($_REQUEST['password']);
                    $mobile_no = $_REQUEST['mobile_no'];


                    $data = array("name" => $name, "email" => $email,"password" => $password,"mobile_no" => $mobile_no);

                    $res = $this->insert('customer', $data);
                    if ($res) 
                    {
                        echo "<script>
                            alert('Signup Succeessfully!');
                            window.location='login';
                        </script>";
                    }
                    else
                    {
                        echo "Not Succeessfully";
                    }
                }

            include_once('signup.php');
            break;
            
            case '/login':
                 if (isset($_REQUEST['submit'])) 
                {
                    $email = $_REQUEST['email'];
                    $password = md5($_REQUEST['password']);

                    $data = array("email" => $email, "password" => $password );

                    $res=$this->select_where1('customer',$data);

                    $chk=$res->num_rows; 
                    
                    if($chk==1) // 1 means true & 0 false
                    {
                        $data=$res->fetch_object(); // data fetch single
                        //CREATE SESSION
                        $_SESSION['u_name']=$data->name;
                        $_SESSION['u_email']=$data->email;
                        $_SESSION['u_id']=$data->id;

                        echo "<script>
                            alert('Login Successfully!');
                            window.location='index';
                        </script>";
                    }
                    else
                    {
                        echo "<script>
                            alert('Login Failed!');
                            window.location='login';
                        </script>";
                    }
                }

            include_once('login.php');
            break;

            case '/user_logout':
                
                unset($_SESSION['u_id']);  //for delete session
                unset($_SESSION['u_name']);
                unset($_SESSION['u_email']);

                    //session_destroy();
                echo "<script>
                    alert('Logout Successful!');
                    window.location='index';
                 </script>";
            break;

            case '/my_profile':
                $arr=array("id"=>$_SESSION['u_id']);
                $run=$this->select_where1('customer',$arr);
                $fetch = $run->fetch_object();
            include_once('my_profile.php');
            break;

            case '/edit_profile':

                
            if (isset($_REQUEST['edit_customer'])) 
            {
                    $id = $_REQUEST['edit_customer'];
                    $where = array("id" => $id);
                    $res = $this->select_where1('customer', $where);
					$fetch = $res->fetch_object();
                        
                        if (isset($_REQUEST['save'])) 
                        {
                            
                            $name = $_REQUEST['name'];
                            $email = $_REQUEST['email'];
                            $mobile_no = $_REQUEST['mobile_no'];
                        
                            $data = array("name" => $name, "email" => $email,"mobile_no" => $mobile_no);

                            $res = $this->update('customer', $data, $where);
                            if ($res) {
                                echo "<script>
                                    alert('Profile Update Successfully!');
                                    window.location='my_profile';
                                </script>";
                            }
                        }
                }
            include_once('edit_profile.php');
            break;

            case '/product_detail':
                include_once('product_detail.php');
            break;

            
            case '/checkout':

                // Make sure user is logged in
                if (isset($_SESSION['u_id'])) {
                    $id = $_SESSION['u_id']; // logged-in customer id
                    $where = array("id" => $id);
                    $res = $this->select_where1('customer', $where);
                    $fetch = $res->fetch_object();

                    // If user edits their profile details in checkout, it automatic change in customer data
                    if (isset($_REQUEST['save'])) {
                        $name = $_REQUEST['name'];
                        $email = $_REQUEST['email'];
                        $mobile_no = $_REQUEST['mobile_no'];

                        $data = array(
                            "name"      => $name,
                            "email"     => $email,
                            "mobile_no" => $mobile_no
                        );

                        $res = $this->update('customer', $data, $where);
                        if ($res) {
                            echo "<script>
                                alert('Profile Updated Successfully!');
                                window.location='checkout';
                            </script>";
                        }
                    }
                } 
                else {
                    echo "<script> window.location='login'; </script>";
                    exit();
                }

                // Handle order submission
                if (isset($_REQUEST['submit'])) {
                    $name = $_REQUEST['name'];
                    $total_amount  = $_REQUEST['total_amount'];
                    $address       = $_REQUEST['address'];
                    $email       = $_REQUEST['email'];
                    $state         = $_REQUEST['state'];
                    $city          = $_REQUEST['city'];
                    $pincode       = $_REQUEST['pincode'];
                    //$payment_method = $_REQUEST['payment_method'];
                    $cart_id     = $_SESSION['cart_id'];

                    $data = array(
                        "customer_id"   => $_SESSION['u_id'],
                        "name" => $name,
                        "total_amount"  => $total_amount,
                        "email"  => $email,
                        "address"       => $address,
                        "state"         => $state,
                        "city"          => $city,
                        "pincode"       => $pincode,
                        "cart_id"       => $cart_id
                    );

                    $res = $this->insert('p_order', $data);
                    if ($res) {
                        echo "<script>
                            alert('Order placed successfully!');
                            window.location='thankyou';
                        </script>";
                    }
                }
    
            include_once('checkout.php');
            break;


                
            case '/thankyou':
                include_once('thankyou.php');
            break;
            
        }   
    }
}

$obj=new control;

?>