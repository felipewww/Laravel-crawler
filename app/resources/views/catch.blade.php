@extends('default')

@section('scripts')
    <link rel="stylesheet" type="text/css" href="/css/catch.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js" xmlns:v-bind=""></script>
    <script type="text/javascript" src="/js/catch.js"></script>

    <script type="text/x-template" id="article-template">
        <div class="found-article">
            <div class="found-article-title">${ title }</div>
            <a class="found-article-link" :href="link" target="_blank">${ link }</a>
            <div class="found-article-summary">${ summary }</div>
        </div>
    </script>
@endsection

@section('content')
    <div id="screen">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <form ref="form" @submit.prevent="findArticle" name="catch" class="form col-md-12">
                            <div>Título do artigo</div>
                            <div class="input-group">
                                <input class="form-control" name="title">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-bolt"></i>
                                    </button>
                                </span>
                            </div>
                            <small class="form-text text-muted">Título do artigo para ser capturado em uplexis.com.br</small>
                        </form>
                    </div>
                </div>

                <div class="card" v-if="articles.length > 0">
                    <div class="card-block">
                        <div>
                            <div class="alert alert-success" role="alert">Foram encontrados ${ articles.length } artigos. Clique em "importar" para salvar na base de dados</div>
                        </div>
                        <template>

                            <article-component v-for="article in articles"
                               v-bind:summary="article.summary"
                               v-bind:link="article.link"
                               v-bind:title="article.title">
                            </article-component>

                        </template>
                        <div>
                            <button @click="importFoundArticles" class="btn btn-primary pull-right">Importar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection