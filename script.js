var page = 1;

$("#chargement").click(function () {
    $.ajax({
        url: "./api.php?page=" + page,
    }).done(function (data) {
        //convertir string to json
        data = JSON.parse(data);

        var articles = data['results'];
        articles.forEach(function (article) {
            var description = article.summary_news.length < 500 ? article.summary_news : article.summary_news.substr(0, 500) + '...';
            var article_html = `<div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="` + article.images[0].thumbnail_url_image + `" class="card-img" alt="` + article.images[0].description_image + `" style="width: 300px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">` + article.title_news + `</h5>
                            <p class="card-text">` + description + `</p>
                            <p class="card-text">
                                <small class="text-danger">` + article.type.name_type + `</small>
                                <small class="text-muted float-right">` + article.publication_date_news + `</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>`;

            $("#list-article").append(article_html);
        });
        page++;
        if (page > data.pagination.total_pages) {
            //desactiver bouton a la derniere page
            $("#chargement").prop('disabled', true);
        }
    })
});
