//removes table
$(".close-table").on("click", function(event) {
    $("#activeTable").remove();
    event.preventDefault();
});

//removes button
$(".close-table").on("click", function(event) {
    $(".close-table").remove();
    event.preventDefault();
});

//removes button
$(".close").on("click", function(event) {
    $("#closeAdd").remove();
    event.preventDefault();
});