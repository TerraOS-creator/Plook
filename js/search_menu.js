var search1=document.getElementsByClassName("search1");
var search2=document.getElementsByClassName("search2");
var search3=document.getElementsByClassName("search3");
var search4=document.getElementsByClassName("search4");

var hidden1=document.getElementsByClassName("hid_search1");
var hidden2=document.getElementsByClassName("hid_search2");
var hidden3=document.getElementsByClassName("hid_search3");
var hidden4=document.getElementsByClassName("hid_search4");

var hid_wrapper=document.getElementsByClassName("hidden-wrapper");

var hid_box1=document.getElementsByClassName("hidden-box1");
var hid_box2=document.getElementsByClassName("hidden-box2");
var hid_box3=document.getElementsByClassName("hidden-box3");

function checked1(){
 search1[0].className+=" active";
 search2[0].className=search2[0].className.replace(" active","");
 search3[0].className=search3[0].className.replace(" active","");
 search4[0].className=search4[0].className.replace(" active","");

 //checked number 1 then display hidden 1
 hidden1[0].style.display="block";
 hidden2[0].style.display="none";
 hidden3[0].style.display="none";
 hidden4[0].style.display="none";
}

function checked2(){
    search2[0].className+=" active";
    search1[0].className=search1[0].className.replace(" active","");
    search3[0].className=search3[0].className.replace(" active","");
    search4[0].className=search4[0].className.replace(" active","");
    hidden1[0].style.display="none";
    hidden2[0].style.display="block";
    hidden3[0].style.display="none";
    hidden4[0].style.display="none";
    }
function checked3(){
    window.open("autosearch.php","_self");
    search3[0].className+=" active";
    search1[0].className=search1[0].className.replace(" active","");
    search2[0].className=search2[0].className.replace(" active","");
    search4[0].className=search4[0].className.replace(" active","");
    hidden1[0].style.display="none";
    hidden2[0].style.display="none";
    hidden3[0].style.display="block";
    hidden4[0].style.display="none";
}
function checked4(){
    search4[0].className+=" active";
    search1[0].className=search1[0].className.replace(" active","");
    search2[0].className=search2[0].className.replace(" active","");
    search3[0].className=search3[0].className.replace(" active","");
    hidden1[0].style.display="none";
    hidden2[0].style.display="none";
    hidden3[0].style.display="none";
    hidden4[0].style.display="block";
}
        


