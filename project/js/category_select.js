function fetch_cat1(str) {
	
			
		var req=new XMLHttpRequest();
		req.open("get","http://localhost/project/php_file/select_query.php?category_1="+str,true);
		req.send();
		req.onreadystatechange=function(){

			if(req.readyState==4 && req.status==200)
			{ 
				
				document.getElementById("2nd_cat").innerHTML=req.responseText;

			}
		};

}

function fetch_cat2(str,str1 ) {

		var req=new XMLHttpRequest();
		req.open("get","http://localhost/project/php_file/select_query.php?category_2="+str+"&category_1="+str1,true);
		req.send();
		req.onreadystatechange=function(){

			if(req.readyState==4 && req.status==200)
			{
				
					document.getElementById("3th_cat").innerHTML=req.responseText;

					if(str=="shoes")
					document.getElementById("size").innerHTML="<option value=\"0\">SIZE</option><option value=\"6\">6</option><option value=\"7\">7</option><option value=\"8\">8</option><option value=\"9\">9</option><option value=\"10\">10</option><option value=\"11\">11</option>";
					else
					document.getElementById("size").innerHTML="<option value=\"XS\">XS</option><option value=\"S\">S</option><option value=\"M\">M</option><option value=\"L\">L</option><option value=\"XL\">XL</option><option value=\"XXL\">XXL</option>";
					
			}
		};

}



// homepage.php?fname=kya+&mno=90123&cname=nitk&sub=I+am+Your+Friend
/*function set_att(str1)
{		if(str1=='1')
	{	
	document.getElementById("sign_up_form").action="salerdetail.php";
	document.getElementById("check1").value="0";

	}
	else
	{
	document.getElementById("sign_up_form").action="index.php";
	document.getElementById("check1").value="1";

	}


}*/
// homepage.php?fname=kya+&mno=90123&cname=nitk&sub=I+am+Your+Friend