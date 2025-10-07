function reg_form(str) 
{
    
    if (str.uname.value == "") // document.getElementById("uname").value;
    {
        document.getElementById("msg1").innerHTML = "! Please enter Some Value in User Name";
        str.uname.focus();
        return false;
    }

    /*
    pattern
	
    match(/^[a-zA-Z]+$/)  For ALPHA 
    match(/^[0-9]+$/)  For NUMBER 
	
    match(/^[0-9]{8,12}$/)   NUMBER + MIN & MAX
    match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,3})+$/)) For Email	
    */

    if (!str.uname.value.match(/^[a-zA-Z]{1,}$/)) //Pattern for Name
    {
        document.getElementById("msg1").innerHTML = "! Please enter Only Character Value";
        str.uname.focus();
        return false;
    }

    if (str.pass.value == "") 
    {
        document.getElementById("msg1").innerHTML = "! Please enter Some Value in Password";
        str.pass.focus();
        return false;
    }


    if (str.pass.value.length < 8 || str.pass.value.length > 12) //Min and Max length for password
    {
        document.getElementById("msg1").innerHTML = "! Please enter between 8 to 12 digit length";
        str.pass.focus();
        return false;
    }

    if (str.cpass.value == "") 
    {
        document.getElementById("msg1").innerHTML = "! Please enter Some Value in Confirm Password";
        str.cpass.focus();
        return false;
    }

    if (str.pass.value != str.cpass.value) 
    {
        document.getElementById("msg1").innerHTML = "! Please enter same Value in Confirm Password";
        str.cpass.focus();
        return false;
    }

    if (str.email.value == "") 
    {
        document.getElementById("msg1").innerHTML = "! Please enter Some Value in Email";
        str.email.focus();
        return false;
    }

    if (!str.email.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,3})+$/)) //Pattern for Email
    {
        document.getElementById("msg1").innerHTML = "! Please enter Correct Email Address";
        str.email.focus();
        return false;
    }

    var gen_arr = document.getElementsByName("gender"); //In Redio Button it get by NAME not by ID
    if (gen_arr[0].checked == true) 
    {

    }
    else if (gen_arr[1].checked == true)
    {

    }
    else 
    {
        document.getElementById("msg1").innerHTML = "! Please Select Gender";
        return false;
    }



    var chk_arr = document.getElementsByName("chk"); //In Check-Box it get by NAME not by ID
    if (chk_arr[0].checked == true) 
    {

    }
    else if (chk_arr[1].checked == true) 
    {

    }
    else if (chk_arr[2].checked == true) 
    {

    }
    else if (chk_arr[3].checked == true) 
    {

    }
    else 
    {
        document.getElementById("msg1").innerHTML = "! Please Select any one Hobby ";
        return false;
    }


    if (str.country.value == "") 
    {
        document.getElementById("msg1").innerHTML = "! Please Select Some Value in Country";
        str.country.focus();
        return false;
    }

    if (str.edu.value == "") 
    {
        document.getElementById("msg1").innerHTML = "! Please Select Some Value in Education";
        str.edu.focus();
        return false;
    }

    if (str.address.value == "") 
    {
        document.getElementById("msg1").innerHTML = "! Please Enter Some Value in Address";
        str.address.focus();
        return false;
    }


    if (str.photo.value == "") 
    {
        document.getElementById("msg1").innerHTML = "! Please Upload Photo";
        str.photo.focus();
        return false;
    }

    var image = document.getElementById("photo"); //For Photo Size Limit
    // size/(1024*1024)
    var img_size_mb = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);

    if (img_size_mb > 0.05) 
    {
        document.getElementById("msg1").innerHTML = "! Please select image size less than 2 MB ";
        str.photo.focus();
        return false;
    }


    if (str.resume.value == "")
    {
        document.getElementById("msg1").innerHTML = "! Please Upload Your Resume";
        str.resume.focus();
        return false;
    }

    var resume = document.getElementById("resume");  //For Resume Size Limit
    var resume_size_mb = parseFloat(resume.files[0].size / (1024 * 1024)).toFixed(2);
    if (resume_size_mb > 2) 
    {
        document.getElementById("msg1").innerHTML = "! Please select resume size less than 2 MB ";
        str.resume.focus();
        return false;
    }


    if (str.dob.value == "") 
    {
        document.getElementById("msg1").innerHTML = "! Please Select Date in Date of Birth";
        str.dob.focus();
        return false;
    }
}


function check(file)  //This function is for image validation
{

    var filename = file.value;
    var ext = filename.substring(filename.lastIndexOf('.') + 1); // get ext from file name

    if (ext == "jpg" || ext == "png" || ext == "jpeg" || ext == "gif" || ext == "JPG" ||ext == "PNG" || ext == "JPEG" || ext == "GIF") 
    {
        document.getElementById("msg1").innerHTML = "";
        document.getElementById("submit").disabled = false;
    }
    else 
    {
        document.getElementById("msg1").innerHTML = "! Please upload only JPG , GIF , JPEG File";
        document.getElementById("submit").disabled = true;
    }
}

function check1(file) //This function is for PDF validation
{

    var filename = file.value;
    var ext = filename.substring(filename.lastIndexOf('.') + 1); // get ext from file name

    if (ext == "pdf" || ext == "PDF") 
    {
        document.getElementById("msg1").innerHTML = "";
        document.getElementById("submit").disabled = false;
    }
    else 
    {
        document.getElementById("msg1").innerHTML = "! Please upload only PDF File";
        document.getElementById("submit").disabled = true;
    }
} 
