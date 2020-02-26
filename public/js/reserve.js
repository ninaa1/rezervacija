const seats = new Set();

$(document).ready(function(){
    $("input").click(function(){
        const seatId = $(this).val();
        if(seats.has(seatId)) {
            seats.delete(seatId);
        } else {
            seats.add(seatId);
        }
  });
});

function reserve(screeningId) {
    $.post("http://127.0.0.1:8000/reservations", {seats : Array.from(seats), screeningId : screeningId})
}

