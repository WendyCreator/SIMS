
const generateBtn = document.querySelector('#generate'),
      matricInput = document.querySelector('#matric'),
      courseDuration = document.querySelector('#formrow-course'),
      year = document.querySelector('#year'),
      Expyear = document.querySelector('#formrow-year'),
      cgpa = document.querySelector('#formrow-gp'),
      thisImg = document.querySelector('#img'),
      myImage = document.querySelector('#myImage'),
      placeholder = document.querySelector('#placeholder')


    //   matricInput.disabled = true;


const generateMatricNum = ()=>{
   let randomNum = Math.floor(Math.random() * (1000 - 100+ 1) ) + 100;
    const year = new Date().getFullYear();
    const militime = new Date().getTime();
    const miliString = militime + '';
    milislice = miliString.slice(-4, -1)
    let matricNumber = `${year}/${randomNum}${milislice}`;
    matricInput.value = matricNumber;

}


generateBtn.addEventListener('click', (e)=>{
    generateMatricNum();
    e.target.disabled = true;
})


const generateYear = ()=>{
    const theYear = parseInt(courseDuration.value || 0);
    const theDuration = parseInt(year.value || 0);
   const  expyYear =  theYear + theDuration;
   Expyear.value = expyYear;
}

courseDuration.addEventListener('change', generateYear);
year.addEventListener('change', generateYear);

cgpa.addEventListener('change', (e)=>{
   e.target.value = `${e.target.value}/5`
})

thisImg.addEventListener('input', (e)=>{
    getImage(e)
})

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



// arr = [1,2,3,4,5,6,7,8,9,10,12,13]

// newArr = arr.map(e=> e * 2);