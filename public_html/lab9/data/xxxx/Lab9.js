var bio = document.getElementById("bio");
var turing = document.getElementById("turing");
var jobs = document.getElementById("jobs");
var neumann = document.getElementById("neumann");
var torvalds = document.getElementById("torvalds");
var gates = document.getElementById("gates");

function load(name)
{
    var request = new XMLHttpRequest();
    request.open('GET', 'res/' + name + '.html');
    request.onload = function()
    {
       bio.innerHTML = request.responseText; 
    };
    request.send();
    
}

turing.addEventListener("click", function()
    {
        load("turing");
    });


jobs.addEventListener("click", function()
    {
        load("jobs");
    });

neumann.addEventListener("click", function()
    {
        load("neumann");
    });

torvalds.addEventListener("click", function()
    {
        load("torvalds");
    });

gates.addEventListener("click", function()
    {
        load("gates");
    });
