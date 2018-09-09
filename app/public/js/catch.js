$(document).ready(function () {
    new Catch();
});

function Catch() {
    this.form = document.forms.catch;
    this.foundArticles = [];

    this.constructor = function ()
    {
        this.Vue({ articles: this.foundArticles });
    };

    this.Vue = function (data)
    {
        let self = this;

        let ArticleComponent = Vue.component('article-component', {
            template: '#article-template',
            props: ['title','link','summary'],
            delimiters: ['${', '}'],
        });

        new Vue({
            el: "#screen",
            delimiters: ['${', '}'],
            data: function () {
                return {
                    articles: []
                }
            },
            methods: {
                findArticle: function ()
                {
                    let self = this;
                    mainScript.loadingModal.show();

                    let searchText = this.$refs.form[0].value;

                    $.ajax({
                        url: '/admin/catch/find',
                        method: 'post',
                        data: { search: searchText },
                        dataType: 'json',
                        success: function (data) {
                            self.treatFoundArticles(data.articles, searchText);
                        },
                        error: function (error) {
                            mainScript.swal.error(error.responseJSON.message);
                        }
                    });
                },

                treatFoundArticles: function (data, searchText)
                {
                    this.articles = [];
                    for(let idx in data){

                        try{
                            let article = this.parseHTML(data[idx])
                            this.articles.push(article);
                        } catch (e) {
                            continue;
                        }
                    }

                    mainScript.loadingModal.hide();

                    if (this.articles.length === 0) {
                        mainScript.swal.error('Ops', ['Nenhum artigo encontrado para o termo "'+searchText+'"']);
                    }
                },

                parseHTML: function (htmlString)
                {
                    //Temp DIV to convert string from crawler to HTML node
                    let div = document.createElement('div');
                    div.innerHTML = htmlString;


                    let summary = div.getElementsByClassName('entry-summary')[0].getElementsByTagName('p')[0];
                    let summaryText = summary.childNodes[0].data;

                    let titleElement = div.getElementsByClassName('entry-title')[0].getElementsByTagName('a')[0];
                    let title = titleElement.innerText;
                    let link = titleElement.href;

                    return {
                        link: link,
                        title: title,
                        summary: summaryText
                    }
                },

                importFoundArticles: function ()
                {
                    mainScript.loadingModal.show();

                    let self = this;
                    $.ajax({
                        url: '/admin/catch/importFoundArticles',
                        method: 'post',
                        data: { articles: self.articles },
                        dataType: 'json',
                        success: function (data) {
                            self.articles = [];
                            mainScript.swal.success('Importação ok', 'Os artigos foram importados com sucesso');
                        },

                        error: function (error) {
                            console.log(error);
                            mainScript.swal.error(error.responseJSON.message);
                        },

                        complete: function () {
                            mainScript.loadingModal.hide();
                        }
                    })
                }
            }
        });
    };

    this.constructor();
}