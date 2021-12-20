function Total() {
    dadu1 = Number(document.getElementById("value1").innerHTML);
    dadu2 = Number(document.getElementById("value2").innerHTML);
    totaldadu = dadu1+dadu2;totaldadus = String(totaldadu)
    alert("total dadu adalah "+totaldadus);
}

function LemparDaduA() {
    var randomNumber1 = Math.floor(Math.random()*6)+1;
    var randomImage1 = "asset/"+randomNumber1+".png";

    var image1=document.querySelectorAll("img")[0];
    image1.setAttribute("src",randomImage1);

    document.getElementById("value1").innerHTML = randomNumber1;
}
    
function LemparDaduB() {
    var randomNumber2 = Math.floor(Math.random()*6)+1;
    var randomImage2 = "asset/"+randomNumber2+".png";

    var image2=document.querySelectorAll("img")[1];
    image2.setAttribute("src",randomImage2);

    document.getElementById("value2").innerHTML = randomNumber2;
}

function Lempar2Dadu() {
    LemparDaduB()
    LemparDaduA()
}
