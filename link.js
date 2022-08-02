//SNSに実際に投稿するモジュールとindex.phpを関連付けるコード。
window.onload=function(){

    var ajax = new XMLHttpRequest();//FaceBook_Post.phpと通信するためのオブジェクト
    var text = document.getElementById("contact");//フォームのid

    const Facebook = document.getElementById("facebook");//Facebookのチェックボックス

    const fd = new FormData();//投稿内容を送るためのオブジェクト
    var usercomment = document.getElementById("usercomment");//投稿内容
    //var imgpath = document.getElementById("imgpath");

    text.addEventListener("submit",function(e){
       //e.preventDefault();//デバック用

        if(Facebook.checked){
            //console.log(usercomment.value);
            fd.append('usercomment',usercomment.value);
            //fd.append('imgpath',imgpath.files[0].name);

            ajax.open("POST","http://localhost/Facebook_Post.php");
            //ajax.open("POST","http://localhost/Facebook_Post.php");
            ajax.send(fd);
        }

    });

};
