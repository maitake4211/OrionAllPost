window.onload=function(){

    var ajax = new XMLHttpRequest();//FaceBook_Post.phpと通信するためのオブジェクト
    var text = document.getElementById("text");//フォームのid

    const Facebook = document.getElementById("Facebook");//Facebookのチェックボックス

    const fd = new FormData();//投稿内容を送るためのオブジェクト
    var usercomment = document.getElementById("usercomment");//投稿内容
    var imgpath = document.getElementById("imgpath");

    text.addEventListener("submit",function(e){
        //e.preventDefault();//デバック用

        if(Facebook.checked){
            //return confirm(imgpath.files[0].name);
            fd.append('usercomment',usercomment.value);
            fd.append('imgpath',imgpath.files[0].name);

            ajax.open("POST","http://localhost/OrionAllPost/Facebook_Post.php");
            //ajax.open("POST","http://localhost/Facebook_Post.php");
            ajax.send(fd);
        }

    });

};
