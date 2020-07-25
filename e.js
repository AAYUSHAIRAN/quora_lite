console.log("54 ayush");
//selecting the elements
var a= document.getElementById('add');
var b= document.getElementById('form1');

//add topics option
a.onclick = function(){
    b.style.display="initial";
};

//submit and creation of the topics in the main file
var topic,subject,clone,head;
head=document.getElementsByClassName("topics")[0];
b.onsubmit=function(e){
    var top;
    e.preventDefault();
    topic=b.getElementsByTagName('textarea')[0].value;
    subject=b.getElementsByTagName('textarea')[1].value;
        //connecting to the database and updating it
        var xhttp= new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200)
            {
                console.log(this.responseText);
            }
        }
        xhttp.open("GET","topicadd.php?topic="+topic+"&subject="+subject);
        xhttp.send();

    clone= document.createElement('ul');
    top=document.createElement('li');
    top.innerText=topic;
    clone.appendChild(top);
    top=document.createElement('li');
    top.innerText=subject;
    clone.appendChild(top);

    //setting of the operations
    var fafa= document.createElement('li');

    //upvote operation
    var faf= document.createElement("button");
    var i= document.createElement('i');
    i.className="fa fa-thumbs-o-up fa-lg";
    i.setAttribute("aria-hidden","true");
    i.innerText="0";
    faf.appendChild(i);
    fafa.appendChild(faf);

    //downvote operation
    faf= document.createElement("button");
    i= document.createElement('i');
    i.className="fa fa-thumbs-o-down fa-lg";
    i.setAttribute("aria-hidden","true");
    i.innerText="0";
    faf.appendChild(i);
    fafa.appendChild(faf);

    //comment operation
    faf= document.createElement("button");
    i=document.createElement('a');
    i.setAttribute("href","comments.php?topic="+topic+"&subject="+subject);    
    var t= document.createElement('i');
    t.className="fa fa-comment-o fa-lg";
    t.setAttribute("aria-hidden","true");
    i.appendChild(t);
    faf.appendChild(i);
    fafa.appendChild(faf);

    var position= document.getElementsByTagName('span')[1].innerText;

    if(position=='admin')
    {    
        //edit operation
        faf= document.createElement("button");
        i= document.createElement('i');
        i.className="fa fa-pencil fa-lg";
        i.setAttribute("aria-hidden","true");
        faf.appendChild(i);
        fafa.appendChild(faf);

        //delete operation
        faf= document.createElement("button");
        i= document.createElement('i');
        i.className="fa fa-trash-o fa-lg";
        i.setAttribute("aria-hidden","true");
        faf.appendChild(i);
        fafa.appendChild(faf);
        console.log(fafa);
    }
    clone.appendChild(fafa);
    head.appendChild(clone);
    b.style.display="none";
};


//back option to hide up the form
b.getElementsByTagName('a')[0].onclick=function(e){
    e.preventDefault();
    b.style.display="none";
};


//back option to hide up the form
var m;
m= document.getElementById("edit");
m.getElementsByTagName('a')[0].onclick=function(e)
{
    e.preventDefault();
    m.style.display="none";
};

