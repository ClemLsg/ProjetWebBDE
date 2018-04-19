let request2 = new XMLHttpRequest();
request2.open("GET", "/api/url/activities/", false);
request2.send(null);
let url = JSON.parse(request2.responseText);

expandResults();
showPage(1);


function expandResults(){
    let request = new XMLHttpRequest();
    request.open("GET", "/api/activities/", false);
    request.send(null);
    let responses = JSON.parse(request.responseText);
    document.getElementById("event-container").innerHTML = "";
    document.getElementById("pagination").innerHTML = "";
    let loop = 0;
    let page = 1;

    let meta = document.getElementsByTagName("META");
    Array.prototype.forEach.call(meta, function(element){
        if(element.name === '_token'){
            token = element.content;
        }
    });

    Array.prototype.forEach.call(responses.data, function(element){
        if(loop%6 === 0){
            containerE = document.createElement("div");
            containerE.innerHTML = "";
            containerE.setAttribute("id", "page"+page);
            containerE.setAttribute("class", "row pageevent");
            document.getElementById("event-container").appendChild(containerE);

            pageli = document.createElement("li");
            pageli.setAttribute("class", "page-item");
            pageli.setAttribute("id", "page-link"+page);
            pagebutton = document.createElement("a");
            pagebutton.innerHTML = page;
            pagebutton.setAttribute("class", "page-link");
            pagebutton.setAttribute("onclick", "showPage("+page+")");
            pageli.appendChild(pagebutton);
            document.getElementById("pagination").appendChild(pageli);

            page++;
        }
        let date = new Date(element.date);
        var months = ["JAN", "FEB", "MARS", "AVRIL", "MAI", "JUIN", "JUIL", "AOUT", "SEP", "OCT", "NOV", "DEC"];
        var days = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
            containerE.innerHTML = containerE.innerHTML +
                '<div class="col-sm-4">' +
                '<div class="card mb-4">'+
                '<div style="background-image: url(' + url[element.id] +'); padding-bottom: 18.75rem" class="img-event col-sm-12">'+
                '</div>'+
                '<div class="card-body">'+
                '<div class="row row-striped">'+
                '<div class="col-4 text-right">'+
                '<h1 class="display-4"><span class="badge badge-secondary">' + date.getDate() + '</span></h1>'+
                '<h2>' + months[date.getMonth()] + '</h2>'+
                '</div>'+
                '<div class="col-8">'+
                '<h3 class="text-uppercase"><strong>' + element.name + '</strong></h3>'+
                '<ul class="list-inline">'+
                '<li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear() + '</li>'+
                '<li class="list-inline-item"><i class="fa fa-eur" aria-hidden="true"></i> ' + element.price + '</li>'+
                '</ul>'+
                '<p>' + element.description + '</p>'+
                '</div>'+
                '</div>'+
                '<a href="http://localhost:8000/event/' + element.id + '" class="btn btn-primary">Lire Plus &rarr;</a>'+
                '</div>'+
                '</div>'+
                '</div>';
        loop++;
    });
    showPage(1);
}

function showPage(id) {
    let otherpages = document.getElementsByClassName("pageevent");
    Array.prototype.forEach.call(otherpages, function(element){
        if(element.id !== "page"+id){
            element.style.display = "none";
        } else {
            element.style.display = "flex";
        }
    });

    let pagebutton = document.getElementsByClassName("page-item");
    Array.prototype.forEach.call(pagebutton, function(element){
        if(element.id === "page-link"+id){
            element.classList.add("active");
        } else {
            element.classList.remove("active");
        }

    });
}