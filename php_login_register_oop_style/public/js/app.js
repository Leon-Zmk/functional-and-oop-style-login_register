let profile=document.getElementById("profile");
let fileinput=document.getElementById("fileinput");

profile.addEventListener('click',function(){
    fileinput.click();
})

fileinput.addEventListener("change",function(){
    let file=this.files[0];
    let reader=new FileReader();
    reader.addEventListener('load',function(){
        profile.src=reader.result;
    })
    reader.readAsDataURL(file);
})