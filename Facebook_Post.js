window.onload=function(){

    var text = document.getElementById("text");
    const Facebook = document.getElementById("Facebook");

    text.addEventListener("submit",function(e){
        e.preventDefault();//デバック用
        if(Facebook.checked){
            var usercomment = document.getElementById("usercomment")
            return confirm("Submit:" + usercomment.value);
        }

    });
        

};