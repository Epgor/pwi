var Newton = document.getElementById('Newton');
var objNewton = document.getElementById('conNewton');

var Jobs = document.getElementById('Jobs');
var objJobs = document.getElementById('conJobs');

var Torvalds = document.getElementById('Torvalds');
var objTorvalds = document.getElementById('conTorvalds');

var Gates = document.getElementById('Gates');
var objGates = document.getElementById('conGates');

var Neumann = document.getElementById('Neumann');
var objNeumann = document.getElementById('conNeumann');

function load(name, obj)
{
    var request = new XMLHttpRequest();
    request.open('GET','xml/' + name + '.xml');
    request.onload = function()
    {
        if (obj.innerHTML === '')
            obj.innerHTML = parse(request.responseXML); 
        else 
            obj.innerHTML = '';
    }
    request.send();
}

function parse(xml)
{
    var obj = xml.getElementsByTagName("fn");
    var birthday = xml.getElementsByTagName("bday")[0].getElementsByTagName("date")[0].childNodes[0].nodeValue;

    var text = obj[0].getElementsByTagName("text")[0].childNodes[0].nodeValue;
    var val = '' + text + '<br>' + birthday; 
    return val;
}

Newton.addEventListener("click", function()
    {
        load("newton", objNewton);
    })

Jobs.addEventListener("click", function()
    {
        load("jobs", objJobs);
    });

Neumann.addEventListener("click", function()
    {
        load("neumann", objNeumann);
    });

Torvalds.addEventListener("click", function()
    {
        load("torvalds", objTorvalds);
    });

Gates.addEventListener("click", function()
    {
        load("gates", objGates);
    });