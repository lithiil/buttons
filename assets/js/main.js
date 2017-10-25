var searchStyle = document.getElementById('search_style');

function doInput() {
    if (!this.value) {
        searchStyle.innerHTML = "";

        return;
    }

    searchStyle.innerHTML = ".searchable:not([data-index*=\"" + this.value.toLowerCase() + "\"]) { display: none; }";
}

document.getElementById('search').addEventListener('input', doInput);

function activateHashSearch() {
    $("#search").val(window.location.hash.replace("#", ""));
    doInput.apply(document.getElementById('search'), []);
}

$(document).ready(function () {
    activateHashSearch();

    $(window).on("hashchange", activateHashSearch);

    $(".btn").click(function () {
        var audio = $.trim("audio/" + $.trim($(this).text()) + ".mp3");
        $("#audio").attr("src", audio)[0].play();
    });

    $("#search").keyup(function () {
        window.location.hash = $(this).val();
    });
});

$(document).ready(function () {
    var modal = $('#myModal');

    modal.show().find('.close').click(function (e) {
        e.preventDefault();
        $(this).slideUp();
    });
});
