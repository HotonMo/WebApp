
const form = document.querySelector("form");
nField = form.querySelector(".user_name"),
nInput = nField.querySelector("input"),
eField = form.querySelector(".email"),
eInput = eField.querySelector("input"),
pField = form.querySelector(".phone"),
pInput = pField.querySelector("input");

form.onsubmit = (e)=>{
  e.preventDefault(); //preventing from form submitting
  
  //if email and password is blank then add shake class in it else call specified function
  (nInput.value == "") ? nField.classList.add("shake", "error") : checkName();
  (eInput.value == "") ? eField.classList.add("shake", "error") : checkEmail();
  (pInput.value == "") ? pField.classList.add("shake", "error") : checkPhone();
  setTimeout(()=>{ //remove shake class after 500ms
    nField.classList.remove("shake");
    eField.classList.remove("shake");
    pField.classList.remove("shake");
  }, 500);
  nInput.onkeyup = ()=>{checkName();} 
  eInput.onkeyup = ()=>{checkEmail();} 
  pInput.onkeyup = ()=>{checkPhone();} 
  
  
  
  
  function checkEmail(){ 
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; //pattern for validate email
    if(!eInput.value.match(pattern)){ //if pattern not matched then add error and remove valid class
      eField.classList.add("error");
      eField.classList.remove("valid");
      let errorTxt = eField.querySelector(".error-txt");
      //if email value is not empty then show please enter valid email else show Email can't be blank
      (eInput.value != "") ? errorTxt.innerText = "Enter a valid email address" : errorTxt.innerText = "Email can't be blank";
    }else{ //if pattern matched then remove error and add valid class
      eField.classList.remove("error");
      eField.classList.add("valid");
    }
  }
  function checkName(){ 
    if(nInput.value == ""){ 
      nField.classList.add("error");
      nField.classList.remove("valid");
    }else{ 
      nField.classList.remove("error");
      nField.classList.add("valid");
    }
  }
  function checkPhone(){ 
    let Phonepattern = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/; //pattern for validate phone
    if(!pInput.value.match(Phonepattern)){ //if pattern not matched then add error and remove valid class
        pField.classList.add("error");
        pField.classList.remove("valid");
      let errorTxt = pField.querySelector(".error-txt");
      (pInput.value != "") ? errorTxt.innerText = "Enter a valid phone number" : errorTxt.innerText = "Phone number can't be blank";
    }else{ //if phone is empty then remove error and add valid class
      pField.classList.remove("error");
      pField.classList.add("valid");
    }
  }
  //if eField and pField doesn't contains error class that mean user filled details properly
  if(!nField.classList.contains("error") && !eField.classList.contains("error") && !pField.classList.contains("error")){
    window.location.href = form.getAttribute("action"); //redirecting user to the specified url which is inside action attribute of form tag
  }

  const request = fetch('localhost/Project1/api.php');

  // Call the then() method to specify what to do with the response
  request.then(response => {
    // Check if the request was successful
    if (response.ok) {
      // Parse the response data as JSON
      response.json().then(data => {
        // Do something with the data
        console.log(data);
      });
    } else {
      // Handle the error
      console.log(response.statusText);
    }
  });
}