var x,y;
//to perform different operations-edit,delete,upvote,dowmvote,comments
head.onclick=function(e){

    var top, sub,link;
    x=e.target;
    //delete option
    if(x.className=="fa fa-trash-o fa-lg")
    {
        x=x.parentNode;
        x=x.parentNode;
        x=x.parentNode;
        y=x.parentNode;
        y.removeChild(x);
        top= x.getElementsByTagName('li')[0].innerText;
        var xhttp= new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200)
            {
                console.log(this.responseText);
            }
        }
        xhttp.open("GET","topicdel.php?topic="+top);
        xhttp.send();
    }

    //edit option
    if(x.className=="fa fa-pencil fa-lg")
    {
        m.style.display="initial";
        m.onsubmit= function(e){
            e.preventDefault();
            n=x.parentNode;
            n=n.parentNode;
            link=n.getElementsByTagName('button')[2];
            link=link.getElementsByTagName('a')[0];
            n=n.parentNode;
            top=n.getElementsByTagName('li')[0].innerText;
            n=n.getElementsByTagName('li')[1];
            sub=m.getElementsByTagName('textarea')[0].value;
            n.innerText= sub;
            m.style.display="none";
            //editing the link
            link.setAttribute("href","comments.php?topic="+top+"&subject="+sub);
            console.log(link);
            //connecting to the database and updating it
            var xhttp= new XMLHttpRequest();
            xhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200)
                {
                    console.log(this.responseText);
                }
            }
            xhttp.open("GET","topicedit.php?topic="+top+"&subject="+sub);
            xhttp.send();
                        
        };
    }

    var name= document.getElementsByTagName('span')[0].innerText;
    console.log(name);
    var topi;
    //upvote option
    if(x.className=="fa fa-thumbs-o-up fa-lg vote" || x.className=="fa fa-thumbs-o-up fa-lg")
    {
        topi=x.parentNode;
        topi= topi.parentNode;
        topi=topi.parentNode;
        topi=topi.getElementsByTagName('li')[0].innerText;
        console.log(topi);
        if(x.className=="fa fa-thumbs-o-up fa-lg vote")
        {
            x.className="fa fa-thumbs-o-up fa-lg"
            x.innerText= Number(x.innerText) -1;
            //deleting the data in the database and updating the same in the main
            var xhttp= new XMLHttpRequest();
            xhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200)
                {
                    console.log(this.responseText);
                }
            }
            xhttp.open("GET","voteupvote.php?topic="+topi+"&name="+name+"&upvote=-1");
            xhttp.send();
        }

        else if(x.className=="fa fa-thumbs-o-up fa-lg")
        {
            y=x.parentNode;
            y=y.parentNode;
            y=y.getElementsByTagName('button')[1];
            y=y.getElementsByTagName('i')[0];
            if(y.className=='fa fa-thumbs-o-down fa-lg vote')
            {
                y.className="fa fa-thumbs-o-down fa-lg";
                y.innerText= Number(y.innerText) -1;
                x.className="fa fa-thumbs-o-up fa-lg vote";
                x.innerText= Number(x.innerText) + 1;
                //changing the value of vote in the database and updating the same in the main database
                var xhttp= new XMLHttpRequest();
                xhttp.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200)
                    {
                        console.log(this.responseText);
                    }
                }
                xhttp.open("GET","upvote.php?topic="+topi+"&name="+name);
                xhttp.send();
            }
            else
            {
                x.className="fa fa-thumbs-o-up fa-lg vote";
                x.innerText= Number(x.innerText) + 1;
                //updating this in the database and in the main database simultaneously
                var xhttp= new XMLHttpRequest();
                xhttp.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200)
                    {
                        console.log(this.responseText);
                    }
                }
                xhttp.open("GET","voteupvote.php?topic="+topi+"&name="+name+"&upvote=1");
                xhttp.send();
            }
        }
    }


    //downvote option
    if(x.className=="fa fa-thumbs-o-down fa-lg vote" || x.className=="fa fa-thumbs-o-down fa-lg")
    {
        topi=x.parentNode;
        topi= topi.parentNode;
        topi=topi.parentNode;
        topi=topi.getElementsByTagName('li')[0].innerText;
        console.log(topi);
        if(x.className=="fa fa-thumbs-o-down fa-lg vote")
        {
            x.className="fa fa-thumbs-o-up fa-lg"
            x.innerText= Number(x.innerText) -1;
            //deleting the data in the database and updating the same in the main
            var xhttp= new XMLHttpRequest();
            xhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200)
                {
                    console.log(this.responseText);
                }
            }
            xhttp.open("GET","votedownvote.php?topic="+topi+"&name="+name+"&downvote=-1");
            xhttp.send();
        }

        else if(x.className=="fa fa-thumbs-o-down fa-lg")
        {
            y=x.parentNode;
            y=y.parentNode;
            y=y.getElementsByTagName('button')[0];
            y=y.getElementsByTagName('i')[0];
            if(y.className=='fa fa-thumbs-o-up fa-lg vote')
            {
                y.className="fa fa-thumbs-o-up fa-lg";
                y.innerText= Number(y.innerText) -1;
                x.className="fa fa-thumbs-o-down fa-lg vote";
                x.innerText= Number(x.innerText) + 1;
                //changing the value of vote in the database and updating the same in the main database
                var xhttp= new XMLHttpRequest();
                xhttp.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200)
                    {
                        console.log(this.responseText);
                    }
                }
                xhttp.open("GET","downvote.php?topic="+topi+"&name="+name);
                xhttp.send();
            }
            else
            {
                x.className="fa fa-thumbs-o-down fa-lg vote";
                x.innerText= Number(x.innerText) + 1;
                //updating this in the database and in the main database simultaneously
                var xhttp= new XMLHttpRequest();
                xhttp.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200)
                    {
                        console.log(this.responseText);
                    }
                }
                xhttp.open("GET","votedownvote.php?topic="+topi+"&name="+name+"&downvote=1");
                xhttp.send();
            }
        }
    }


};




