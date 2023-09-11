function checkPassword(){
    let result = document.getElementById("errormsg")
    let pas11 = document.getElementById("pass1");
    let pas22 = document.getElementById("pass2");
    let password1 = pas11.value;
    let password2 = pas22.value;
    let chk = false;
    if(password1 == password2){
        chk = true;
    }
    // console.log(password1);
    // console.log(password2);
    if (chk) {
        result.style.color = "green";
        result.innerHTML = "Correct";
    }else{
        result.style.color = "red";
        result.innerHTML = "InCorrect";
    }
}
window.onload = function(){
    let regbtn = document.getElementById("btnreg");
    regbtn.onclick = checkPassword;
}
