function checkPassword(){
    //define variable //
    let result1 = document.getElementById("errmsg1");
    let result2 = document.getElementById("errmsg2");
    let result3 = document.getElementById("errmsg3");
    let result4 = document.getElementById("errmsg4");
    let Username = document.getElementById("username");
    let phone = document.getElementById("tel");
    let pas11 = document.getElementById("pass1");
    let pas22 = document.getElementById("pass2");
    let password1 = pas11.value;
    let password2 = pas22.value;
    let chk = false;
    // Check Pattern //
    if (!pas11.checkValidity() && !Username.checkValidity() && !phone.checkValidity()) {
        result2.textContent = "->รหัสผ่าน ต้องมี8ตัว ตัวใหญ่ 1 ตัวเล็ก 1 ตัวเลข1";
        result3.textContent = "->Username ต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลข มี3ตัวและไม่เกิน20ตัวเท่านั้น";
        result4.textContent = "->เบอร์โทรศัพท์ประเทศไทยเท่านั้น +66";
        return;
    }
    else if(!pas11.checkValidity()){
        result3.textContent= "";
        result4.textContent="";
        result2.textContent = "->รหัสผ่าน ต้องมี8ตัว ตัวใหญ่ 1 ตัวเล็ก 1 ตัวเลข1";
        return;
    }else if(!Username.checkValidity()){
        result2.textContent= "";
        result4.textContent="";
        result3.textContent = "->Username ต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลข มี3ตัวและไม่เกิน20ตัวเท่านั้น";
        return;
    }else if(!phone.checkValidity()){
        result2.textContent= "";
        result3.textContent= "";
        result4.textContent = "->เบอร์โทรศัพท์ประเทศไทยเท่านั้น +66";
        return;
    }
    result2.textContent= ""; // force delete text 
    result3.textContent= "";
    result4.textContent= "";
    // check currect of password //
    if(password1 == password2){
        chk = true;
    }
    
    if (chk) {
        result1.textContent = "";
    }else{
        result1.textContent = "**รหัสผ่านไม่ตรงกัน";
    }
    

}
window.onload = function(){
    let regbtn = document.getElementById("btnreg");
    regbtn.onclick = checkPassword;
}
