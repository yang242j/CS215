//login

function SignUpForm(){ 
    var result = true;
	var a = document.forms.SignUp.email.value;

    var c = document.forms.SignUp.pswd.value;


	
       
    var email_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
	
	var pswd_v = /^(\S*)?\d+(\S*)?$/;
	

    document.getElementById("email_msg").innerHTML ="";

	document.getElementById("pswd_msg").innerHTML ="";
	 

	
	

	if (a==null || a =="" || email_v.test(a) == false){
			
		document.getElementById("email_msg").innerHTML="Email address empty or wrong format. example: username@somewhere.sth";
		result = false;
		}
	

	if (c==null || c=="" || c>8 ||pswd_v.test(c) == false){  
	    document.getElementById("pswd_msg").innerHTML="Please enter the Password correctly. (8 characters or longer, no spaces)";
	    result = false;
    }
			
     // User Information is displayed on the bottom if correct information is entered.		
     if (result == true)
     {	
       document.getElementById("display_info").innerHTML="Email: " +a+"<br>"+"Password: " +c+"<br>";
	


      document.getElementById("SignUp").reset();	
     }

    															
}

function ResetSForm(){ 
   document.getElementById("email_msg").innerHTML ="";
	 

	document.getElementById("pswd_msg").innerHTML ="";


	
}

//Registration

function RegistrationForm(event){ 



    var elements = event.currentTarget;


      
    var a = elements[0].value;
    var b = elements[1].value;
    var c = elements[2].value;
    var d = elements[3].value;
    var e = elements[4].value;
    var f = elements[5].value;

    var result = true;    
        
  

    var email_v = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    var first_v = /^[a-zA-Z0-9_-]+$/;
    var last_v = /^[a-zA-Z0-9_-]+$/;
    var pswd_v = /^(\S*)?\d+(\S*)?$/;
    var birth_v = /^(0[1-9]|[12][0-9]|3[01])[\- \/.](?:(0[1-9]|1[012])[\- \/.](19|20)[0-9]{2})$/;
   
    document.getElementById("email_msg").innerHTML ="";
    document.getElementById("first_msg").innerHTML ="";
    document.getElementById("last_msg").innerHTML ="";
    document.getElementById("pswd_msg").innerHTML ="";
    document.getElementById("pswdr_msg").innerHTML ="";
    document.getElementById("birth_msg").innerHTML ="";
  
    
 

    if (a==null || a==""||!email_v.test(a))
        {	   
	   document.getElementById("email_msg").innerHTML="Enter the correct email adress(example: cs215@uregina.ca)";
           result = false;
        }

	

 if (b==null || b==""||!first_v.test(b))
    {	   
   document.getElementById("first_msg").innerHTML="first name should have no no leading or trailing spaces";
       result = false;
    }

 if (c==null || c==""||!last_v.test(c))
 {	   
document.getElementById("last_msg").innerHTML="last name should have no leading or trailing spaces";
    result = false;
 }



        
    if (d==null || d==""||!pswd_v(d)||d.length !=8 )
    {	   
   document.getElementById("pswd_msg").innerHTML="8 characters long at least one non-letter";
       result = false;
    }

    if (e==null || e==""|| e != d)
    {	   
   document.getElementById("pswdr_msg").innerHTML="Confirm password can not match the password";
       result = false;
    }


    if (f==null || f==""||!birth_v.test(f)||f.length !=10 )
    {	   
    document.getElementById("birth_msg").innerHTML="Please use Proper Formate: mm/dd/yyyy";
       result = false;
    }

 


    
    //prevent form to be submitted if one of above field is invalid		
    if(result == false )
        {    
            event.preventDefault();
        }
}

function ResetRForm(){ 
    document.getElementById("email_msg").innerHTML ="";
    document.getElementById("first_msg").innerHTML ="";
    document.getElementById("last_msg").innerHTML ="";
    document.getElementById("pswd_msg").innerHTML ="";
    document.getElementById("pswdr_msg").innerHTML ="";
    document.getElementById("birth_msg").innerHTML ="";
  


		
	}

// profile page

function RemoveFromWish(event) {
    alert ("Item is already Removed From Wish List !")
}

// administrator page
//add Category
function AddCateForm(){ 
    var result = true;
	var a = document.forms.SaveCate.EnterCate.value;



    document.getElementById("EnterCate_msg").innerHTML ="";

	 

	
	

	if (a==null || a =="" ){
			
		document.getElementById("EnterCate_msg").innerHTML="You should add somthing!";
		result = false;
		}
	
    															
}

//Remove category
function RemoveCate(event) {
    alert ("This Category is removed!")
}

