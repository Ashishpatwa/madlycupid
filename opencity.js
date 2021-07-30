function opencity(pagename,eve)
{
    var i, tabcontent, tablink;
    tabcontent = document.getElementsByClassName('tabcontent');
    tablink = document.getElementsByClassName('tablink');
    for(i=0;i<tabcontent.length;i++)
    tabcontent[i].style.display = "none";
    for(i=0;i<tablink.length;i++)
    tablink[i].style.backgroundColor = "#eeeeee";
    document.getElementById(pagename).style.display = "block";
   
    eve.style.backgroundColor = "white";
    

}
document.getElementById("activecontent").click();

function opencitys(pagename,eve)
{
    var i, tabcontent, tablink;
    tabcontent = document.getElementsByClassName('tabcontent');
    tablink = document.getElementsByClassName('tablink');
    for(i=0;i<tabcontent.length;i++)
    tabcontent[i].style.display = "none";
    for(i=0;i<tablink.length;i++)
    {
    tablink[i].style.backgroundColor = "#eeeeee";
    tablink[i].style.borderBottom = "2px solid green";
    }
    document.getElementById(pagename).style.display = "block";
    
    eve.style.backgroundColor = "white";
    eve.style.border = "none";

}
document.getElementById("activecontents").click(); 

function opencityss(pagename,eve)
{
    var i, tabcontent, tablink;
    tabcontent = document.getElementsByClassName('tabcontent');
    tablink = document.getElementsByClassName('tablink');
    for(i=0;i<tabcontent.length;i++)
    tabcontent[i].style.display = "none";
    for(i=0;i<tablink.length;i++)
    {
        tablink[i].style.borderBottom= "2px solid rgb(230, 226, 226)";
        tablink[i].style.borderTop= "2px solid rgb(230, 226, 226)";
        tablink[i].style.backgroundColor = "white";
    }
    document.getElementById(pagename).style.display = "block";
    eve.style.borderBottom = "2px solid rgb(123, 123, 244)";
}
document.getElementById("activecontentss").click(); 