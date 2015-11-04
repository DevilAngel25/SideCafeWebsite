var map = null;

function GetMap()
{
    map = new Microsoft.Maps.Map(document.getElementById("myMap"), {credentials:"AhqmIHldn7nc5QyiHLDI7TB1aKLu_rivOSEiX1Eye9cJ6ohUzOJNszQkuhVSz7IM"}); 

    var center = map.getCenter();
            
    var pin = new Microsoft.Maps.Pushpin(center, {icon:"../images/BluePP.png", height:5, width:5, anchor:new Microsoft.Maps.Point(0,50), draggable: false}); 
    map.entities.push(pin);
}

function PP()
{
    var center = map.getCenter();
            
    var pin = new Microsoft.Maps.Pushpin(center, {icon:"../images/BluePP.png", height:5, width:5, anchor:new Microsoft.Maps.Point(0,50), draggable: true}); 
    map.entities.push(pin);
}