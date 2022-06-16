window.onload=function(){

    var ajax = new XMLHttpRequest();//FaceBook_Post.phpと通信するためのオブジェクト
    var text = document.getElementById("text");//フォームのid

    const Facebook = document.getElementById("Facebook");//Facebookのチェックボックス

    const fd = new FormData();//投稿内容を送るためのオブジェクト
    var usercomment = document.getElementById("usercomment");//投稿内容
    
    text.addEventListener("submit",function(e){
        //e.preventDefault();//デバック用

        if(Facebook.checked){
            
            fd.append('usercomment',usercomment.value);

            ajax.open("POST","http://localhost/OrionAllPost/Facebook_Post.php");
            ajax.send(fd);
        }

    });
        
};