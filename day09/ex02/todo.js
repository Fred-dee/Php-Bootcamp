var id = 0;

function showCookie()
{
    var cook = getCookie(item);

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
        maindiv.insertBefore(newdiv, maindiv.childNodes[4]);
    document.getElementById("ft_list").value = "";
    setCookie(item, newdiv, 2);
}

function deleteMe(elem)
{
    var ans = confirm("Do Want to remove item?")
    if (ans)
    {
        var toGo = document.getElementById(elem.id);
        toGo.remove();
    }
}

function setCookie(cname, cvalue, day)
{
    var d = new Date();
    d.setTime(d.getTime() + (day * 24 * 60 * 60 * 1000));
    var ex = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + ex + ";path=/";
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