window.onload = function checkCookie()
{	
	var allcookies = document.cookie;
	if (allcookies)
	{
		cookiearray = allcookies.split(';');
   
	  	for(var i=0; i<cookiearray.length; i++){
	        name = cookiearray[i].split('=')[0];
	        value = cookiearray[i].split('=')[1];
	        //document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 UTC;';
	        ft_list = document.getElementById('ft_list');
		    var newDiv = document.createElement('div');
		    newDiv.value = newDiv.text = newDiv.name = value;
		    newDiv.innerHTML = value;
		    newDiv.onclick = function removeTodo()
		    {
				var ifDelete = confirm("Do you really want to delete this TO DO from your list?");
				if (ifDelete)
					this.parentElement.removeChild(this);
				document.cookie = this.name + '=; expires=Thu, 01 Jan 1970 00:00:01 UTC;';
			};
		    if (ft_list.firstChild)
		    	ft_list.insertBefore(newDiv, ft_list.firstChild);
		    else
		    	ft_list.insertBefore(newDiv, null);
	   }
	}
};

function newCreate()
{
	var cookie = [];
	var result = prompt("Enter your new TO DO item in the field below:", "");
	if (result)
	{
		ft_list = document.getElementById('ft_list');
	    var newDiv = document.createElement('div');
	    newDiv.value = newDiv.text = newDiv.name = result;
	    newDiv.innerHTML = result;
	    newDiv.onclick = function removeTodo()
	    {
			var ifDelete = confirm("Do you really want to delete this TO DO from your list?");
			if (ifDelete)
				this.parentElement.removeChild(this);
			document.cookie = this.name + '=; expires=Thu, 01 Jan 1970 00:00:01 UTC;';
		};
	    if (ft_list.firstChild)
	    	ft_list.insertBefore(newDiv, ft_list.firstChild);
	    else
	    	ft_list.insertBefore(newDiv, null);
	    document.cookie = result + "=" + result + ";";
		}
};
