var fnameID = document.getElementById('txtFName');
var lnameID = document.getElementById('txtLName');
var addressID = document.getElementById('txtAddress');
var cityID = document.getElementById('ddlCityName');
var cnicID = document.getElementById('txtCNIC');
var mobileID = document.getElementById('txtMobileNumber');

function myFunction()
{
	let fname = document.getElementsByName('txtFName')[0].value;
	let lname = document.getElementsByName('txtLName')[0].value;
	let email = document.getElementsByName('txtEmail')[0].value;
	let address = document.getElementsByName('txtAddress')[0].value;	
	if(fname == "")
	{
		alert("First Name Field must be filled");
		document.myForm.txtFName.focus();
		return false;
	}
	if(lname == "")
	{
		alert("Last Name Field must be filled");
		document.myForm.txtLName.focus();
		return false;
	}
	if(email == "")
	{
		alert("Email Field must be filled");
		document.myForm.txtEmail.focus();
		return false;
	}
	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
	{
		alert("You have entered an invalid email address!");
		return false;
	}
	if(address == "")
	{
		alert("Address Field must be filled");
		document.myForm.txtAddress.focus();
		return false;
	}
	if(city == 0)
	{
		alert("City Name Field must be filled");
		document.myForm.ddlCityName.focus();
		return false;
	}

 	ValidateDOB();
}
function ValidateDOB() 
{	
	var dateString = document.getElementById("txtDOB").value;
	var regex = /(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/;
	//Check whether valid dd/MM/yyyy Date Format.
	if (regex.test(dateString)) 
	{
		var parts = dateString.split("/");
		var dtDOB = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
		var dtCurrent = new Date();
		if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) 
		{
			alert("(Eligibility 18 years ONLY.)");
			return false;
		}
		if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 18) 
		{
			//CD: 11/06/2018 and DB: 15/07/2000. Will turned 18 on 15/07/2018.
			if (dtCurrent.getMonth() < dtDOB.getMonth()) 
			{
				alert("(Eligibility 18 years ONLY.)");
				return false;
			}
			if (dtCurrent.getMonth() == dtDOB.getMonth()) 
			{
				//CD: 11/06/2018 and DB: 15/06/2000. Will turned 18 on 15/06/2018.
				if (dtCurrent.getDate() < dtDOB.getDate()) 
				{
					alert("(Eligibility 18 years ONLY.)");
					return false;
				}
			}
		}
	} else {
		alert("(Enter date in dd/MM/yyyy format ONLY.)");
		return false;
	}
}
function mobileDigitValidation()
{
	var ValidLen = 11;
	let mobile = document.getElementsByName('txtMobileNumber')[0].value;
	let mobileStr = mobile.toString();
	if(mobileStr.substring(0,1) == "+")
	{
		ValidLen = 13;
		if((mobileStr.substring(1,4) != "923"))
		{
			alert("-->Its Wrong Number. Follow this Pattern (+923015100135) ");
		}
	}
	elseif(mobileStr.substring(0,1)=="0")
	{
		if(mobileStr.substring(1,2)=="0")
		{
			ValidLen = 14;
			if(mobileStr.substring(2,5)!="923")
			{
			alert("-->Its Wrong Number. Follow this Pattern (00923015100135) ");
			}
		}
		else
		{
			if(mobileStr.substring(1,2)!="3")
			{
			alert("-->Its Wrong Number. Follow this Pattern (03015100135) ");
			}
		}
	}
	if (mobileStr.length != ValidLen)
	{

	}
}

function genderValidation()
{
    var radios = document.getElementsByName('rdoGender');
    for (var radio of radios)
    {
        if (radio.checked) {
            return radio.value;
        }
    }
    
}
function cnicValidation()
{
	let cnicValue = document.getElementsByName('txtCNIC')[0].value;
	let cnicStr = cnicValue.toString();
	let cnicSubStr = cnicStr.substring(14,15);
	if(cnicSubStr % 2 == 0){
        return "2";
    }
    else
    {
        return "1";
    }
}

function compareValues(){
	let cnicValue = document.getElementsByName('txtCNIC')[0].value;
	let genderRValue = genderValidation();
	let cnicRValue =  cnicValidation();
	if(genderRValue!=cnicRValue)
	{
		alert("Your Gender is not matching with you CNIC");
	}
}

fnameID.addEventListener('keypress',
	function()
	{
		fnameID.style.backgroundColor = "";
		var x = fnameID.value;
		var $regex  = /(\w)\1{2,}/;
		if($regex.test(x))
		{
			fnameID.style.backgroundColor = "red";
			alert("Inavlid Character:" + x);
		}
	}
);
lnameID.addEventListener('keypress',
	function()
	{
		lnameID.style.backgroundColor = "";
		var x = lnameID.value;
		var $regex  = /(\w)\1{2,}/;
		if($regex.test(x))
		{
			lnameID.style.backgroundColor = "red";
			alert("Inavlid Character:" + x);
		}
	}
);
addressID.addEventListener('keypress',
	function()
	{
		addressID.style.backgroundColor = "";
		var x = addressID.value;
		var $regex  = /(\w)\1{2,}/;
		if($regex.test(x))
		{
			addressID.style.backgroundColor = "red";
			alert("Inavlid Character:" + x);
		}
	}
);
cnicID.addEventListener('keypress',
	function()
	{
		var first_part = cnicID.value;
		var hyphen = "-";
		if(first_part.substring(0,1) != "0")
		{
			if(first_part.length == 5)
			{
				var second_part = first_part.concat(hyphen);
				cnicID.value = second_part;
			}
		if(first_part.length == 13)
		{
			var third_part = first_part.concat(hyphen);
			cnicID.value = third_part;
		}
		}
		else
		{
			alert("CNIC number cant be start with 0");
		}
	}
);




