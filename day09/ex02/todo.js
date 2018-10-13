var id = 0;

function showCookie()
{
    var cook = document.cookie.split(';');
    cook.forEach(function(item){
        
        var newdiv = document.createElement("div");
        var maindiv = document.getElementById("ft_list");
        var t = document.createTextNode(item.split('=')[0]);
        newdiv.appendChild(t);
        newdiv.className = "item";
        newdiv.id = id;
        newdiv.setAttribute("onclick", "deleteMe(this)")
        id++;
        if (item === null)
            alert("Please add item");
        else
            maindiv.insertBefore(newdiv, maindiv.childNodes[0]);
        
    });
    
}

function newItem()
{
    var item = prompt("Enter new TO DO");
    var newdiv = document.createElement("div");
    var maindiv = document.getElementById("ft_list");
    var t = document.createTextNode(item);
    newdiv.appendChild(t);
    newdiv.className = "item";
    newdiv.id = id;
    newdiv.setAttribute("onclick", "deleteMe(this)")
    id++;
    if (item === null)
        alert("Please add item");
    else
        maindiv.insertBefore(newdiv, maindiv.childNodes[0]);
    document.getElementById("ft_list").value = "";
    setCookie(item, newdiv, 2);
}

function deleteMe(elem)
{
    var ans = confirm("Do Want to remove item?")
    if (ans)
    {
        var toGo = document.getElementById(elem.id);
        var d = new Date(); //Create an date object
        cname = toGo.textContent;
        d.setTime(d.getTime() - (1000*60*60*24)); //Set the time to the past. 1000 milliseonds = 1 second
        var expires = "expires=" + d.toGMTString(); //Compose the expirartion date
        window.document.cookie = cname+"="+"; "+expires;//Set the cookie with name and the expiration dat
        toGo.remove();
    }
}

function setCookie(cname, cvalue, day)
{
    var d = new Date();
    d.setTime(d.getTime() + (day * 24 * 60 * 60 * 1000));
    var ex = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + ex + ";path=~/Desktop/";
}

function getCookie(cname)
{
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++)
    {
        var c = ca[i];
        while (c.charAt(0) == ' ')
        {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
}

function checkCookie()
{
    var info = getCookie("item");
}