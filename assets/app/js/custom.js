function animateValue(id, start_no, end_no, duration) {
    var start_float = ((start_no*100)%100);    
    var start = Math.floor(start_no);
    var end = Math.floor(end_no);
    var range = end - start;    
    var current = start;
    var increment = end > start? 1 : -1;
    var stepTime = Math.abs(Math.round(duration / range));
    var obj = document.getElementById(id);
    var timer = setInterval(function() {
        current += increment;
        obj.innerHTML = current+'.'+start_float;
        if (current == end) {
            end_no = Number(end_no);
            obj.innerHTML = end_no.toFixed(2);
            clearInterval(timer);
        }
    }, stepTime);
    //console.log(start_float,start,end,range,increment);    
}
$('document').ready(function(){
    $('#myloader').remove();
    setTimeout(function() {
        $('.validate_style').click();
    },5000);
});