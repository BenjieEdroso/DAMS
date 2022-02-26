var searchFeature = function (){
    $(".seeResults").on("click", function(e) {
        if (e.target.innerText == "See all results") {
            see_all_results($(this));
            $(".data_viewer").addClass("show");
            e.target.innerText = "Close";
        } else if (e.target.innerText == "Close") {
            $(".data_viewer").removeClass("show");
            $(".data_viewer").addClass("hidden");
            let some = $(".data_viewer").children();
            some.each(function(index) {
                some[index].remove();
            });
            e.target.innerText = "See all results";
        }
    });
    
    function see_all_results(a) {
        $.ajax({
            url: "http://localhost/DAMS/documents/see_all_results",
            method: "POST",
            success: function(response) {
                let element = a[0];
                let data_viewer = document.querySelector(".data_viewer");
                let data = JSON.parse(response);
                data_viewer.innerHTML = "";
    
                if (data.length == 0) {
                    $(".data_viewer").addClass("hidden");
                } else if (data.length > 0) {
                    data.forEach((data) => {
                        const a = document.createElement("a");
                        a.setAttribute("href", "#");
                        a.setAttribute(
                            "class",
                            "searchItems list-group-item list-group-item-action"
                        );
                        a.innerHTML = data.file_name;
                        data_viewer.appendChild(a);
                    });
                }
            },
        });
    
        return true;
    }
    
    function fetch_data(search_string) {
        $.ajax({
            url: "http://localhost/DAMS/documents/find",
            method: "POST",
            data: { query: search_string },
            success: function(response) {
                let div = document.querySelector(".data_viewer");
    
                let data = JSON.parse(response);
                console.log(data);
                div.innerHTML = "";
    
                if (data.length == 0) {
                    $(".data_viewer").addClass("hidden");
                    let some = $(".data_viewer").children();
                    some.each(function(index) {
                        some[index].remove();
                    });
                } else if (data.length > 0) {
                    data.forEach((data) => {
                        const a = document.createElement("a");
                        a.setAttribute("href", "#");
                        a.setAttribute(
                            "class",
                            "searchItems list-group-item list-group-item-action"
                        );
                        a.innerHTML = data.file_name;
                        div.appendChild(a);
                    });
                    $(".data_viewer").removeClass("hidden");
                    $(".data_viewer").addClass("show");
                }
            },
        });
    }
}

export default searchFeature; 