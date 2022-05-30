
const myForm = document.querySelector('#myform'),
email = document.querySelector('#email'),
phone = document.querySelector('#phone'),
role = document.querySelector('#role'),
school = document.querySelector('#school'),
address = document.querySelector('#address'),
img = document.querySelector('#img'),
psw = document.querySelector('#pwd'),
cpsw = document.querySelector('#cpwd'),
emailErr = document.querySelector('#email-err'),
pswErr = document.querySelector('#psw-err'),
cpswErr = document.querySelector('#cpsw-err'),
submit = document.querySelector('#submit'),
firstname = document.querySelector('#firstname'),
lastname = document.querySelector('#lastname'),
username = document.querySelector('#username'),
info = document.querySelector('#info')
myImage = document.querySelector('.myImage'),
btnS = document.querySelector('#btn'),
image = document.querySelector('.image'),
placeholder = document.querySelector('#placeholder')

const pattern1 = /[a-z]/,
pattern2 = /[A-Z]/,
pattern3 = /[0-9]/,
pattern4 =/[!@#$%^&*]/

let isValid  = true;
cpsw.disabled = true;
submit.disabled = true;

// Adding our event handlers



psw.addEventListener('input', (e)=>{
passwordValidation(e)
displayInput(e)
})

cpsw.addEventListener('input', (e)=>{
confirmPassword()
displayInput(e)
})
email.addEventListener('input', (e)=>{
emailErr.innerHTML = '';
displayInput(e);
})
firstname.addEventListener('input', displayInput)
lastname.addEventListener('input', displayInput)
username.addEventListener('input', displayInput)
phone.addEventListener('input', displayInput)
role.addEventListener('input', displayInput)
school.addEventListener('input', displayInput)
address.addEventListener('input', displayInput)
img.addEventListener('input', function(e){
displayInput(e);
getImage(e);

})



// Handling form password validation

function passwordValidation(e){
//Check empty email fields
if(email.value == ''){
  emailErr.innerHTML = "Please input your email..."
}else{
  // Check for pattern validation
  if(!pattern1.test(e.target.value)){
      pswErr.innerHTML = `Password must include Lowercase`
      isValid = false;
  }

   else if(!pattern2.test(e.target.value)){
      pswErr.innerHTML = `Password must include Uppercase`
      isValid = false;
  }
   else if(!pattern3.test(e.target.value)){
      pswErr.innerHTML = `Password must include Number'`
      isValid = false;
  }
   else if(!pattern4.test(e.target.value)){
      pswErr.innerHTML = `Password must include special characters'`
      isValid = false;
  }
   else if(e.target.value.length < 8){
      pswErr.innerHTML = `Password must be at least 8 characters long`
      isValid = false;
  }
  else{
      isValid = true;
  }


  if(isValid){
      successClass(pswErr)
      pswErr.innerHTML = 'Password valid!'
      cpsw.disabled = false;
  } else{
      errorClass(pswErr)
      cpsw.disabled = true;
  }
  emailErr.innerHTML = ""
}
}

//Confirm passsword function

function confirmPassword(){
if(psw.value !== cpsw.value){
  cpswErr.innerHTML = 'Passwords do not match please';
  errorClass(cpswErr)
  submit.disabled = true;
} else{
  submit.disabled = false;
  successClass(cpswErr)
  cpswErr.innerHTML = 'You can submit your form';
  
}
}

function successClass(el){
el.classList.remove('error')
el.classList.add('success')
}

function errorClass(el){
el.classList.add('error')
el.classList.remove('success')
}

function displayInput(e){
if(e.target.value.length >= 3){
  e.target.parentElement.nextElementSibling.classList.remove('invisi')
  e.target.parentElement.nextElementSibling.classList.add('visi')
}
}

function greetUser(){
const greeting = `<u> To ${firstname.value} ${lastname.value} </u>, <br> <br>
Hello ${username.value} We are glad to have you. Every information you require has been sent to your email ${email.value}. And all your data has been stored.
Thank you for choosing us.
`
info.innerHTML= greeting;

}



// Javascript for image display ###########


// const imageInput = document.querySelector('#img'),
// myImage = document.querySelector('.myImage'),
// btn = document.querySelector('#btn'),
// image = document.querySelector('.image'),
// placeholder = document.querySelector('#placeholder'),
// countries = document.querySelector('#countries')


// img.addEventListener('input', getImage)
// btnS.addEventListener('click', hideImage)

function getImage(e){
const file = e.target.files[0]

if(file){
  
  const reader = new FileReader()
  placeholder.style.display = 'none'
  reader.addEventListener('load', function(){
     
      myImage.src = this.result
  })
  reader.readAsDataURL(file)
}
}

function hideImage(){
image.classList.toggle('slide')
}

// submiting forrm using ajax ########

$(function(){
const btn = document.querySelector('#btn1');
const saSuccess = document.querySelector('#sa-success');

myForm.addEventListener('submit', function(e){
  const formdata = {
      firstname: $('#firstname').val(),
      lastname: $('#lastname').val(),
      username: $('#username').val(),
      email: $('#email').val(),
      phone: $('#phone').val(),
      role: $('#role').val(),
      school: $('#school').val(),
      address: $('#address').val(),
      files: $('#img').val(),
      pass: $('#pwd').val(),
      cpass: $('#cpwd').val(),
      // submit: $('#submit')
  }
  const formData = new FormData(this);
  console.log(formData);
  e.preventDefault();
  // $.post("staff-reg-process.php",
  // formdata,
  // function(data, status){
  //   alert("Data: " + data + "\nStatus: " + status);
  // });
  $.ajax({
      url:'staff-reg-process.php',
      type:'post',
      data:formData,
      contentType: false,
      processData: false,
      success: function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
          }
      })
  
  // console.log(formdata);
  // console.log(saSuccess);
  saSuccess.click();
  // btn.click();
})

btn.addEventListener('click', ()=>{
// window.reload();
console.log('cleared');
// $('#firstname').val('');
//     $('#lastname').val('');
//     $('#username').val('');
//     $('#email').val('');
//     $('#phone').val('');
//     $('#role').val('');
//     $('#school').val('');
//     $('#address').val('');
//     $('#img').val('');
//     $('#pwd').val('');
//     $('#cpwd').val('');

})
// setTimeout(()=>{
//   btn.click();  

// }, 1000)







})


