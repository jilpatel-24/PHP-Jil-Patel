<?php
class model
{

    public $conn="";

    function __construct()
    {
                          
       $this->conn=new mysqli('localhost','root','','cafe');//hostname, username, password, database name
    }



    function select($tbl)
    {        
    $sel="select * from $tbl";   // query  in this remove echo
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }

    function insert($tbl,$arr) //Insert Function
    {
        
        $col_arr=array_keys($arr);  // array('0'=>"cate_name",'1'=>"cate_image");
        $col=implode(",",$col_arr); //convert from array to string

        $value_arr=array_values($arr);  // array('0'=>"value",'1'=>"value.jpg");
        $value=implode("','",$value_arr); //convert from array to string
 
        $ins="insert into $tbl ($col) values ('$value')";   // insert into query
        $run=$this->conn->query($ins);   // query run
        return $run;

    }



     //double table Select Function
    function double_select($tbl1,$tbl2,$col,$on)
    {
        // select * from categories join products on categories.id=product.cate_id
    echo $sel="select $tbl1.*,$tbl2.$col from $tbl1 join $tbl2 on $on";   // query run
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }


    

    function select_orderby($tbl,$col) //order by quary 1st table name 2nd column name
    {
    echo $sel="select * from $tbl ORDER BY $col";   // query
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }

    function select_decending($tbl,$col) //order by quary but desending order
    {
    echo $sel="select * from $tbl ORDER By $col desc";   // query
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }




    public function select_where($table, $where) // Function to select records from a table with given conditions
    {
        $sql = "SELECT * FROM $table WHERE ";
        $conditions = [];

        foreach ($where as $key => $value) 
        {
            $conditions[] = "$key = '$value'"; // Append each condition in the form: column = 'value'
        }

        $sql .= implode(" AND ", $conditions);  // Combine all conditions using 'AND' to complete the WHERE clause
        $result = $this->conn->query($sql);

        $data = [];   // Initialize an array to hold the resulting data
        while ($row = $result->fetch_object()) // Fetch each result row as an object and add it to the data array
        {
            $data[] = $row; 
        }

        return $data; // Return the array of result objects
    }

    function select_where1($tbl,$arr)
    {
        $sel="select * from $tbl where 1=1";  // query continue
        $col_arr = array_keys($arr); // array(0=>"email",1=>"password")
        $value_arr = array_values($arr);
        $i=0;
        foreach($arr as $c)
        {
           $sel.=" and $col_arr[$i]='$value_arr[$i]'";
           $i++;
        }
        $run = $this->conn->query($sel);   // query run
        return $run;
        
        //$chk=$run->num_rows;  // only for login 

        /*
        while ($fetch = $run->fetch_object()) {   // only for data fetch
            $arr[] = $fetch;
        }
        */ 
        
    }


    function getCategories() //for aytomatically add catagory and in product only for get catagory
    {
        $query = "SELECT id, name FROM category";
        $result = mysqli_query($this->conn, $query); // assuming $this->conn is your DB connection

        $categories = [];
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $categories[] = $row;
        }
        return $categories;
    }

    function delete_where($tbl,$arr) //for delete
    {
        $sel="delete from $tbl where 1=1";  // query continue
        $col_arr = array_keys($arr); // array(0=>"email",1=>"password")
        $value_arr = array_values($arr);
        $i=0;
        foreach($arr as $c)
        {
           $sel.=" and $col_arr[$i]='$value_arr[$i]'";
           $i++;
        }
        $run = $this->conn->query($sel);   // query run
        return $run;
    }


    function update($tbl, $arr, $where)  //update function
    {
        $col_arr = array_keys($arr);  // array('0'=>"cate_name",'1'=>"cate_image");    
        $value_arr = array_values($arr);  // array('0'=>"kids",'1'=>"kids.jpg");
   
        // update customer set name='',email='' where id=5
		$upd = "update $tbl set";   // query
		$j=0;
		
		$count=count($arr);
		foreach($arr as $data)
		{
			if($count==$j+1)
			{
				$upd.=" $col_arr[$j]='$value_arr[$j]'";
			}
			else
			{
				$upd.=" $col_arr[$j]='$value_arr[$j]',";
				$j++;
			}	
		}
		
		$upd.=" where 1=1";
		
		$wcol_arr = array_keys($where);
        $wvalue_arr = array_values($where);
        $i=0;
        foreach($where as $c)
        {
           $upd.=" and $wcol_arr[$i]='$wvalue_arr[$i]'";
           $i++;
        }
        $run = $this->conn->query($upd);   // query run
        return $run;
    }



}

$obj=new model;
?>