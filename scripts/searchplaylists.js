$(initSearchPlaylist);

function initSearchPlaylist () {
    $("#searchList").on("keyup", getPlaylistFromDb);
    getPlaylistFromDb();
}

function getPlaylistFromDb () {
    $("#searchResults").empty();
    var search = $("#searchList").val();
    if (search != "") {
        $tr = $("<tr>")
                .append($("<th>"))
                .append($("<th>", {text: "Naam playlist:"}))
                .append($("<th>", {text: "bpm:"}));
            $("#searchResults")
                .append($tr);
        // launchOnResize();
        $.ajax({
            url: 'includes/searchplaylists.php',
            method: 'post',
            dataType: 'json',
            data: {
                query: search
            },
            success: function (data) {
                printResults (data);
            }
        });
    }
    else {
        $tr = $("<tr>")
            .append($("<td>"))
            .append($("<td>", {text: "Voer een zoekresultaat in."}));
        $("#searchResults")
            .append($tr);
    }
}

function printResults (data) {
    $("#searchResults").empty();
    $tr = $("<tr>")
            .append($("<th>"))
            .append($("<th>", {text: "Naam playlist:"}))
            .append($("<th>", {text: "bpm:"}));
        $("#searchResults")
            .append($tr);
    if (data.results.length != 0) {
        $.each(data.results, function (k, v) {
            console.log(v.image);
            $tr = $("<tr>", {"data-page":"16", "data-item": v.id, "data-transition":"slide", class: "list-menu-button page-navigation border-bottom"})
                .append($("<td style='width:74px;height:64px;'>")
                    .append("<img src='"+v.image+"'>"))
                .append($("<td>", {text: truncateText(v.name), class: "tooltipped", "data-position": "top", "data-delay": "0", "data-tooltip": v.name}))
                .append($("<td>", {text: v.bpm}));
            $("#searchResults")
                .append($tr);
        });
        $(".tooltipped").tooltip({delay: 0});
    }
    else {
        $tr = $("<tr>")
            .append($("<td>"))
            .append($("<td>", {text: "Er zijn geen resultaten gevonden."}));
        $("#searchResults")
            .append($tr);
    }
    launchOnResize();
}
