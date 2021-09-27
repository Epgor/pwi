var bio = document.getElementById("bio");
var turing = document.getElementById("turing");
var steve = document.getElementById("steve");
var bill = document.getElementById("bill");
var berners = document.getElementById("berners");
var codd = document.getElementById("codd");


function get_html(name) {
    var myrequest = new XMLHttpRequest();
    myrequest.open('GET', `data/${name}.html`);
    myrequest.onload = function() {
        bio.innerHTML = myrequest.responseText;
    };
    myrequest.send();

}

turing.addEventListener("click", function() {
    get_html(turing);
});

bill.addEventListener("click", function() {
    get_html("bill");
});

berners.addEventListener("click", function() {
    get_html("berners");
});

codd.addEventListener("click", function() {
    get_html("codd");
});

steve.addEventListener("click", function() {
    get_html("steve");
});