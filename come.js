//finding the username element and storing it
var username=document.getElementsByTagName('span')[0].innerText;
console.log(username);

//finding the topic
var topic=document.getElementById("imp").innerText;

var form=document.getElementById('commen');
console.log(form);

var value,head,first,second;
head=document.getElementById('comments');

//adding the post option to the comments
form.addEventListener('submit',function(e)
{
    e.preventDefault();
    value= form.getElementsByTagName('input')[0].value;
    first=document.createElement('div');
    second=document.createElement('p');
    second.innerText=username;
    first.appendChild(second);
    second=document.createElement('p');
    second.innerText=value;
    first.appendChild(second);
    head.appendChild(first);

    //sending the comment into the database
    var xhttp= new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
        {
            console.log(this.responseText);
        }
    }
    xhttp.open("GET","commentadd.php?topic="+topic+"&message="+value+"&name="+username);
    xhttp.send();
})