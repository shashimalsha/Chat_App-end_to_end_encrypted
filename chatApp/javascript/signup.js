const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error_text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    //console.log("Hello");
    //start Ajax
    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "users.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    
                }

            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new formData(form);//creating new formData object
    xhr.send(formData); //sending the form data to the php
}