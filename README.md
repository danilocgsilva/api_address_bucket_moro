# API ADDRESS BUCKET MORO

Store endpoints from apis.

## To develop

The aplication is beign developed using docker. There are two container: one for application and another for the database. Both have the notwork mode to *host*, so it is good to interates to the development server for frontend.

## Technical: what you will found here?

The application is based on Laravel 12.

It uses the coupled frontend, using the default suggestion from Laravel: Tailwindcss.

In the listing views, you can see a entries table, having in the same row actions buttons both to edit or delete item. As well the required inline javascript the ask for user confirmation before deletion.

In the web routes, there are a relationship between models. I used a native resource from Laravel to suggests hierarquical route paths.

### Models

**Api**: the api to be stored.

**QueryTerm**: representation for query term in the path to fetch an information from an api.

**FetchingQuery**: the composition of an endpoint, its paths and the endpoint queries. May have several `QueryString`. For example, a single FetchingQuery may be a compound of an api with an address of `https://imdb.iamidiotareyoutoo.com/search` and a single `TermItem` which may be the `q`. So a FetchingQuery can would be an address like: `https://imdb.iamidiotareyoutoo.com/search?q={some_value}`. A single FetchingQuery mayu have several `TermItem`. For exempla, of this same FetchingQuery have a term called `page`, the full result of te fetching query may be `https://imdb.iamidiotareyoutoo.com/search?q={some_value}&page=3`

**TermItem**: binded to a `FetchingQuery` and links to a single `Api` as well. It is like a pivot table between api and fetching query.


