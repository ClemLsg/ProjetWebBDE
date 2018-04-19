let userpict = document.getElementsByClassName('userpict');
let imgs = document.getElementsByClassName('imgs');

Array.prototype.forEach.call(userpict, function(userpict){
    let width = userpict.offsetWidth;
    userpict.style.height = width  + "px";
});

Array.prototype.forEach.call(imgs, function(imgs){
    let width = imgs.offsetWidth;
    imgs.style.paddingBottom = width  + "px";
});

getData();

function getData() {
    let request = new XMLHttpRequest();
    request.open("GET", "/api/comments", false);
    request.send(null);
    comments = JSON.parse(request.responseText);
    commentzone = document.getElementById('comments-picture');

    let request2 = new XMLHttpRequest();
    request2.open("GET", "/api/users", false);
    request2.send(null);
    users = JSON.parse(request2.responseText);

    let request3 = new XMLHttpRequest();
    request3.open("GET", "/api/pictures", false);
    request3.send(null);
    pictures = JSON.parse(request3.responseText);
}

function showComments(id) {
    commentzone.innerHTML = "";
    Array.prototype.forEach.call(comments.data, function(comments){
        if(comments.picture_id === id){
            console.log('comment');
            commentli = document.createElement("li");
            commentimg = document.createElement("div");
            commenttext = document.createElement("div");
            commentimg.setAttribute("class", "comment-img");
            commenttext.setAttribute("class", "comment-text");
            userimg = document.createElement("img");
            Array.prototype.forEach.call(users.data, function(users){
                Array.prototype.forEach.call(pictures.data, function(pictures){
                    if(users.picture_id === pictures.id){
                        userimg.setAttribute("src", pictures.url);
                    }
                });
            });
            commentimg.appendChild(userimg);
            nameuser = document.createElement("strong");
            Array.prototype.forEach.call(users.data, function(users){
                if(comments.user_id === users.id){
                    nameuser.innerHTML = users.name;
                }
            });
            usercomment = document.createElement("p");
            usercomment.innerHTML = comments.content;
            userdate = document.createElement("span");
            userdate.setAttribute("class", "date sub-text");
            userdate.innerHTML = comments.created_at;

            commenttext.appendChild(nameuser);
            commenttext.appendChild(usercomment);
            commenttext.appendChild(userdate);
            commentli.appendChild(commentimg);
            commentli.appendChild(commenttext);
            commentzone.appendChild(commentli);
        }
    });
}

function whosVisible() {
    setTimeout(function(){
        pict = document.getElementsByClassName("active");
        idimg = pict[0].id;
        console.log(pict[0].getAttribute('username'));

        imgposter = document.getElementById("imgposter");
        imgposter.innerHTML = "";
        imguser = document.createElement("img");
        imguser.setAttribute("src", pict[0].getAttribute('userpicturl'));

        username = document.createElement("strong");
        username.innerHTML = pict[0].getAttribute('username');

        dateelement = document.createElement("span");
        dateelement.innerHTML = pict[0].getAttribute('dateofpost');

        likes = document.getElementById("likes");
        likes.innerHTML = '';
        likes.innerHTML = pict[0].getAttribute('likes') + ' ' + '<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>';

        idform = document.getElementById('idform');
        idform.setAttribute('value', idimg)

        imgposter.appendChild(imguser);
        imgposter.appendChild(username);
        imgposter.appendChild(dateelement);
        showComments(parseInt(idimg));
    }, 700);

    jQuery( document ).ready( function( $ ) {

        $( '#commentform' ).on( 'submit', function(e) {
            e.preventDefault();
            axios.post('/commenton/event', {
                content: $("input#commentcontent").val(),
                postid: $("input#idform").val(),
            })
                .then(function (response) {
                    console.log(response);
                    getData();
                    whosVisible()
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    });

}