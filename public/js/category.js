let request2 = new XMLHttpRequest();
request2.open("GET", "/api/image/url/", false);
request2.send(null);
let url = JSON.parse(request2.responseText);

expandResults(0);
showPage(1);


function expandResults(filterValue){
    let request = new XMLHttpRequest();
    request.open("GET", "/api/products/"+filterValue, false);
    request.send(null);
    let responses = JSON.parse(request.responseText);
    document.getElementById("category-container").innerHTML = "";
    document.getElementById("pagination").innerHTML = "";
    let loop = 0;
    let page = 1;

    Array.prototype.forEach.call(responses, function(element){
        if(loop%6 === 0){
            containerE = document.createElement("div");
            containerE.innerHTML = "";
            containerE.setAttribute("id", "page"+page);
            containerE.setAttribute("class", "row pagecategory");
            document.getElementById("category-container").appendChild(containerE);

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
        if(element.category_id === filterValue || filterValue === 0 && element.stock > 0){
            containerE.innerHTML = containerE.innerHTML +
                "<div class='col-12 col-md-6 col-lg-4'>" +
                "<div class='card'>" +
                "<img class='card-img-top' src='"+ url[element.id] +"' alt='Card image cap'>" +
                "<div class='card-body'>" +
                "<h4 class='card-title'><a href='"+"/product/"+ element.id +"' title='View Product'>"+element.name +"</a></h4>" +
                "<div class='row'>" +
                "<div class='col'>" +
                "<p class='btn btn-danger btn-block'>"+element.price +" $</p>" +
                "</div>" +
                "<form class='col' method='POST' action='/cart/add/" + element.id + "'>" + "<input type='hidden' name='_token' value='V6x69qglz1C1ALFYYBsGOv0UlepTgHjl6lwHyBkP'>" +
                "<input type='text' class='form-control d-none' id='quantity' name='quantity' min='1' max='10' value='1'>" +
                "<div class='col-sm-12'>" +
                "<button type='submit' class='btn btn-success btn-block'>Ajouter au panier</button>" +
                "</div>" +
                "</form>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>";
        } else if(element.category_id === filterValue || filterValue === 0 && element.stock <= 0){
            containerE.innerHTML = containerE.innerHTML +
                "<div class='col-12 col-md-6 col-lg-4'>" +
                "<div class='card'>" +
                "<img class='card-img-top' src='"+ url[element.id] +"' alt='Card image cap'>" +
                "<div class='card-body'>" +
                "<h4 class='card-title'><a href='"+"/product/"+ element.id +"' title='View Product'>"+element.name +"</a></h4>" +
                "<div class='row'>" +
                "<div class='col'>" +
                "<p class='btn btn-danger btn-block'>"+element.price +" $</p>" +
                "</div>" +
                "<div class='col-sm-12'>" +
                "<button type='submit' class='btn btn-danger btn-block'>Rupture de stock</button>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>";
        }
        loop++;
    });
    showPage(1);
}

function showPage(id) {
    let otherpages = document.getElementsByClassName("pagecategory");
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