//add new product
function NewProductForm(event){ 

    var elements = event.currentTarget;

      
    var a = elements[0].value;
    var b = elements[1].value;
    var c = elements[2].value;
    var d = elements[3].value;
    var e = elements[4].value;
    var f = elements[5].value;
    var g = elements[6].value;
    
    
    
    var result = true;    
        

    var title_v = /^[a-zA-Z0-9_-]+$/; 

    var description_v = /^(1[012]|0?[1-9])$/;
    var Image_v = /^[a-zA-Z0-9_-]+$/; 
   
    document.getElementById("title_msg").innerHTML ="";
    document.getElementById("price_msg").innerHTML ="";
    document.getElementById("quantity_msg").innerHTML ="";
    document.getElementById("description_msg").innerHTML ="";
    document.getElementById("Image_msg").innerHTML ="";
    
    if (b==null || b==""||!title_v.test(b))
        {	   
	   document.getElementById("title_msg").innerHTML="Should not be any leading or trailing spaces";
           result = false;
        }



 


    if(result == false )
        {    
            event.preventDefault();
        }
    else{
    	alert("New Product Added!")
    }
}

//Product page

//add item to wish list
function ScarToWish(event) {
    alert ("Item Scar-L is already added to Wish List !")
}

function M16ToWish(event) {
    alert ("Item M16A4 is already added to Wish List !")
}

function AugToWish(event) {
    alert ("Item Aug is already added to Wish List !")
}

function QBZToWish(event) {
    alert ("Item QBZ-95 is already added to Wish List !")
}

function GrozaToWish(event) {
    alert ("Item Groza is already added to Wish List !")
}

function AWMToWish(event) {
    alert ("Item AWM is already added to Wish List !")
}

function VSSToWish(event) {
    alert ("Item VSS is already added to Wish List !")
}

function Mini14ToWish(event) {
    alert ("Item Mini14 is already added to Wish List !")
}

function TommyToWish(event) {
    alert ("Item Tommy gun is already added to Wish List !")
}

function UZIToWish(event) {
    alert ("Item UZI is already added to Wish List !")
}

function VectorToWish(event) {
    alert ("Item Vector is already added to Wish List !")
}

function P1911ToWish(event) {
    alert ("Item P1911 is already added to Wish List !")
}

//Cart Page
//When the user changes the quantity, the system should get the price of the product and update the total and the taxes


document.body.addEventListener("load", init(), false);

function init() {
    bindInputs();
    let total;

    //if it is in the cart page, calculate the total
    if (total = document.getElementById("total")) {
        calcTotal();
    }
}

//here you will add all the addEventListeners for all inputs, so, you need first to check if it exist
function bindInputs() {
    let a, b, c, d, e, f, g, h;


    //for product quantity, first, get all inputs
    if (b = document.getElementsByClassName("quantity")) {
        //now, add the event for each input
        //need to convert the HTML Array none in Array
        Array.prototype.forEach.call(b, item => {
            item.addEventListener("change", checkQuantity);
        });
    }
    //for the remove button
    if (c = document.querySelectorAll("div.product button")) {
        //now, add the event for each button
        //need to convert the HTML Array none in Array
        Array.prototype.forEach.call(c, item => {
            item.addEventListener("click", function (ev) {
                var id = ev.currentTarget.getAttributeNode("data-id").value;
                alert("Removed item " + id);

            });
        });
    }

    //keep goinh for other input or forms

}


function checkQuantity(ev){
    let el = ev.currentTarget.value;
    if (el < 0 || el > 99){
        alert ("You have informed a incorrect amount");
        ev.currentTarget.value = 0;
    } else {
        calcTotal();
    }
}

function calcTotal() {
    let totalDiv = document.getElementById("total");
    let allPricesArray = document.getElementsByClassName("price");
    let q = document.getElementsByClassName("quantity");
    let allPrices = 0;

    //need to convert the HTML Array none in Array
    Array.prototype.forEach.call(allPricesArray, (item, i) => {
        allPrices += (parseFloat(item.innerText.replace("$", "")))*parseInt(q[i].value);
    });
    
    let gst = allPrices * 0.05;
    let pst = allPrices * 0.06;

    let total = allPrices+gst+pst;
  
    let html = "<table class=\"table table-striped table-sm\"><tbody><tr><th>Sub-Total</th><th>$"+allPrices.toFixed(2)+"</th></tr>";
    html += "<tr><td>GST</td><td>$"+gst.toFixed(2)+"</td></tr>";
    html += "<tr><td>PST SK</td><td>$"+pst.toFixed(2)+"</td></tr>";

    html += "<tr><th>Total</th><th>$"+total.toFixed(2)+"</th></tr>";
   // html += "</tbody></table>";
    
    totalDiv.innerHTML = html;
}


//remove buttom

function RemoveScar(event) {
    alert ("Item Scar-L is already Removed From Wish List !")
}
function RemoveAWM(event) {
    alert ("Item AWM is already Removed From Wish List !")
}
function RemoveMini(event) {
    alert ("Item Mini14 is already Removed From Wish List !")
}
function RemoveVector(event) {
    alert ("Item Vector is already Removed From Wish List !")
}
function RemoveP1911(event) {
    alert ("Item P1911 is already Removed From Wish List !")
}


document.getElementById("Remove").addEventListener("click", myFunction);

document.getElementById("Registration").addEventListener("submit", RegistrationForm, false);
document.getElementById("Registration").addEventListener("reset", ResetRForm, false);
//add code here to call addEventListener for ResetForm() function

document.getElementById("SignUp").addEventListener("submit", SignUpForm, false);
document.getElementById("SignUp").addEventListener("reset", ResetSForm, false);