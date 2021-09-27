function LaodFromFile(xml)
{
    Clear();

    var xmlDoc = xml.responseXML;

    var types = xmlDoc.getElementsByTagName("type");
    var positions = xmlDoc.getElementsByTagName("pos");
    var colors = xmlDoc.getElementsByTagName("color");

    for (i=0; i<types.length; i++)
    {
        Loadtype(types[i].childNodes[0].nodeValue, positions[i].childNodes[0].nodeValue, colors[i].childNodes[0].nodeValue);
    }
}

function LoadXMLDoc() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        LaodFromFile(this);
      }
    };
    xmlhttp.open("GET", "position.xml", true);
    xmlhttp.send();
  }

  function LoadTextField()
  {
      Clear();

      var field = document.getElementById("TextField");
      parser = new DOMParser();
      xmlDoc = parser.parseFromString(field.value,"text/xml");

      var types = xmlDoc.getElementsByTagName("type");
      var positions = xmlDoc.getElementsByTagName("pos");
      var colors = xmlDoc.getElementsByTagName("color");
  
      for (i=0; i<types.length; i++)
      {
          Loadtype(types[i].childNodes[0].nodeValue, positions[i].childNodes[0].nodeValue, colors[i].childNodes[0].nodeValue);
      }
  }

  function Clear()
  {
    cls(document.getElementsByClassName('white'));
    cls(document.getElementsByClassName('red'));
  }

  function cls(fields)
  {
    for(i=0; i<fields.length; i++)
        fields[i].innerHTML = '';
  }

  function Loadtype(type, position, color)
    {
        var field = document.getElementById(position);
        SetFieldtype(field, type)
  
  }

  

  function SetFieldtype(field, type)
  {
    if ( type === "krol" )
        field.innerHTML = '&#9812'; 
    
    else if ( type === "krolowa" )
        field.innerHTML = '&#9813';

    else if ( type === "goniec" ) 
        field.innerHTML = '&#9815';
    
    else if ( type === "skoczek" ) 
        field.innerHTML = '&#9816'; 
    
    else if ( type === "wieza" )
        field.innerHTML = '&#9814'; 
    
    else if ( type === "pionek" )
        field.innerHTML = '&#9817'; 
    
  }